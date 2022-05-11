<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'organization_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'organization_id' => 'integer',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function venues()
    {
        return $this->belongsToMany(Venue::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
