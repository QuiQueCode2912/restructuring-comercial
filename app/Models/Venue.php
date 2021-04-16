<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'venues';
    protected $fillable = [
      'id', 'name', 'main_text', 'secondary_text', 'parent_id',
      'type', 'hour_fee', 'mid_day_fee', 'all_day_fee', 'url',
      'status',
    ];

    public function designs()
    {
        return $this->hasMany('App\Models\VenueDesign');
    }

    public function files()
    {
        return $this->hasMany('App\Models\VenueFile');
    }
}
