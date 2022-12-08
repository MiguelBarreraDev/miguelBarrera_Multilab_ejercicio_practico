<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'medical_test_id',
        'price'
    ];

    /**
     * Relación inversa de uno a muchos con orders table.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relación inversa de uno a muchos con medical_test table.
     */
    public function medicalTest()
    {
        return $this->belongsTo(MedicalTest::class);
    }
}
