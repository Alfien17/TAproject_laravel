<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Barang extends Model
{
   protected $table = "barang";
   protected $fillable = ['kd_brng','nm_brng','kategori','harga','berat','satuan','jmlh','desc','img_brng'];

   
}
