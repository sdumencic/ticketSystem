<?php

namespace TicketSystem;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; //default?
    public $primaryKey = 'id';
    public $timestamps = true; //default

    public function user() {
        return $this->belongsTo('TicketSystem\User');
    }
}
