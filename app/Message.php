<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 *
 * @package App
 * @property string $content
 * @property string $time
 * @property string $house
*/
class Message extends Model
{
    use SoftDeletes;

    protected $fillable = ['content', 'time', 'house_id'];
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['time'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTimeAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
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
