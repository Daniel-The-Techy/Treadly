<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'actor_id',
        'target_id',
        'type',
        'subject_type',
        'subject_id',
    ];


    public function actor() {
           return $this->belongsTo(User::class, 'actor_id');
    }

    public function target(){
        return $this->belongsTo(User::class, 'target_id');
    }

    public function subject() {
          return $this->morphTo();
    }
}
