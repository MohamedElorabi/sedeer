<?php

namespace App\Repositories;

use App\Models\Butchers;
use App\Models\ButcherView;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class ButchersRepository
 * @package App\Repositories
 * @version October 25, 2020, 12:22 pm UTC
*/

class ButchersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'image',
        'address',
        'longitude',
        'latituede',
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
        return Butchers::class;
    }

    public function create($input)
   {
       $model = $this->model->newInstance($input);
       if (request()->hasFile('image')  ) {

           $logo = request()->image;
           $logo_new_name = time() . $logo->getClientOriginalName();
           $logo->move('uploads/butchers/', $logo_new_name);

           $model->image = 'uploads/butchers/'.$logo_new_name;
           $model->save();
       }
       $model->save();

       return $model;
   }


    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }




}
