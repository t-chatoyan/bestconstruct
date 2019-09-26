<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'name', 'code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function portfolio()
    {
        return $this->belongsToMany('App\Portfolio', 'portfolio_categories');
    }
}
