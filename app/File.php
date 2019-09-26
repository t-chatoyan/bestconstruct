<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'offer_id'];

    /**
     * @var array
     */
    protected $appends = ['file_path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer()
    {
        return $this->belongsTo('App\Portfolio');
    }

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getFilePathAttribute()
    {
        if ($this->name !== '') {
            return url('/offer_file/' . $this->name);
        } else {
            return 'http://placehold.it/850x618';
        }
    }
}
