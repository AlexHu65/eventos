<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;



class Conferencia extends Model
{

    use Resizable;

    protected $table ="conferencias";

    public function ponentes(){
        return  $this->belongsToMany(Ponente::class);
    }

    public function video(){
        return  $this->hasOne(Video::class ,'id_conferencia');
    }

}
