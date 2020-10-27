<?php

namespace App\Repositories;
use App\Classes\FileOperations;
use App\Models\MeatType;
use App\Repositories\BaseRepository;

/**
 * Class MeatTypeRepository
 * @package App\Repositories
 * @version October 26, 2020, 11:22 am UTC
*/

class MeatTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'age',
        'slaughter_date',
        'butcher_id'
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
        return MeatType::class;
    }

    public function create($input)
    {
        $model = $this->model->newInstance($input);

        if(request()->hasFile('attachments')){
            $images = request()->file('attachments');
            foreach ($images as $image) {
                $pathAfterUpload = FileOperations::StoreFileAs($this->directory, $image, str_random(10));
                $includesimage[] = $pathAfterUpload;
            }

            foreach ($includesimage as $key => $value) {
                $Attach_data[] = [
                    'value'=>$value
                ];
            }

            $model->attachments()->createMany($Attach_data);

        }

        $model->save();

        return $model;
    }
}
