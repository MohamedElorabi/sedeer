<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Butchers
 * @package App\Models
 * @version October 25, 2020, 12:22 pm UTC
 *
 * @property string $name
 * @property string $phone
 * @property string $image
 * @property string $address
 * @property number $longitude
 * @property number $latituede
 * @property integer $views
 */
class Butchers extends Model
{
    use SoftDeletes;

    public $table = 'butchers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'phone',
        'image',
        'address',
        'longitude',
        'latituede',
        'views'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'image' => 'string',
        'address' => 'string',
        'longitude' => 'decimal:2',
        'latituede' => 'decimal:2',
        'views' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function meat_types()
    {
      return $this->hasMany('App\MeatType');
    }

}
