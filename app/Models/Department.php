<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    /**
     * Represents the one-to-many relationship between the Department and User tables by
     * exposing this function.
     *
     * @return HasMany
     */
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    /**
     * Represents the one-to-one relationship between the Department and User tables by exposing this function.
     * @return HasOne
     */
    public function manager(){
       return $this->hasOne('App\Models\User');
    }
}
