<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs()
    {
        // тут связанный ключ relatedPivotKey: 'job_listing_id'
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
    }
}
