<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'price',
        'rooms',
        'square',
        'description',
        'gender',
        'user_id',
        'branch_id',
        'status_id',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');

    }

    public function images(): HasMany
    {
        return $this->hasMany(AdImage::class);
    }
}
