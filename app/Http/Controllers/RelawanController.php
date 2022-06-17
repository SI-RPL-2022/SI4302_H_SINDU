<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mata_Pelajaran;
use App\Models\Materi;
use App\Models\Request_Volunteer;
use App\Models\Detail_Pengajuan_Relawan;
use Auth;

class RelawanController extends Controller
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
        return view('relawan.index');
    }

    public function showMateri()
    {        
        $data = DB::table('materi')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')
                ->join('users', 'users.id', '=', 'materi.id_users')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'materi.created_at',
                        'materi.status', 'materi.id_materi', 'materi.slug', 'materi.cover_materi',
                        'deskripsi_materi', 'video_materi')
                ->where('materi.id_users', Auth::user()->id)
                ->orderBy('materi.created_at', 'DESC')
                ->get();

        return view('relawan.show_materi', compact('data'));
    }

    public function tambahMateri()
    {
        $mapel = Mata_Pelajaran::all();
        return view('relawan.tambah_materi', compact('mapel'));
    }

    public function storeMateri(Request $request)
    {
        $validate = $request->validate([
            'id_users' => 'required',
            'id_mata_pelajaran' => 'required',
            'judul_materi' => 'required|unique:materi',
            'cover_materi' => 'required|image|mimes:jpeg,png,jpg|dimensions:width=1920,height=1080',
            'deskripsi_materi' => 'required'            
        ]);

        $cover_materi = time().'.'.$request->cover_materi->extension();
        $request->cover_materi->move(public_path('image/cover'), $cover_materi);
        
        if($request->video_materi == ''){
            $materi = Materi::create([
                'id_users' => $request->id_users,
                'id_mata_pelajaran' => $request->id_mata_pelajaran,               
                'judul_materi' => $request->judul_materi,
                'cover_materi' => $cover_materi,            
                'slug' => \Str::slug($request->judul_materi),
                'deskripsi_materi' => $request->deskripsi_materi,    
                'video_materi' => "Tidak Ada",            
                'status' => "Menunggu"            
            ]);           
        }elseif($request->video_materi != ''){
            $materi = Materi::create([
                'id_users' => $request->id_users,
                'id_mata_pelajaran' => $request->id_mata_pelajaran,               
                'judul_materi' => $request->judul_materi,
                'cover_materi' => $cover_materi,            
                'slug' => \Str::slug($request->judul_materi),
                'deskripsi_materi' => $request->deskripsi_materi,
                'video_materi' => $request->video_materi,
                'status' => "Menunggu"            
            ]);           
        }
        return redirect(route('relawan.show.materi'))->with('success', 'Data Berhasil Ditambahkan');
    }    

    public function editMateri($id)
    {
        $data = Materi::find($id);
        $mapel = Mata_Pelajaran::all();

        return view('relawan.edit_materi', compact('data', 'mapel'));
    }

    public function updateMateri(Request $request, $id)
    {
        $data = Materi::find($id);                    

        $validate = $request->validate([
            'id_users' => 'required',
            'id_mata_pelajaran' => 'required',
            'judul_materi' => 'required',
            'cover_materi_new' => 'image|mimes:jpeg,png,jpg|dimensions:width=1920,height=1080',
            'deskripsi_materi' => 'required'                                   
        ]);

        $data->id_users = $request->id_users;
        $data->id_mata_pelajaran = $request->id_mata_pelajaran;        
        $data->judul_materi = $request->judul_materi;
        $data->slug = \Str::slug($request->judul_materi);
        $data->deskripsi_materi = $request->deskripsi_materi;

        if($request->video_materi == ''){
            $data->video_materi = "Tidak Ada";
        }elseif($request->video_materi != ''){
            $data->video_materi = $request->video_materi;
        }

        $data->status = "Menunggu";
    
        if($request->cover_materi_new == NULL){
            $data->cover_materi = $request->cover_materi;
        }else{
            $cover_materi = time().'.'.$request->cover_materi_new->extension();
            $request->cover_materi_new->move(public_path('image/cover'), $cover_materi);
            $data->cover_materi = $cover_materi;
        }           
        $data->save();
        
        return redirect(route('relawan.show.materi'))->with('success', 'Data Berhasil Diubah');
    }

    public function deleteMateri($id)
    {
        DB::table('materi')->where('id_materi', $id)->delete();        

        return redirect(route('relawan.show.materi'))->with('success', 'Data Berhasil Dihapus');
    }

    public function cariMateri(Request $request)
    {
        $keyword = $request->cari;
        $data = DB::table('materi')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'materi.id_mata_pelajaran')
                ->join('users', 'users.id', '=', 'materi.id_users')
                ->select('materi.judul_materi', 'mata_pelajaran.nama_mata_pelajaran', 'materi.created_at',
                        'materi.status', 'materi.id_materi', 'materi.slug', 'materi.cover_materi',
                        'deskripsi_materi', 'video_materi')
                ->where('materi.id_users', Auth::user()->id)
                ->orderBy('materi.created_at', 'DESC')
                ->where('materi.judul_materi', 'like', "%". $keyword . "%")
                ->get();

        return view('relawan.show_materi', compact('data'));
    }
    public function showRequest()
    {
        $data = DB::table('pengajuan_relawan')                
                ->select('id_pengajuan_relawan','nama_organisasi','email','no_hp','deskripsi','deskripsi_lengkap','jumlah_relawan','startDate','endDate','syarat_umum_pertama','syarat_umum_kedua','foto_lokasi','berkas')
                ->where('status', 'Diterima')
                ->get();
        return view('relawan.pendaftaran_relawan', compact('data'));
        }
    
        public function create_request_pendaftaran_relawan()
        {
            $model = new Detail_Pengajuan_Relawan();
            return view('relawan.pendaftaran_relawan', compact(
                'model'
            ));
        }
        public function store_pendaftaran_relawan(Request $request)
        {
        $model = new Detail_Pengajuan_Relawan();
        $model->id_pengajuan_relawan = $request->id_pengajuan_relawan;
        $model->nama_relawan = $request->nama_relawan;
        $model->email_relawan = $request->email_relawan;
        $model->nik = $request->nik;
        $model->berkas_ktp = $request->berkas_ktp;
        $model->berkas_cv = $request->berkas_cv;
        $model->save();
        
        return redirect('/relawan/mendaftar')->with('success', 'Data Berhasil Tersimpan!');
    }

}
