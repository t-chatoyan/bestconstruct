<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['first_name', 'last_name', 'position', 'image', 'description'];

    protected $appends = ['photo_path'];

    public function getPhotoPathAttribute()
    {
        if ($this->image !== '') {
            return url('/img/clients/' . $this->image);
        } else {
            return 'http://placehold.it/850x618';
        }
    }
}
