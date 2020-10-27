<?php

namespace App\Repositories;

use App\Models\Complaints;
use App\Repositories\BaseRepository;

/**
 * Class ComplaintsRepository
 * @package App\Repositories
 * @version October 24, 2020, 2:15 am UTC
*/

class ComplaintsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'complaints'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Complaints::class;
    }
}
