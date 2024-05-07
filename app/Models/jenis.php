<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $fillable = ['nama_jenis', 'kategori_id'];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
