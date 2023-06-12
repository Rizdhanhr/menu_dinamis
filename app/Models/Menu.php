<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    public $timestamps = false;
    protected $fillable = ['name','parent_id','page','published','ordering'];

    public function parent(){
        return $this->belongsTo(Menu::class,'parent_id');
    }

    public function children(){
        return $this->hasMany(Menu::class,'parent_id','id');
    }
}
