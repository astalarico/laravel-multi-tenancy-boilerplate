<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'city',
        'state',
        'street',
        'postal_code',
        'secondary_address',
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'youtube',
        'phone',
        'website',
        'profile_image',
        'active',
        'featured',
        'description',
        'excerpt',
        'organization_id',
        'lat',
        'lng',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'active' => 'boolean',
        'featured' => 'boolean',
        'organization_id' => 'integer',
        'lat' => 'decimal',
        'lng' => 'decimal',
    ];

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
