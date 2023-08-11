<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'entry_date', 'start_time', 'end_time'];
    // protected $dates = ['start_time', 'end_time','entry_date'];

    protected $casts = [
        'entry_date' => 'date',
        'start_time' => 'datetime:H:i:s', // Format for time only
        'end_time' => 'datetime:H:i:s',   
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function totalHours()
    {
        if ($this->end_time) {
            return $this->start_time->diffInHours($this->end_time);
        } else {
            return 0;
        }
    }
    
}
