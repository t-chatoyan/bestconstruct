<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'profession', 'image' ];

    /**
     * @var array
     */
    protected $appends = ['photo_path'];

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getPhotoPathAttribute()
    {
        if ($this->image !== '') {
            return url('/img/team/' . $this->image);
        } else {
            return 'http://placehold.it/850x618';
        }
    }
}
