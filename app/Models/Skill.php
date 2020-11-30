<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['title'];


    /**
     * Represents the one-to-many relationship between the User and Vacation tables by
     * exposing this function.
     *
     * @return BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, 'users_skills');
    }
}
