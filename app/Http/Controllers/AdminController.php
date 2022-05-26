<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Materi;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function showTestimoni()
    {
        $data = DB::table('testimoni')                
                ->join('users', 'users.id', '=', 'testimoni.id_users')
                ->select('testimoni.id_testimoni', 'testimoni.id_users', 'testimoni.nama','testimoni.deskripsi_testimoni', 'testimoni.created_at')
                ->where('testimoni.id_users', Auth::user()->id)
                ->orderBy('testimoni.created_at', 'DESC')
                ->get();
        

        return view('admin.show_testimoni', compact('data'));
    }

    public function storeTestimoni(Request $request)
    {
        $validate = $request->validate([
            'id_users' => 'required',
            'nama' => 'required',            
            'deskripsi_testimoni' => 'required'            
        ]);      
        
        $testimoni = Testimoni::create([
            'id_users' => $request->id_users,
            'nama' => $request->nama,                           
            'deskripsi_testimoni' => $request->deskripsi_testimoni           
        ]);           

        return redirect(route('admin.show.testimoni'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function updateTestimoni(Request $request, $id)
    {
        $data = Testimoni::find($id);                    

        $validate = $request->validate([
            'id_users' => 'required',
            'nama' => 'required',            
            'deskripsi_testimoni' => 'required'                                  
        ]);

        $data->id_users = $request->id_users;
        $data->nama = $request->nama;        
        $data->deskripsi_testimoni = $request->deskripsi_testimoni;                    
        $data->save();
        
        return redirect(route('admin.show.testimoni'))->with('success', 'Data Berhasil Diubah');
    }

    public function deleteTestimoni($id)
    {
        DB::table('testimoni')->where('id_testimoni', $id)->delete();        

        return redirect(route('admin.show.testimoni'))->with('success', 'Data Berhasil Dihapus');
    }

    public function cariTestimoni(Request $request)
    {
        $keyword = $request->cari;
        $data = DB::table('testimoni')                
                ->join('users', 'users.id', '=', 'testimoni.id_users')
                ->select('*')
                ->where('testimoni.id_users', Auth::user()->id)
                ->orderBy('testimoni.created_at', 'DESC')                
                ->where('testimoni.nama', 'like', "%". $keyword . "%")
                ->get();

        return view('admin.show_testimoni', compact('data'));
    }

    public function showVerifikasiMateri()
    {        
        $data = DB::table('materi')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')
                ->join('users', 'users.id', '=', 'materi.id_users')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'materi.created_at',
                        'materi.status', 'materi.id_materi', 'materi.slug', 'materi.cover_materi',
                        'materi.deskripsi_materi', 'materi.video_materi', 'users.name')
                ->where('users.level', '=', 'relawan')
                ->orderBy('materi.created_at', 'DESC')
                ->get();

        return view('admin.show_verifikasi_materi', compact('data'));
    }

    public function verifikasiRilisMateri(Request $request, $id)
    {
        $data = Materi::find($id);                    

        $validate = $request->validate([                      
            'status' => 'required'                                  
        ]);

        $data->status = $request->status;                      
        $data->save();
        
        return redirect(route('admin.show.verifikasi.materi'))->with('success', 'Data Berhasil Diubah');
    }

    public function verifikasiTolakMateri(Request $request, $id)
    {
        $data = Materi::find($id);                    

        $validate = $request->validate([                      
            'status' => 'required'                                  
        ]);

        $data->status = $request->status;                      
        $data->save();
        
        return redirect(route('admin.show.verifikasi.materi'))->with('success', 'Data Berhasil Diubah');
    }

    public function deleteVerifikasiMateri($id)
    {
        DB::table('materi')->where('id_materi', $id)->delete();        

        return redirect(route('admin.show.verifikasi.materi'))->with('success', 'Data Berhasil Dihapus');
    }

    public function cariVerifikasiMateri(Request $request)
    {        
        $keyword = $request->cari;
        $data = DB::table('materi')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')
                ->join('users', 'users.id', '=', 'materi.id_users')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'materi.created_at',
                        'materi.status', 'materi.id_materi', 'materi.slug', 'materi.cover_materi',
                        'materi.deskripsi_materi', 'materi.video_materi', 'users.name')
                ->where('users.level', '=', 'relawan')
                ->where('materi.judul_materi', 'like', "%". $keyword . "%")
                ->orderBy('materi.created_at', 'DESC')
                ->get();

        return view('admin.show_verifikasi_materi', compact('data'));
    }
}