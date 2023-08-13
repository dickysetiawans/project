<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // Define relationship to users, if applicable
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
