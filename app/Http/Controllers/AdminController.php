<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
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
}

