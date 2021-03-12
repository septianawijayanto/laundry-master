<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_pesanan extends Model
{
    protected $table = 'status_pesanan';
    public $incrementing = false;
    public function t_pesanans()
    {
        return $this->hasMany(T_pesanan::class);
    }
}
