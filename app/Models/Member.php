<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use App\Traits\BelongsToOrganization;
class Member extends Model
{
    use AsSource, Filterable, Attachable;
    use HasFactory;
    use BelongsToOrganization;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
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
        'active' => 'boolean',
        'featured' => 'boolean',
        'organization_id' => 'integer',
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

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }
}
