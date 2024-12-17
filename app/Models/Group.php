<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'round_id', 'name', 'status'
    ];
    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
