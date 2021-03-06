<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Event extends Model
{
    use HasFactory;
    use AsSource, Filterable, Attachable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'users',
        'start_date',
        'end_date',
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'youtube',
        'phone',
        'email',
        'website',
        'profile_image',
        'active',
        'featured',
        'description',
        'excerpt',
        'organization_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'timestamp',
        'end_date' => 'timestamp',
        'active' => 'boolean',
        'featured' => 'boolean',
        'organization_id' => 'integer',
        'users' => 'array'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
