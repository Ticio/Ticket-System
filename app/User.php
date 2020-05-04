<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPhoto($w = null, $h = null){
        if (!empty($this->avatar)){
            if ($this->avatar == "users/default.png"){
                $path = "storage/users/default.png";
            }else{
                $path = 'storage/images/profile/'.$this->avatar;
            }
        }else {
            $path = "storage/users/default.png";
        }

        if ($w == null && $h == null){
            return url('/'.$path);
        }
        
        $image = '/resizer.php?';

        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;

        $image .= '&zc=1';
        $image .= '&src='.$path;
        
        return url($image);
    }

    public function requests(){
        return $this->hasMany('App\Ticket', 'requester_id');
    }

    public function assignments(){
        return $this->hasMany('App\Ticket', 'staff_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
