<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tagihan extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $dates = ['tanggal_tagihan', 'tanggal_jatuh_tempo'];
    protected $with = ['user', 'detailsiswa', 'tagihanDetails'];
    /**
     * Get the user that owns the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the user that owns the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detailsiswa(): BelongsTo
    {
        return $this->belongsTo(DetailSiswa::class,'siswa_id');
    }
    /**
     * Get all of the comments for the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagihanDetails(): HasMany
    {
        return $this->hasMany(TagihanDetail::class);
    }
    /**
     * Get all of the pembayaran for the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }
    protected static function booted()
    {
        static::creating(function($tagihan){
            $tagihan->user_id = auth()->user()->id;
        });
        static::updating(function($tagihan){
            $tagihan->user_id = auth()->user()->id;
        });
    }
}
