<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['id', 'email', 'nama', 'no_hp', 'alamat'];
    public function t_pesanans()
    {
        return $this->hasMany(T_pesanan::class);
    }
}
