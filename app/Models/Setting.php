<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 * @package App\Models
 * @version October 24, 2020, 2:25 am UTC
 *
 * @property string $about
 * @property string $terms_of_use
 */
class Setting extends Model
{

    public $table = 'settings';




    public $fillable = [
        'about',
        'terms_of_use'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'about' => 'string',
        'terms_of_use' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
