<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function requester(){
        return $this->belongsTo('App\User', 'requester_id');
    }
    
    public function assigner(){
        return $this->belongsTo('App\User', 'staff_id');
    }
    
    public function type(){
        return $this->belongsTo('App\TicketType', 'ticket_type_id');
    }
    
    public function priority(){
        return $this->belongsTo('App\TicketPriority', 'ticket_priority_id');
    }

    public function status(){
        return $this->belongsTo('App\TicketStatus', 'ticket_status_id');
    }
    
    public function equipments(){
        return $this->belongsToMany('App\Equipment');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
