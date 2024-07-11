<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Biaya extends Model
{
    use HasFactory;
    

    protected $guarded =[];
    protected $append = ['nama_biaya_full'];

//     protected function namaBiayaFull(): string
// {
//     return $this->nama . '.' . $this->formatRupiah($this->attributes['jumlah']);
// }


    protected function namaBiayaFull(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->nama . '-' . formatRupiah($this-> jumlah),

        );
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected static function booted()
    {
        static::creating(function($biaya){
            $biaya->user_id = auth()->user()->id;
        });
        static::updating(function($biaya){
            $biaya->user_id = auth()->user()->id;
        });
    }
}
