<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Landlord
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
*/
class Landlord extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];
    
    
}
