<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bill
 *
 * @package App
 * @property tinyInteger $type
 * @property decimal $total
 * @property string $house
*/
class Bill extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'total', 'house_id'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTotalAttribute($input)
    {
        $this->attributes['total'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setHouseIdAttribute($input)
    {
        $this->attributes['house_id'] = $input ? $input : null;
    }
    
    public function house()
    {
        return $this->belongsTo(House::class, 'house_id')->withTrashed();
    }
    
}
