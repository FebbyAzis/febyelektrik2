<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Utang;

class UtangBayar extends Model
{
    use HasFactory;

    protected $table = 'utang_bayar';

    public function utang(): BelongsTo
    {
        return $this->belongsTo(Utang::class);
    }
}