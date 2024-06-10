<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mudel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'mudel';

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
