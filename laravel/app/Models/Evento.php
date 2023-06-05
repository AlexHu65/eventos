<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;


class Evento extends Model
{

    use Resizable;

    protected $table ="eventos";

    public function conferencias(){
     return  $this->belongsToMany(Conferencia::class);
    }
}
