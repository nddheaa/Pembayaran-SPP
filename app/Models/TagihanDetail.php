<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tagihan_details';
    protected $fillable = ['tagihan_id', 'nama_biaya', 'jumlah_biaya'];
}