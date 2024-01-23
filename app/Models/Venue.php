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
      'type', 'hour_fee', 'mid_day_fee', 'all_day_fee', 'monthly_fee', 'url',
      'status', 'show_on_website', 'seasonal_hour_fee','showInCalendar',
      'seasonal_mid_day_fee', 'seasonal_all_day_fee','nightcharge','weekendcharge','holidaycharge','residentdiscount','retireddiscount','kiddiscount','employeediscount','tipo_uso','venuesorder'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\Venue', 'parent_id');
    }

    public function designs()
    {
        return $this->hasMany('App\Models\VenueDesign');
    }

    public function files()
    {
        return $this->hasMany('App\Models\VenueFile');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Venue');
    }
}
