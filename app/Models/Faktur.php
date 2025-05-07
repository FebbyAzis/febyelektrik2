<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\DataBarang;
use App\Models\DataPelanggan;
use App\Models\Invoice;

class Faktur extends Model
{
    use HasFactory;

    protected $table = 'faktur';

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function data_pelanggan(): BelongsTo
    {
        return $this->belongsTo(DataPelanggan::class);
    }
}
