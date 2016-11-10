<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;
use App\Order;
use App\Menu;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function orderProcess(Request $request) {
        $data['menu'] = Menu::all();
        return view('userorder.select', $data);
    }
    
    public function computeOrder(Request $request) {
        if($request->isMethod('post')) {
            $main = Menu::select('id','description', 'price')->where('id',$request->get("maindish"))->first();
            $side = Menu::select('id','description', 'price')->where('id',$request->get("sidedish"))->first();
            $rice = Menu::select('id','description', 'price')->where('id',$request->get("rice"))->first();
            $total = 0;
            $is_combo = false;
 
            # check if combo meal is present;
            if(!is_null($main) && !is_null($side) && !is_null($rice)) {
                $is_combo = true;
                $total = 60.00;
            }
            
            if(!is_null($main)) {
                if(!$is_combo) $total += $main->price;
                $info['main_dish'] = $main->toJson();
            }
            if(!is_null($side)) {
                if(!$is_combo) $total += $side->price;
                $info['side_dish'] = $side->toJson();
            }
            if(!is_null($rice)) {
                if(!$is_combo) $total += $rice->price;
                $info['rice'] = $rice->toJson(); 
            }
            
            if($request->has('extra')) {
                foreach($request->get('extra') as $order_id) {
                    $extra = Menu::select('id','description','price')->where('id', $order_id)->get()->first(); 
                    $total += $extra->price;
                    $info['extra'][] = $extra->toJson();
                }
                $info['extra'] = json_encode($info['extra']);
            }
            dd($info);
            $info['user_id'] = Auth::user()->id;
            $order = Order::create($info);
            return view('userorder.success', ['total' => $total]);
        }
        if( count($request->all()) < 1 ) {
            return redirect('/order/step/2');
        }
    }

}
