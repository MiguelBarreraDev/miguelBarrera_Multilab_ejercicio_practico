<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

        /**
     * Relación inversa de uno a muchos con doctors table.
     */
    public function doctor () {
        return $this->belongsTo(Doctor::class);
    }
}
