<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Pengajuan_Relawan extends Model
{
    use HasFactory;
    protected $table = 'detail_pengajuan_relawan';
    public $primaryKey = 'id_detail_pengajuan_relawan'; 
    protected $fillable = [
        'id_detail_pengajuan_relawan',
        'id_pengajuan_relawan',
        'nama_relawan',
        'email_relawan',
        'nik',
        'berkas_ktp',
        'berkas_cv'    
    ];   
}
