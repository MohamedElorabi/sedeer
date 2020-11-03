<?php

namespace App\Http\Controllers;

use App\DataTables\ButchersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateButchersRequest;
use App\Http\Requests\UpdateButchersRequest;
use App\Repositories\ButchersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ButchersController extends AppBaseController
{
    /** @var  ButchersRepository */
    private $butchersRepository;

    public function __construct(ButchersRepository $butchersRepo)
    {
        $this->butchersRepository = $butchersRepo;
    }

    /**
     * Display a listing of the Butchers.
     *
     * @param ButchersDataTable $butchersDataTable
     * @return Response
     */
    public function index(ButchersDataTable $butchersDataTable)
    {
        return $butchersDataTable->render('butchers.index', ['title' => 'Butchers']);
    }

    /**
     * Show the form for creating a new Butchers.
     *
     * @return Response
     */
    public function create()
    {
        return view('butchers.create', ['title' => 'Create Butchers']);
    }

    /**
     * Store a newly created Butchers in storage.
     *
     * @param CreateButchersRequest $request
     *
     * @return Response
     */
    public function store(CreateButchersRequest $request)
    {
        $input = $request->all();

        $butchers = $this->butchersRepository->create($input);

        Flash::success('Butchers saved successfully.');

        return redirect(route('butchers.index'));
    }

    /**
     * Display the specified Butchers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $butchers = $this->butchersRepository->find($id);

        if (empty($butchers)) {
            Flash::error('Butchers not found');

            return redirect(route('butchers.index'));
        }

        return view('butchers.show')->with('butchers', $butchers);
    }

    /**
     * Show the form for editing the specified Butchers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $butchers = $this->butchersRepository->find($id);

        if (empty($butchers)) {
            Flash::error('Butchers not found');

            return redirect(route('butchers.index'));
        }

        return view('butchers.edit', ['title' => 'Edit Butchers'])->with('butchers', $butchers);
    }

    /**
     * Update the specified Butchers in storage.
     *
     * @param  int              $id
     * @param UpdateButchersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateButchersRequest $request)
    {
        $butchers = $this->butchersRepository->find($id);

        if (empty($butchers)) {
            Flash::error('Butchers not found');

            return redirect(route('butchers.index'));
        }

        $butchers = $this->butchersRepository->update($request->all(), $id);

        Flash::success('Butchers updated successfully.');

        return redirect(route('butchers.index'));
    }

    /**
     * Remove the specified Butchers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $butchers = $this->butchersRepository->find($id);

        if (empty($butchers)) {
            Flash::error('Butchers not found');

            return redirect(route('butchers.index'));
        }

        $this->butchersRepository->delete($id);

        Flash::success('Butchers deleted successfully.');

        return redirect(route('butchers.index'));
    }
}
