<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $fillable = [
        'user_id',
        'employee_name',
        'employee_email',
        'leave_type',
        'start_date',
        'end_date',
        'reason',
        'status',
    ];

    // Relationship — para malaman kung kanino ang leave request
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}