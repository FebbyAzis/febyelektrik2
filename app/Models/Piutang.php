<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Faktur;
use App\Models\Invoice;

class Piutang extends Model
{
    use HasFactory;

    protected $table = 'piutang';

    public function faktur(): BelongsTo
    {
        return $this->belongsTo(Faktur::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
