<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Laravel\Sanctum\HasApiTokens;
class Organization extends Model
{
    use HasFactory;
    use AsSource, Filterable, Attachable;
    use HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'contact_name',
        'contact_email',
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'youtube',
        'contact_phone',
        'website',
        'description',
        'api_key'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function amenities()
    {
        return $this->hasMany(Amenity::class);
    }
}
