<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Volunteer extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_relawan';
    protected $primaryKey = 'id_pengajuan_relawan'; 
}
