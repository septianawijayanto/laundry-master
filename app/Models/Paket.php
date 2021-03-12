<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $fillable = ['id', 'nama', 'harga'];
    public function t_pesanans()
    {
        return $this->hasMany(T_pesanan::class);
    }
}
