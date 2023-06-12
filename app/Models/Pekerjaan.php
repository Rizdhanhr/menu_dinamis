<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pekerjaan';
    protected $fillable = ['name'];
    protected $timestamp = 'false';

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
