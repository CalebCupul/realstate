<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //Top Users
        $top_users = User::withCount('sales')->orderBy('sales_count','desc')->with('sales')->paginate(7);

        // Ventas totales
        $sales_count = Sale::count();
        
        // Ventas por semana
        $house_sales = $this->getSalesByWeek('Casa');
        $terrain_sales = $this->getSalesByWeek('Terreno');
        $department_sales = $this->getSalesByWeek('Departamento');
        dd($house_sales);        

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

        return view('admin.dashboard', ["total_sales" => json_encode($total_sales)], compact(
            'house_average_price', 'terrain_average_price', 'department_average_price',
            'sales_count', 'top_users'));
    }

    public function getSalesByWeek($property_type_name){
        $today = Carbon::today()->subDays(7);
        $data = Sale::where('property_type', '=', $property_type_name)->where('created_at', '>=', $today)
            ->groupBy('date')
            ->orderBy('date','desc')
            ->get(array(
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) sales')
            ));
        
        $sales = $data->map(function($data){
            return collect($data->toArray())
                ->only(['date', 'sales'])
                ->all();
        });
        dd($sales);
        
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
