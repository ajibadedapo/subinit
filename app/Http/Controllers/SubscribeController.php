<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscribing=Subscriber::where('subscriber',Auth::id())->where('subscribee',$request->subscribee)->first();
        if($subscribing)
        {
            $subscribing->delete();/*
            $notify=Notification::where('sender_id',Auth::user()->id)->where('receiver_id',$request->subscribee)->first();
            $notify->delete();*/
            return response()->json(['subscribing'=> 0]);
        }
        $subscribe=new Subscriber();
        $subscribe->subscriber=Auth::user()->id;
        $subscribe->subscribee=$request->subscribee;
        $subscribe->save();
        /*$notify= new Notification();
        $notify->read=false;
        $notify->type='subscribe';
        $notify->content="Followed you";
        $notify->sender_id=$subscribe->subscriber;
        $notify->receiver_id=$request->subscribee;
        $notify->save();*/
        return response()->json(['subscribing'=> 1]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unsubscribe(Request $request)
    {
        Subscriber::where('subscriber',Auth::id())->where('subscribee',$request->subscribee)->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
