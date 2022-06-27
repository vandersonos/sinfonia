<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaFavoritesUsers extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'media_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function media()
    {
        return $this->hasOne(Media::class);
    }
}
