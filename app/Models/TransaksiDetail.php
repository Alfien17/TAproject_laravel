<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = "transaksi_detail";
    protected $fillable = ['kd_psnan','kd_pel','nama','kd_brng','jumlah','status','total'];
}

