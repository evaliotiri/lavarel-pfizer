<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * Created for storing the specific details of the manager. Not user for increasing the time and space complexity.
 *
 * @package App\Models
 */
class Manager extends User
{
    use HasFactory;

    /**
     * Represents the one-to-one relationship between the Department and User tables by exposing this function.
     * @return BelongsTo
     */
    public function department(){
       return $this->belongsTo('App\Models\Department', 'manager_id');
    }
}
