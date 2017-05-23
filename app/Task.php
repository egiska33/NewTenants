<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Task
 *
 * @package App
 * @property text $content
 * @property string $photo
 * @property string $house
*/
class Task extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['content', 'photo', 'house_id'];
    

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
