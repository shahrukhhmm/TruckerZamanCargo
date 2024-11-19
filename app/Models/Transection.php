<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;

    public function deal()
    {
        return $this->belongsTo(Deal::class,'deal_id','id');
    }
}
