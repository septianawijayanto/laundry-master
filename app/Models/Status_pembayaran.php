<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_pembayaran extends Model
{
    protected $table = 'status_pembayaran';
    public $incromenting = false;
    public function t_pesanans()
    {
        return $this->hasMany(T_pesanan::class);
    }
}
