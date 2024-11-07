<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'address',
    ];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }
}
