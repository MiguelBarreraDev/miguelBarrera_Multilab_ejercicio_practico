<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    /**
     * Relación de uno a muchos con la tabla orders.
     */
    public function orders () {
        return $this->hasMany(Order::class);
    }
}
