<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'description',
        'date',
        'location',
        'ticket_type',
        'ticket_price',
        'image',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
