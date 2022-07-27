<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'transaction';

    protected $fillable = ['description','total','id_user','id_type_transaction','id_type_currency'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function currency()
    {
        return $this->hasOne('App\Models\Currency', 'id', 'id_type_currency');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeTransaction()
    {
        return $this->hasOne('App\Models\TypeTransaction', 'id', 'id_type_transaction');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    
}
