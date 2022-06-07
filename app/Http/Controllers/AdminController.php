<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonasiConfirmed;
use App\Mail\PengajuanRelawanAccepted;
use App\Mail\PengajuanRelawanDenied;
use App\Models\Testimoni;
use App\Models\Materi;
use App\Models\Kelas;
use App\Models\Mata_Pelajaran;
use App\Models\Request_Volunteer;
use App\Models\Donasi;
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
                ->select('testimoni.id_testimoni', 'testimoni.id_users', 'testimoni.nama', 'testimoni.role', 'testimoni.foto', 'testimoni.deskripsi_testimoni', 'testimoni.created_at')
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
            'role' => 'required',
            'foto' => 'required',            
            'deskripsi_testimoni' => 'required'            
        ]);

        if ($foto = $request->file('foto')) {
            $destinationPath = 'profil_testimoni';  
            $fileSource1 = $foto->getClientOriginalName();
            $foto->move($destinationPath, $fileSource1);
        }
        $testimoni = Testimoni::create([
            'id_users' => $request->id_users,
            'nama' => $request->nama,              
            'role' => $request->role,
            'foto' => $fileSource1,           
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
            'role' => 'required',
            'foto' => 'required',
            'deskripsi_testimoni' => 'required'                                  
        ]);
        if ($foto = $request->file('foto')) {
            $destinationPath = 'profil_testimoni';  
            $fileSource1 = $foto->getClientOriginalName();
            $foto->move($destinationPath, $fileSource1);
        }

        $data->id_users = $request->id_users;
        $data->nama = $request->nama;        
        $data->role = $request->role;        
        $data->foto = $fileSource1;        
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

    public function showDonasi(){
        $data = DB::table('donasi')                
                ->select('donasi.id_donasi', 'donasi.nama_donatur', 'donasi.email_donatur', 'donasi.total_donasi','donasi.deskripsi_donasi', 'donasi.bukti_transfer', 'donasi.status', 'donasi.created_at')
                ->orderBy('donasi.created_at', 'DESC')
                ->paginate(10);
        
        return view('admin.show_donasi', compact('data'));
    }

    public function deleteDonasi($id)
    {
        DB::table('donasi')->where('id_donasi', $id)->delete();        

        return redirect(route('admin.show.donasi'))->with('success', 'Data Berhasil Dihapus');
    }

    public function cariDonasi(Request $request){
        
        $keyword = $request->cari;
        $data = DB::table('donasi')                        
                ->where('donasi.nama_donatur', 'like', "%". $keyword . "%")
                ->paginate(10);

        return view('admin.show_donasi', compact('data'));
    }

    public function statusDonasi($id){
        $data = \DB::table('donasi')->where('id_donasi', $id)->first();

        $status_sekarang = $data->status;

        if($status_sekarang=='pending'){
            \DB::table('donasi')->where('id_donasi',$id)->update([
                'status'=>'confirmed'
            ]);
        }

        \Mail::to($data->email_donatur)->send(new DonasiConfirmed($data));
        return redirect('admin/donasi');
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

    public function showVerifikasiPengajuan()
    {        
        $data = Request_Volunteer::all();

        return view('admin.show_verifikasi_pengajuan_relawan', compact('data'));
    }

    public function cariVerifikasiPengajuan(Request $request)
    {        
        $keyword = $request->cari;
        $data = DB::table('pengajuan_relawan')
                ->where('nama_organisasi', 'like', "%". $keyword . "%")
                ->orderBy('created_at', 'DESC')
                ->get();

        return view('admin.show_verifikasi_pengajuan_relawan', compact('data'));
    }

    public function verifikasiTerimaPengajuan(Request $request, $id)
    {
        $data = Request_Volunteer::find($id);                    

        $validate = $request->validate([                      
            'status' => 'required'                                  
        ]);

        $data->status = $request->status;                      
        $data->save();

        \Mail::to($data->email)->send(new PengajuanRelawanAccepted($data));
        
        return redirect(route('admin.show.verifikasi.pengajuan'))->with('success', 'Data Berhasil Diubah');
    }

    public function verifikasiTolakPengajuan(Request $request, $id)
    {
        $data = Request_Volunteer::find($id);                    

        $validate = $request->validate([                      
            'status' => 'required'                                  
        ]);

        $data->status = $request->status;                      
        $data->save();

        \Mail::to($data->email)->send(new PengajuanRelawanDenied($data));
        
        return redirect(route('admin.show.verifikasi.pengajuan'))->with('success', 'Data Berhasil Diubah');
    }

    public function deleteVerifikasiPengajuan($id)
    {
        DB::table('pengajuan_relawan')->where('id_pengajuan_relawan', $id)->delete();        

        return redirect(route('admin.show.verifikasi.pengajuan'))->with('success', 'Data Berhasil Dihapus');
    }

    public function showAllDataKelas()
    {
        $data = Kelas::all();

        return view('admin.show_kelas', compact('data'));
    }

    public function tambahDataKelas(Request $request)
    {
        $validate = $request->validate([            
            'nama_kelas' => 'required|unique:kelas'
        ]);
        
        $kelas = Kelas::create([
            'nama_kelas' => $request->nama_kelas                      
        ]);        

        return redirect(route('admin.show.kelas'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function updateDataKelas(Request $request, $id)
    {
        $data = Kelas::find($id);                    

        $validate = $request->validate([            
            'nama_kelas' => 'required|unique:kelas'
        ]);

        $data->nama_kelas = $request->nama_kelas;            
        $data->save();
        
        return redirect(route('admin.show.kelas'))->with('success', 'Data Berhasil Diubah');
    }

    public function deleteDataKelas($id)
    {
        DB::table('kelas')->where('id_kelas', $id)->delete();        

        return redirect(route('admin.show.kelas'))->with('success', 'Data Berhasil Dihapus');
    }

    public function cariDataKelas(Request $request)
    {        
        $keyword = $request->cari;
        $data = DB::table('kelas')
                ->where('nama_kelas', 'like', "%". $keyword . "%")                
                ->get();

        return view('admin.show_kelas', compact('data'));
    }

    public function showAllMataPelajaran()
    {
        $kelas = Kelas::all();
        $data = DB::table('mata_pelajaran')
                ->select('mata_pelajaran.id_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran',
                    'kelas.nama_kelas', 'kelas.id_kelas')
                ->join('kelas', 'kelas.id_kelas', '=', 'mata_pelajaran.id_kelas')                                
                ->get();

        return view('admin.show_mata_pelajaran', compact('kelas', 'data'));
    }

    public function tambahDataMataPelajaran(Request $request)
    {
        $validate = $request->validate([
            'id_kelas' => 'required',
            'nama_mata_pelajaran' => 'required'
        ]);
        
        $kelas = Mata_Pelajaran::create([
            'id_kelas' => $request->id_kelas,                      
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran
        ]);        

        return redirect(route('admin.show.mata.pelajaran'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function updateDataMataPelajaran(Request $request, $id)
    {
        $data = Mata_Pelajaran::find($id);                    

        $validate = $request->validate([
            'id_kelas' => 'required',
            'nama_mata_pelajaran' => 'required'
        ]);

        $data->id_kelas = $request->id_kelas;            
        $data->nama_mata_pelajaran = $request->nama_mata_pelajaran;   
        $data->save();
        
        return redirect(route('admin.show.mata.pelajaran'))->with('success', 'Data Berhasil Diubah');
    }

    public function deleteDataMataPelajaran($id)
    {
        DB::table('mata_pelajaran')->where('id_mata_pelajaran', $id)->delete();        

        return redirect(route('admin.show.mata.pelajaran'))->with('success', 'Data Berhasil Dihapus');
    }

    public function cariDataMataPelajaran(Request $request)
    {        
        $keyword = $request->cari;
        $kelas = Kelas::all();
        $data = DB::table('mata_pelajaran')
                ->select('mata_pelajaran.id_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran',
                    'kelas.nama_kelas', 'kelas.id_kelas')
                ->join('kelas', 'kelas.id_kelas', '=', 'mata_pelajaran.id_kelas')                                
                ->where('mata_pelajaran.nama_mata_pelajaran', 'like', "%". $keyword . "%") 
                ->get();        

        return view('admin.show_mata_pelajaran', compact('kelas', 'data'));
    }
}