<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = "materi";
    public $primaryKey = 'id_materi';
    protected $fillable = [
        'id_materi',
        'id_users',
        'id_mata_pelajaran',
        'judul_materi',
        'cover_materi',
        'slug',        
        'deskripsi_materi',
        'video_materi',
        'status'        
    ];   
}
