<?php

namespace App\Http\Controllers;

use App\Models\Request_Volunteer;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengajuanProcessed;
use Illuminate\Http\Request;

class GuestController extends Controller
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
    public function create_request()
    {
        $model = new Request_Volunteer;
        return view('guest.request_volunteer', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Request_Volunteer;
        $model->nama_lengkap = $request->nama_lengkap;
        $model->nama_organisasi = $request->nama_organisasi;
        $model->email = $request->email;
        $model->no_hp = $request->no_hp;
        $model->startDate = $request->startDate;
        $model->endDate = $request->endDate;
        $model->deskripsi = $request->deskripsi;
        $model->berkas = $request->file('berkas')->store('berkas');
        $model->save(); 
        
        \Mail::to($model->email)->send(new PengajuanProcessed($model));

        return redirect('/request-volunteer')->with('success', 'Data Berhasil Tersimpan!');
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
