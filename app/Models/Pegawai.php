<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = ['name','id_pekerjaan'];
    protected $timestamp = 'false';

    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class,'id_pekerjaan');
    }
}
