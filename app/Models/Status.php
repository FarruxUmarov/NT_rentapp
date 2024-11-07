<?php

namespace App\Models;

use App\View\Components\Ads;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    public $fillable = [
        'status'
    ];

    const int ACTIVE = 1;
    const int INACTIVE = 2;

    public $timestamps = false;
    public function ads(): HasMany
    {
        return $this->hasMany(Ads::class);
    }
}
