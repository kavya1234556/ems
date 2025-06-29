<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "phone",
        "position",
        "salary",
        "hire_date",
        "image",
        "department_id"
    ];
    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }
}
