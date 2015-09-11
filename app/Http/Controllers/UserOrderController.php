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
            $order = new Order;
            $main = Menu::select('id','description', 'amount')->where('id',$request->get("maindish"))->first();
            $side = Menu::select('id','description', 'amount')->where('id',$request->get("sidedish"))->first();
            
            $info = [
                'user_id' => Auth::user()->id,
            ];
            if(!is_null($main)) {
               $info['main_dish'] = $main->toJson();
            }
            if(!is_null($side)) {
                $info['main_dish'] = $side->toJson();
            }
            if(!$request->has('rice')) {
                $info['has_rice'] = false; 
            }
            if($request->has('extra')) {
                $extra = Menu::select('id','description','amount')->whereIn('id',$request->get('extra'))->get()->toJson(); 
                $info['extra'] = $extra;
            }
            dd($extra);
            
            $data['collection'] = [[
                    
                    ]];
            // $data['collection'] = [
            //     ['description' => 'Ulam', 'qty' => '1', 'price' => number_format(1960,2)]
            // ];
            return view('userorder.statement', $data);
        }
        if( count($request->all()) < 1 ) {
            return redirect('/order/step/2');
        }
    }

}
