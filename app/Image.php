<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'is_main', 'portfolio_id'];

    protected $appends = ['photo_path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function portfolio()
    {
        return $this->belongsTo('App\Portfolio');
    }

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getPhotoPathAttribute()
    {
        if ($this->name !== '') {
            return url('/img/portfolio/' . $this->name);
        } else {
            return 'http://placehold.it/850x618';
        }
    }
}
