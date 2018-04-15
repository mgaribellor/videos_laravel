<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "tbm_estglobal";
	protected $fillable = ['id','nombre'];
	public $timestamps = false;
	protected $primaryKey = 'id';

	public function User()
    {
    	return $this->hasMany('App\User', 'estado_id');
    }	
}
