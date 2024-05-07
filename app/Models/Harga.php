<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $table = 'hargas';
    protected $guarded = ['id'];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
