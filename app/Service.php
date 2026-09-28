<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';

    protected $fillable = [
        'creator_id',
        'category_id',
        'name',
        'description',
        'price',
        'estimated_days',
        'status'
    ];

    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}