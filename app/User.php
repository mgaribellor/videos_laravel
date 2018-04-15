<?php

namespace App;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','role','name','surname','email','usuario','image','estado_id','created_at','updated_at','remember_token', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = true;
    protected $primaryKey = 'id';
    
    public function Tipoid()
    {
        return $this->belongsTo('App\Tipoid', 'tipo_id');
    }
        public function Estadoid()
    {
        return $this->belongsTo('App\Estado', 'estado_id');
    }
}
