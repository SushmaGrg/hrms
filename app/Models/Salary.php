<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'department_id',
        'month',
        'year',
        'basic_salary',
        'total_salary',
        'leave_deductions',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function department()
{
    return $this->belongsTo(Department::class);
}
}
