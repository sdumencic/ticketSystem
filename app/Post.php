<?php

namespace TicketSystem;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use Commentable;
    protected $table = 'posts'; //default?
    public $primaryKey = 'id';
    public $timestamps = true; //default

    public function user() {
        return $this->belongsTo('TicketSystem\User');
    }
}
