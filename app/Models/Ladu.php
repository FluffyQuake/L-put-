<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;

class Ladu extends Model

{
    public $table = 'ladu';
    protected $guarded = [];
    use HasFactory;
}
