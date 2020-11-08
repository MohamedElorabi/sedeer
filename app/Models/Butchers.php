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

    public $table = 'butchers';





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
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'phone' => 'required|min:11|numeric|unique:butchers',
        'image' => 'required|mimes:jpeg,bmp,png,jpg',
        'address' => 'required|max:255',
        'longitude' => 'required|numeric|between:0.001,99.99',
        'latituede' => 'required|numeric|between:0.001,99.99',
    ];

    public function meat_types()
    {
      return $this->hasMany(MeatType::class,'butcher_id','id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function view_butchers()
    {
        return $this-> hasMany('App\Models\ButcherView');
    }

}
