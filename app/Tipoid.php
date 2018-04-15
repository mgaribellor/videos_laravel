<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Tipoid extends Model
{
    protected $table = "tbm_tiposid";
	protected $fillable = ['id','nombre','prefijo'];
	public $timestamps = false;
	protected $primaryKey = 'id';
	
	public function User()
	{
		return $this->hasMany('App\User', 'tipo_id');
	}
}
