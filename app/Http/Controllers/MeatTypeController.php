<?php

namespace App\Http\Controllers;

use App\DataTables\MeatTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMeatTypeRequest;
use App\Http\Requests\UpdateMeatTypeRequest;
use App\Repositories\MeatTypeRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MeatTypeController extends AppBaseController
{
    /** @var  MeatTypeRepository */
    private $meatTypeRepository;

    public function __construct(MeatTypeRepository $meatTypeRepo)
    {
        $this->meatTypeRepository = $meatTypeRepo;
    }

    /**
     * Display a listing of the MeatType.
     *
     * @param MeatTypeDataTable $meatTypeDataTable
     * @return Response
     */
    public function index(MeatTypeDataTable $meatTypeDataTable)
    {
        return $meatTypeDataTable->render('meat_types.index');
    }

    /**
     * Show the form for creating a new MeatType.
     *
     * @return Response
     */
    public function create()
    {
        return view('meat_types.create');
    }

    /**
     * Store a newly created MeatType in storage.
     *
     * @param CreateMeatTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateMeatTypeRequest $request)
    {
        $input = $request->all();

        $meatType = $this->meatTypeRepository->create($input);

        Flash::success('Meat Type saved successfully.');

        return redirect(route('meatTypes.index'));
    }

    /**
     * Display the specified MeatType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $meatType = $this->meatTypeRepository->find($id);

        if (empty($meatType)) {
            Flash::error('Meat Type not found');

            return redirect(route('meatTypes.index'));
        }

        return view('meat_types.show')->with('meatType', $meatType);
    }

    /**
     * Show the form for editing the specified MeatType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $meatType = $this->meatTypeRepository->find($id);

        if (empty($meatType)) {
            Flash::error('Meat Type not found');

            return redirect(route('meatTypes.index'));
        }

        return view('meat_types.edit')->with('meatType', $meatType);
    }

    /**
     * Update the specified MeatType in storage.
     *
     * @param  int              $id
     * @param UpdateMeatTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeatTypeRequest $request)
    {
        $meatType = $this->meatTypeRepository->find($id);

        if (empty($meatType)) {
            Flash::error('Meat Type not found');

            return redirect(route('meatTypes.index'));
        }

        $meatType = $this->meatTypeRepository->update($request->all(), $id);

        Flash::success('Meat Type updated successfully.');

        return redirect(route('meatTypes.index'));
    }

    /**
     * Remove the specified MeatType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $meatType = $this->meatTypeRepository->find($id);

        if (empty($meatType)) {
            Flash::error('Meat Type not found');

            return redirect(route('meatTypes.index'));
        }

        $this->meatTypeRepository->delete($id);

        Flash::success('Meat Type deleted successfully.');

        return redirect(route('meatTypes.index'));
    }
}
