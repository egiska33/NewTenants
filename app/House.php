<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class House
 *
 * @package App
 * @property string $city
 * @property string $address
 * @property string $tenant
*/
class House extends Model
{
    use SoftDeletes;

    protected $fillable = ['city', 'address', 'tenant_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTenantIdAttribute($input)
    {
        $this->attributes['tenant_id'] = $input ? $input : null;
    }
    
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id')->withTrashed();
    }
    
}
