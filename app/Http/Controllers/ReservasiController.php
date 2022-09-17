<?php

namespace App\Http\Controllers;

use App\Models\reservasi;
use App\Http\Requests\StorereservasiRequest;
use App\Http\Requests\UpdatereservasiRequest;

class ReservasiController extends Controller
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
     * @param  \App\Http\Requests\StorereservasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorereservasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function show(reservasi $reservasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(reservasi $reservasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereservasiRequest  $request
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatereservasiRequest $request, reservasi $reservasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservasi $reservasi)
    {
        //
    }
}
