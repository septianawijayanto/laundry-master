<?php

namespace App\Models;

use App\models\Paket;
use Illuminate\Database\Eloquent\Model;

class T_pesanan extends Model
{
    protected $table = 't_pesanan';
    //protected $fillable = ['id', 'paket_id', 'customer_id', 'status_pesanan_id', 'status_pembayaran_id'];
    public $incrementing = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
    public function status_pesanan()
    {
        return $this->belongsTo(Status_pesanan::class);
    }
    public function status_pembayaran()
    {
        return $this->belongsTo(Status_pembayaran::class);
    }
}
