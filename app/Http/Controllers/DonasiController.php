<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonasiCreateMail;
use App\Models\Donasi;

class DonasiController extends Controller
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
        $model = new Donasi;
        return view('guest.donasi', compact(
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

        $bukti_transfer = time().'.'.$request->bukti_transfer->extension();
        $request->bukti_transfer->move(public_path('image/donasi'), $bukti_transfer);

        $model = new Donasi;
        $model->nama_donatur = $request->nama_donatur;
        $model->email_donatur = $request->email_donatur;
        $model->total_donasi = $request->total_donasi;
        $model->deskripsi_donasi = $request->deskripsi_donasi;
        $model->bukti_transfer = $bukti_transfer;
        $model->status = $request -> status;
        $model->save();

        \Mail::to($model->email_donatur)->send(new DonasiCreateMail($model));

        return redirect('/donasi/create')->with('success', 'Data Berhasil Tersimpan!');
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
