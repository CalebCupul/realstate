<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Optix\Media\Models\Media;

use function PHPSTORM_META\type;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today()->subDays(6);
        $period = CarbonPeriod::create($today, Carbon::today());
        $dates = [];
        // Iterate over the period
        foreach ($period as $date) {
            array_push($dates, $date->format('Y-m-d'));
        }

        //Top Users
        $top_users = User::withCount('sales')->orderBy('sales_count','desc')->with('sales')->paginate(7);

        // Ventas totales
        $sales_count = Sale::count();
        
        // Ventas por semana
        $department_sales = $this->getSalesByWeek('Departamento');

        $house_sales = $this->getSalesByWeek('Casa');
        $terrain_sales = $this->getSalesByWeek('Terreno');
        
        // Precio promedio por inmueble
        $houses = Sale::where('property_type', '=', 'Casa')->get();
        $terrains = Sale::where('property_type', '=', 'Terreno')->get();
        $departments = Sale::where('property_type', '=', 'Departamento')->get();
        $house_average_price = $this->getAveragePrice($houses);
        $terrain_average_price = $this->getAveragePrice($terrains);
        $department_average_price = $this->getAveragePrice($departments);

        $total_sales = [
            array('name' => 'Casas', 'y' => $houses->count()),
            array('name' => 'Terrenos', 'y' => $terrains->count()),
            array('name' => 'Departamentos', 'y' => $departments->count()),
        ];

        return view('admin.dashboard', [
            "total_sales" => json_encode($total_sales),], compact(
            'house_average_price', 'terrain_average_price', 'department_average_price',
            'sales_count', 'top_users','house_sales','terrain_sales','department_sales','dates'));
    }

    public function getSalesByWeek($property_type_name){
        $today = Carbon::today()->subDays(6);
        $period = CarbonPeriod::create($today, Carbon::today());
        $dates = [];
        
        // Rango de días desde hoy hasta hace 1 semana
        foreach ($period as $date) {
            array_push($dates, $date->format('Y-m-d'));
        }

        $sales = Sale::where('property_type', '=', $property_type_name)->where('created_at', '>=', $dates[0])
            ->groupBy('date')
            ->orderBy('date','asc')
            ->get(array(
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) sales')
            ));
        
        $houses = $sales->map(function($sales){
            return collect($sales->toArray())
                ->only(['sales','date'])
                ->all();
        });  

        return $this->fillAndOrderEmptyDatesAndValues($houses, $dates);
    }
        
    // Función encargada de verificar si existen ventas para cada día de la semana,
    // de no ser así, busca el espacio vacio en las ventas por fecha y llenalo con 0
    // y devuelve una collecion ordenada de arrays con fecha -> venta

    public function fillAndOrderEmptyDatesAndValues($property_type_collection, $dates){
        //  Fechas existentes
        $houses_date = [];
        foreach($property_type_collection as $house_date){
            $houses_date[] = $house_date['date'];
        }

        // Fechas faltantes
        $missingdates = array_diff($dates, $houses_date);

        // Crea array por cada fecha faltante, asignandole un valor 0 por cada
        // fecha faltante
        $append_dates = [];
        foreach($missingdates as $dates){
            array_push($append_dates, array('date' => $dates, 'sales' => 0));
        }

        // Las añade a la colección
        foreach($append_dates as $date){
            $property_type_collection->push($date);
        }

        // Crea una nueva colección ordenada por fecha
        $sorted_houses_by_date = $property_type_collection->sortBy('date');

        // Crea un array de valores ordenados
        $data = [];
        foreach($sorted_houses_by_date as $house){
            $data[] = $house['sales'];
        }

        return $data;
    }

    public function getAveragePrice($sales){
        $average_price = 0;
        foreach($sales as $sale){
            $average_price += (float)$sale['price'];
        }
        $average_price /= $sales->count();
        return number_format($average_price,2);
    }
}
