<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'ticket_type',
        'payment_method',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
