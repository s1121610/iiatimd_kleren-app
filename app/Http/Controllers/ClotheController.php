<?php

namespace App\Http\Controllers;

use App\Models\Clothe;
use Illuminate\Http\Request;

class ClotheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "hoi";
        return response()->json(["Clothes" => Clothe::all()]);
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
    public function store(Request $request, Clothe $clothes)
    {
        $clothes->name = request('name');
        $clothes->spiecies = request('spiecies');
        $clothes->season = request('season');
        $clothes->occasion = request('name');
        $clothes->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clothe  $clothe
     * @return \Illuminate\Http\Response
     */
    public function show($occasion ,Clothe $clothe)
    {
        return response()->json(["Clothes" => Clothe::where("occasion", "=", $occasion)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clothe  $clothe
     * @return \Illuminate\Http\Response
     */
    public function edit(Clothe $clothe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clothe  $clothe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clothe $clothe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clothe  $clothe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clothe $clothe)
    {
        //
    }
}
