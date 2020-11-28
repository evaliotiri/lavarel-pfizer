<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['fullName', 'upperCasedEmail'];

    /**
     * Sets and encrypts the password.
     *
     * @param $value
     */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Returns the full name
     *
     * @return string
     */
    public function getFullNameAttribute() {
        return "{$this->attributes['firstName']} {$this->attributes['lastName']}";
    }

    /**
     * Returns the email to upper case.
     *
     * @return string
     */
    public function getUpperCasedEmailAttribute(){
        return strtoupper($this->attributes['email']);
    }


    /**
     * Represents the many-to-many relationship between the User and Skill tables by
     * exposing this function.
     *
     * @return BelongsToMany
     */
    public function skills(){
        return $this->belongsToMany(Skill::class, 'users_skills');
    }

    /**
     * Represents the one-to-many relationship between the User and Vacation tables by
     * exposing this function.
     *
     * @return HasMany
     */
    public function vacations(){
        return $this->hasMany('App\Models\Vacation');
    }

    /**
     * Represents the one-to-one relationship between the Department and User tables by exposing this function.
     * @return BelongsTo
     */
    public function department(){
      return $this->belongsTo('App\Models\Department');
    }

}
