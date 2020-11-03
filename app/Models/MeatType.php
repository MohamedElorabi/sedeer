<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MeatType
 * @package App\Models
 * @version October 26, 2020, 11:22 am UTC
 *
 * @property string $images
 * @property integer $age
 * @property string $slaughter_date
 * @property string $butcher_id
 */
class MeatType extends Model
{
    public $fillable = [
        'age',
        'slaughter_date',
        'butcher_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'age' => 'integer',
        'slaughter_date' => 'string',
        'butcher_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'age' => 'required',
        'slaughter_date' => 'required|date',
        'butcher_id' => 'required',

    ];

    public function butcher()
    {
      return $this->belongsTo('App\Models\Butchers');
    }

    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment','ref')->where('ref_type','App\Models\MeatType');
    }


}
