<?php

namespace App\Http\Controllers;

use App\Models\Request_Volunteer;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengajuanRelawanProcessed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $foto_lokasi = time().'.'.$request->foto_lokasi->extension();
        $request->foto_lokasi->move(public_path('image/foto_lokasi'), $foto_lokasi);
        $berkas = time().'.'.$request->berkas->extension();
        $request->berkas->move(public_path('berkas/pengajuan_relawan'), $berkas);

        $model->nama_lengkap = $request->nama_lengkap;
        $model->nama_organisasi = $request->nama_organisasi;
        $model->email = $request->email;
        $model->no_hp = $request->no_hp;
        $model->startDate = $request->startDate;
        $model->endDate = $request->endDate;
        $model->deskripsi = $request->deskripsi;
        $model->deskripsi_lengkap = $request->deskripsi_lengkap;
        $model->jumlah_relawan = $request->jumlah_relawan;
        $model->syarat_umum_pertama = $request->syarat_umum_pertama;
        $model->syarat_umum_kedua = $request->syarat_umum_kedua;
        $model->foto_lokasi = $foto_lokasi;
        $model->berkas = $berkas;
        $model->save(); 
        
        // \Mail::to($model->email)->send(new PengajuanRelawanProcessed($model));

        return redirect('/request-volunteer')->with('success', 'Data Berhasil Tersimpan!');
    }

    public function showAllMateri(Request $request)
    {
        $dataAll = DB::table('materi')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'users.name',
                        'materi.cover_materi', 'kelas.nama_kelas', 'materi.slug')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')   
                ->join('users', 'users.id', '=', 'materi.id_users')   
                ->join('kelas', 'mata_pelajaran.id_kelas', 'kelas.id_kelas')
                ->where('materi.status', 'Rilis')
                ->orderBy('materi.judul_materi', 'ASC')
                ->get();
        
        $dataReq = DB::table('materi')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'users.name',
                        'materi.cover_materi', 'kelas.nama_kelas', 'materi.slug')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')   
                ->join('users', 'users.id', '=', 'materi.id_users')   
                ->join('kelas', 'mata_pelajaran.id_kelas', 'kelas.id_kelas')
                ->where('materi.status', 'Rilis')
                ->orderBy('materi.created_at', 'DESC')
                ->limit(3)
                ->get();

        return view('guest.show_all_materi', compact('dataAll', 'dataReq'));
    }

    public function showDetailMateri($slug)
    {
        $data = DB::table('materi')
                ->select('materi.judul_materi', 'materi.deskripsi_materi', 'materi.video_materi', 'materi.created_at', 'materi.cover_materi',
                    'users.name')
                ->join('users', 'users.id', '=', 'materi.id_users')  
                ->where('materi.slug', $slug)
                ->first();
        
        return view('guest.show_detail_materi', compact('data'));
    }

    public function cariMateri(Request $request)
    {        
        $keyword = $request->cari;
        $dataAll = DB::table('materi')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'users.name',
                        'materi.cover_materi', 'kelas.nama_kelas', 'materi.slug')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')   
                ->join('users', 'users.id', '=', 'materi.id_users')   
                ->join('kelas', 'mata_pelajaran.id_kelas', 'kelas.id_kelas')
                ->where('materi.status', 'Rilis')
                ->where('materi.judul_materi', 'like', "%". $keyword . "%") 
                ->orderBy('materi.judul_materi', 'ASC')
                ->get();
        
        $dataReq = DB::table('materi')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'users.name',
                        'materi.cover_materi', 'kelas.nama_kelas', 'materi.slug')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')   
                ->join('users', 'users.id', '=', 'materi.id_users')   
                ->join('kelas', 'mata_pelajaran.id_kelas', 'kelas.id_kelas')
                ->where('materi.status', 'Rilis')
                ->orderBy('materi.created_at', 'DESC')
                ->limit(3)
                ->get();

        return view('guest.show_all_materi', compact('dataAll', 'dataReq'));        
    }

    public function filterMateri(Request $request)
    {        
        $keyword = $request->cari;
        $filter = $request->filter;

        if($filter == "Kelas"){
            $dataAll = DB::table('materi')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'users.name',
                        'materi.cover_materi', 'kelas.nama_kelas', 'materi.slug')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')   
                ->join('users', 'users.id', '=', 'materi.id_users')   
                ->join('kelas', 'mata_pelajaran.id_kelas', 'kelas.id_kelas')
                ->where('materi.status', 'Rilis')
                ->where('kelas.nama_kelas', 'like', "%". $keyword . "%") 
                ->orderBy('materi.judul_materi', 'ASC')
                ->get();
        }elseif($filter == "Mata Pelajaran"){
            $dataAll = DB::table('materi')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'users.name',
                        'materi.cover_materi', 'kelas.nama_kelas', 'materi.slug')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')   
                ->join('users', 'users.id', '=', 'materi.id_users')   
                ->join('kelas', 'mata_pelajaran.id_kelas', 'kelas.id_kelas')
                ->where('materi.status', 'Rilis')
                ->where('mata_pelajaran.nama_mata_pelajaran', 'like', "%". $keyword . "%") 
                ->orderBy('materi.judul_materi', 'ASC')
                ->get();
        }        
        
        $dataReq = DB::table('materi')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'users.name',
                        'materi.cover_materi', 'kelas.nama_kelas', 'materi.slug')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')   
                ->join('users', 'users.id', '=', 'materi.id_users')   
                ->join('kelas', 'mata_pelajaran.id_kelas', 'kelas.id_kelas')
                ->where('materi.status', 'Rilis')
                ->orderBy('materi.created_at', 'DESC')
                ->limit(3)
                ->get();

        return view('guest.show_all_materi', compact('dataAll', 'dataReq'));        
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
