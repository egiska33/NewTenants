<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Document
 *
 * @package App
 * @property string $title
 * @property string $content
 * @property string $house
*/
class Document extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'house_id'];
    

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
