<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Volunteer extends Model
{
    use HasFactory;
    protected $table = 'request_volunteer';
    public $primaryKey = 'id_req_volunteer'; 
    protected $fillable = [
        'id_req_volunteer',
        'nama_lengkap',
        'email',
        'no_hp',
        'deskripsi',
        'berkas'    
    ];   
}
