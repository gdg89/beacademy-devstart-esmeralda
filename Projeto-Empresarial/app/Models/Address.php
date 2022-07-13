<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'street',
        'number',
        'neighbor',
        'city',
        'state',
        'complement'
    ];

    public function address()
    {
        return $this->belongsTo(User::class);
    }
}
