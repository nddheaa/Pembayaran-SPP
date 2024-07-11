<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailSiswa extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'nama' => 10,
            'nisn' => 10,
        ],
    ];

    /**
     * Get the user that owns the DataSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */ 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the siswa that owns the DataSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'siswa_id')->withDefault([
            'name' => 'nama tidak ada'
        ]);
    }

}
