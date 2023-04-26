<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false; // Agrega esta línea para desactivar los timestamps

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'events';
    protected $fillable = [
        'id', 'subject', 'owner', 'startdate', 'enddate', 'status', 'venueid', 'sfId'
    ];

    protected $casts = [
        'startdate' => 'datetime',
        'enddate' => 'datetime',
    ];

    public function venue()
    {
        return $this->belongsTo('App\Models\Venue', 'venueid', 'id');
    }
}
