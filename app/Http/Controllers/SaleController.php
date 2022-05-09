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

        return redirect()->route('sales.index')->with('toast_success', 'Registro guardado.');
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
        return view('admin.sales.edit', compact('sale'));
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

        $sale = Sale::create(Arr::except($fields, 'image'));

        if ($request->hasFile('house') && !$this->saveFile($request->file('house'), 'house', $sale)) {
            return redirect()->route('sales.edit', $sale)->with('toast_error', 'Algo sailo mal. Intente de nuevo!');
        }


        return redirect()->route('sales.index')->with('toast_success', 'Registro guardado.');
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
}
