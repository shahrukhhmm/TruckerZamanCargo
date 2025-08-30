<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deal extends Model
{
    use HasFactory;

      protected $fillable = [
        'container_number',
        'date_of_loading',
        'date_of_shipping',
        'customer_id',
        'shipping_mark',
        'place',
        'date',
        'deals_json',
        'total_amount',
        'paid_amount',
        'status',
    ];

    protected $casts = [
        'deals_json' => 'array',
        'date_of_loading' => 'date',
        'date_of_shipping' => 'date',
        'date' => 'date',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }


}
