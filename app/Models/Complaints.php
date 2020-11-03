<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Complaints
 * @package App\Models
 * @version October 24, 2020, 2:15 am UTC
 *
 * @property string $name
 * @property string $phone
 * @property string $complaints
 */
class Complaints extends Model
{

    public $table = 'complaints';





    public $fillable = [
        'name',
        'phone',
        'complaints'
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
        'complaints' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone' => 'required',
        'complaints' => 'required'
    ];


}
