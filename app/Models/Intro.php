<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Intro
 * @package App\Models
 * @version October 24, 2020, 2:08 am UTC
 *
 * @property string $title
 * @property string $description
 * @property string $image
 */
class Intro extends Model
{
    use SoftDeletes;

    public $table = 'intros';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
