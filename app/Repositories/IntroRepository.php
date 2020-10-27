<?php

namespace App\Repositories;

use App\Models\Intro;
use App\Repositories\BaseRepository;

/**
 * Class IntroRepository
 * @package App\Repositories
 * @version October 24, 2020, 2:08 am UTC
*/

class IntroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'image'
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
        return Intro::class;
    }

    public function create($input)
   {
       $model = $this->model->newInstance($input);
       if (request()->hasFile('image')  ) {

           $logo = request()->image;
           $logo_new_name = time() . $logo->getClientOriginalName();
           $logo->move('uploads/intro/', $logo_new_name);

           $model->image = 'uploads/intro/'.$logo_new_name;
           $model->save();
       }
       $model->save();

       return $model;
   }
}
