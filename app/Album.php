<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table='albums';
    protected $fillqable=array('name','description','cover_image');

    public function photos()
    {
      return  $this->hasMany('App\Photo');
    }
}
