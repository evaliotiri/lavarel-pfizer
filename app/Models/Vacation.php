<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacation extends Model
{
    use HasFactory;

    protected $fillable = ['to', 'from'];

    /**
     * Represents the one-to-many relationship between the User and Vacation tables by
     * exposing this function.
     *
     * @return BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
