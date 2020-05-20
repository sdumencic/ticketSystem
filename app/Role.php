<?php

namespace TicketSystem;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users() {
        return $this->belongsToMany('TicketSystem\User');
    }
}
