<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreSaleRequest;
use App\Http\Requests\Sale\UpdateSaleRequest;
use App\Models\Sale;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Suburb;
use App\Models\User;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:users.index')->only(['index', 'getIndexTable']);
        // $this->middleware('permission:users.show')->only('show');
        // $this->middleware('permission:users.create')->only(['create', 'store']);
        // $this->middleware('permission:users.edit')->only(['edit', 'update']);
        // $this->middleware('permission:users.destroy')->only('destroy');

        $this->authorizeResource(Sale::class, 'sale');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::with('user')->get();
        return view('admin.sales.index', compact('sales'));
    }

    public function getIndexTable()
    {

        $this->authorize('viewAny', Sale::class);


        return Laratables::recordsOf(Sale::class);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sale $sale)
    {
        $data['countries'] = Country::get(["country_name", "id"]);
        $property_types = $sale->getPropertyTypes();
        $sale_types = $sale->getSaleTypes();

        return view('admin.sales.create', $data ,compact('property_types', 'sale_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        $user = Auth::User();
        $fields = $request->validated();
        $data = array_merge($fields, ['user_id' => $user->id]);

        

        $sale = Sale::create(Arr::except($data, 'image'));

        

        if ($request->hasFile('house')) {
            $this->saveFile($request->file('house'), 'house', $sale);
        }

        return redirect()->route('sales.getSales')->with('toast_success', 'Registro guardado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('admin.sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $data['countries'] = Country::get(["country_name", "id"]);
        $property_types = $sale->getPropertyTypes();
        $sale_types = $sale->getSaleTypes();
        
        return view('admin.sales.edit', $data, compact('sale','property_types', 'sale_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $fields = $request->validated();
        $user = array('user_id' =>  Arr::pull($sale, 'user_id'));
        $fields = array_merge($fields, $user);

        $sale->update(Arr::except($fields, 'image'));

        if ($request->hasFile('house') && !$this->saveFile($request->file('house'), 'house', $sale)) {
            return redirect()->route('sales.edit', $sale)->with('toast_error', 'Algo sailo mal. Intente de nuevo!');
        }

        return redirect()->route('sales.searchSales')->with('toast_success', 'Registro guardado.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')->with('toast_success', 'Registro eliminado.');
    }

    public function getStates(Request $request){

        $data['states'] = State::where("country_id", $request->country_id)->get(["state_name", "id"]);
        return response()->json($data);
    }

    public function getCities(Request $request){

        $data['cities'] = City::where("state_id", $request->state_id)->get(["city_name", "id"]);
        return response()->json($data);

    }

    public function getSuburbs(Request $request){

        $data['suburbs'] = Suburb::where("city_id", $request->city_id)->get();
        return response()->json($data);
    }

    public function searchSales(Request $request){
        $search = $request->input('search');

        // Si hay un filtro, busca en la base de datos y lo retorna
        if( !empty($search)){
            $sales = Sale::with('user','country','state','suburb','city','media')
            ->select('sales.*','users.name','countries.country_name','states.state_name','cities.city_name','suburbs.suburb_name')
            ->join('users','users.id','=','sales.user_id')
            ->join('countries','countries.id','=','sales.country_id')
            ->join('states','states.id','=','sales.state_id')
            ->join('cities','cities.id','=','sales.city_id')
            ->join('suburbs','suburbs.id','=','sales.suburb_id')
            ->where('users.name', 'LIKE', $search)
            ->orWhere('countries.country_name', 'LIKE', $search)
            ->orWhere('states.state_name', 'LIKE', $search)
            ->orWhere('cities.city_name', 'LIKE', $search)
            ->orWhere('suburbs.suburb_name', 'LIKE', $search)
            ->orWhere('sales.property_type', 'LIKE', $search)
            ->orWhere('sales.sale_type', 'LIKE', $search)
            ->orWhere('sales.street', 'LIKE', $search)
            ->orWhere('sales.price', 'LIKE', $search)
            ->paginate(10)->withQueryString();
        }else{
            // Si el campo va en blanco, retorna las ventas sin filtro
            $sales = Sale::with('user','suburb','city','media')->paginate(10);
        }
        return view('users.sales.index', compact('sales'));
    }

    public function getUserSales(Request $request){
        
        $user = Auth::User();
        $search = $request->input('search');

        if( !empty($search)){
            $sales = Sale::with('user','country','state','suburb','city','media')
            ->select('sales.*','countries.country_name','states.state_name','cities.city_name','suburbs.suburb_name')
            ->join('countries','countries.id','=','sales.country_id')
            ->join('states','states.id','=','sales.state_id')
            ->join('cities','cities.id','=','sales.city_id')
            ->join('suburbs','suburbs.id','=','sales.suburb_id')
            ->where('user_id', '=', $user->id)
            ->where(function($query) use($search){
                $query->Where('countries.country_name', 'LIKE', $search)
                ->orWhere('states.state_name', 'LIKE', $search)
                ->orWhere('cities.city_name', 'LIKE', $search)
                ->orWhere('suburbs.suburb_name', 'LIKE', $search)
                ->orWhere('sales.property_type', 'LIKE', $search)
                ->orWhere('sales.sale_type', 'LIKE', $search)
                ->orWhere('sales.street', 'LIKE', $search)
                ->orWhere('sales.price', 'LIKE', $search);
            })->paginate(10)->withQueryString();
        }else{
            $sales = Sale::with('user', 'country', 'state', 'suburb','city','media')
            ->where('user_id', '=', $user->id)->paginate(10);
        }

        return view('users.sales.userSales', compact('sales'));
    }
}
