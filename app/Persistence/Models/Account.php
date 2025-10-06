<?php

namespace App\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'currency',
        'iban',
        'balance'
    ];
}
