<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'birth_date',
        'is_married',
        'marriage_date',
        'marriage_country',
        'is_widowed',
        'has_been_married',
    ];
}
