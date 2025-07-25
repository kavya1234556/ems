<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "created_by"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
