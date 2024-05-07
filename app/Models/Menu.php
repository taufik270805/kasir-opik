<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = ['nama', 'harga_id', 'image', 'deskripsi', 'jenis_id'];

    public function jenis(){
        return $this->belongsTo(jenis::class, 'jenis_id');
    }
    public function harga(){
        return $this->belongsTo(Harga::class, 'harga_id');
    }
}
