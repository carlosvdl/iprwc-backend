<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'full_name', 'phone_number',
        'country', 'state', 'zip_code', 'city', 'street', 'house_number', 'house_number_suffix'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'is_admin'
    ];

    public function shoppingCart(): HasOne
    {
        return $this->hasOne(ShoppingCart::class)
            ->with('products');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return mixed
     */
    public function getJWTCustomClaims()
    {
        return [
            'id' => $this->getKey(),
            'email' => $this->email,
            'full_name' => $this->full_name,
            'is_admin' => $this->is_admin,
        ];
    }
}
