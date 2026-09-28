<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $table = 'creators';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'bio',
        'phone',
        'profile_photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function orders()
    {
        return $this->hasManyThrough(
            Order::class,
            Service::class,
            'creator_id',
            'service_id',
            'id',
            'id'
        );
    }
}