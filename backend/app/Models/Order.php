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
    public function patien () {
        return $this->belongsTo(Patient::class);
    }
}
