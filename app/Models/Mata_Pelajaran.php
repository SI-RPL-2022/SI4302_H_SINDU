<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_Pelajaran extends Model
{
    use HasFactory;

    protected $table = "mata_pelajaran";
    public $primaryKey = 'id_mata_pelajaran';
    protected $fillable = [
        'id_mata_pelajaran',
        'nama_mata_pelajaran'            
    ];  
    public $timestamps = false;
}
