<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tenant
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $landlord
*/
class Tenant extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'landlord_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLandlordIdAttribute($input)
    {
        $this->attributes['landlord_id'] = $input ? $input : null;
    }
    
    public function landlord()
    {
        return $this->belongsTo(Landlord::class, 'landlord_id')->withTrashed();
    }
    
}
