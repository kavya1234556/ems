<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        "dept_id"
    ];
    public function departments(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
