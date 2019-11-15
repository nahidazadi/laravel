<?php

namespace App\Http\Controllers;

use App\newbook1;
use Illuminate\Http\Request;

class Newbook1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $b = newbook1::
            //    ->orderBy('name', 'desc')
                //take(10)
               get();

        return $b->toJson();  
    }

    public function Book(Request $request)
    {
        $ph='%'.$request->criteria.'%';
        $b = newbook1::where('criteria','like',$ph)->get();
        return $b->tojson();
    }

    public function delete(Request $request)
    {
        $ph='%'.$request->id.'%';
        $b = newbook1::where('id','like',$ph)->get();
        $h = newbook1::where('id','like',$ph)->delete();
        return $b->tojson();
        
    }
    public function put(Request $request)
    {
        $id=$request->id;
        $b = newbook1::where('id',$id)->first();
        if($id)
        {
        $b->namebok=$request["namebok"];
        $b->namebok=$request->namebok;
        $b->criteria=$request["criteria"];
        $b->criteria=$request->criteria;
        $b->save();
        return $b->toJson();
    }
    else
    {
        return "id not found";
    }
    }
    public function post(Request $request)
    {
        $b = new newbook1();
        $b->namebok=$request["namebok"];
        $b->namebok=$request->namebok;
        $b->criteria=$request["criteria"];
        $b->criteria=$request->criteria;
        $b->save();
        return $b->toJson();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\newbook1  $newbook1
     * @return \Illuminate\Http\Response
     */
    public function show(newbook1 $newbook1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\newbook1  $newbook1
     * @return \Illuminate\Http\Response
     */
    public function edit(newbook1 $newbook1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\newbook1  $newbook1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, newbook1 $newbook1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\newbook1  $newbook1
     * @return \Illuminate\Http\Response
     */
    public function destroy(newbook1 $newbook1)
    {
        //
    }
}
