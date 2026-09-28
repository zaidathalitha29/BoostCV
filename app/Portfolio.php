<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'creator_id',
        'title',
        'image'
    ];

    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }
}