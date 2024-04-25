<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    use HasFactory;
    public $table = 'device';
    protected $guarded = [];

    public function mudel(): BelongsTo
    {
        return $this->belongsTo(Mudel::class);
    }
}