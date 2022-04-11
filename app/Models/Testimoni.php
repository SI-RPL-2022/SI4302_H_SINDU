<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;
    protected $table = "testimoni";
    public $primaryKey = 'id_testimoni';
    protected $fillable = [
        'id_testimoni',
        'id_users',
        'nama',            
        'deskripsi_testimoni'       
    ];   
}