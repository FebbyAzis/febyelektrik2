<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\UtangBayar;

class Utang extends Model
{
    use HasFactory;

    protected $table = 'utang';

    public function utang_bayar(): HasMany
    {
        return $this->hasMany(UtangBayar::class);
    }
}
