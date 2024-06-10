<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sisestamine extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'sisestamine';

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function mudel()
    {
        return $this->belongsTo(Mudel::class);
    }

    // protected $fillable= [
    //     'SN',
    //     'device',
    //     'mudel',
    //     'description',
    //     'condition',
    //     'shelf',
    //     'shop',
    //     'image'
    // ];
}
