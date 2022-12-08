<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient';

    /**
     * Relación uno a muchos con orders.
     */
    public function orders () {
        return $this->hasMany(Order::class);
    }
}
