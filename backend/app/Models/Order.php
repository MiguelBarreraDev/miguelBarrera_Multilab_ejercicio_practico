<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Relación inversa de uno a muchos con users table.
     */
    public function user () {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación inversa de uno a muchos con patients table.
     */
    public function patient () {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Relación inversa de uno a muchos con doctors table.
     */
    public function doctor () {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Relacion de uno a muchos con order_detatils table.
     */
    public function orderDetails () {
        return $this->hasMany(OrderDetail::class);
    }
}
