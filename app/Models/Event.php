<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'image',
        'address',
        'num_tickets',
        'user_id',
        'country_id',
        'city_id'
    ];

    protected $casts = [
        'start_date' => 'date:Y/m/d'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function savedEvents(): HasMany
    {
        return $this->hasMany(SavedEvent::class);
    }

    public function attendings(): HasMany
    {
        return $this->hasMany(Attending::class);
    }

    // 多対多
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    // hasTag($tag)は、LaravelのEloquentモデルで定義されているメソッドの一例で、特定のモデルが特定のタグを持っているかどうかをチェックできる。
    public function hasTag($tag)
    {
        return $this->tags->contains($tag); // $thisはEventモデル
    }
}
