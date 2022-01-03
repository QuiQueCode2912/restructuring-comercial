<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueDesign extends Model
{
    use HasFactory;

    protected $table = 'venues_designs';
    protected $fillable = [
      'id', 'venue_id', 'layout', 'max_pax', 'min_pax', 'url'
    ];

    public function venue()
    {
        return $this->belongsTo('App\Models\Venue', 'venue_id');
    }
}
