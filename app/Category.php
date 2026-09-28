<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
