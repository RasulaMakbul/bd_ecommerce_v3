<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    public function commentedBy()
    {
        return $this->belongsTO(User::class, 'commented_by');
    }
}
