<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueFile extends Model
{
    use HasFactory;

    protected $table = 'venues_files';
    protected $fillable = [
      'venue_id', 'token', 'name', 'path', 'size', 'type', 
      'mime_type', 'sort'
    ];

    public function venue()
    {
        return $this->belongsTo('App\Models\Venue', 'venue_id');
    }
}
