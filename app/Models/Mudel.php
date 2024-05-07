<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mudel extends Model
{
    use HasFactory;
    public $table = 'mudel';
    protected $guarded = [];

    public function device(): HasMany
    {
        return $this->hasMany(Device::class);
    }
}
