<?php

namespace App\Http\Controllers;

use App\DataTables\IntroDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIntroRequest;
use App\Http\Requests\UpdateIntroRequest;
use App\Repositories\IntroRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class IntroController extends AppBaseController
{
    /** @var  IntroRepository */
    private $introRepository;

    public function __construct(IntroRepository $introRepo)
    {
        $this->introRepository = $introRepo;
    }

    /**
     * Display a listing of the Intro.
     *
     * @param IntroDataTable $introDataTable
     * @return Response
     */
    public function index(IntroDataTable $introDataTable)
    {
        return $introDataTable->render('intros.index', ['title' => 'Intro']);
    }

    /**
     * Show the form for creating a new Intro.
     *
     * @return Response
     */
    public function create()
    {
        return view('intros.create', ['title' => 'Create Intro']);
    }

    /**
     * Store a newly created Intro in storage.
     *
     * @param CreateIntroRequest $request
     *
     * @return Response
     */
    public function store(CreateIntroRequest $request)
    {
        $input = $request->all();

        $intro = $this->introRepository->create($input);

        Flash::success('Intro saved successfully.');

        return redirect(route('intros.index'));
    }

    /**
     * Display the specified Intro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $intro = $this->introRepository->find($id);

        if (empty($intro)) {
            Flash::error('Intro not found');

            return redirect(route('intros.index'));
        }

        return view('intros.show')->with('intro', $intro);
    }

    /**
     * Show the form for editing the specified Intro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $intro = $this->introRepository->find($id);

        if (empty($intro)) {
            Flash::error('Intro not found');

            return redirect(route('intros.index'));
        }

        return view('intros.edit', ['title' => 'Edit Intro'])->with('intro', $intro);
    }

    /**
     * Update the specified Intro in storage.
     *
     * @param  int              $id
     * @param UpdateIntroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntroRequest $request)
    {
        $intro = $this->introRepository->find($id);

        if (empty($intro)) {
            Flash::error('Intro not found');

            return redirect(route('intros.index'));
        }

        $intro = $this->introRepository->update($request->all(), $id);

        Flash::success('Intro updated successfully.');

        return redirect(route('intros.index'));
    }

    /**
     * Remove the specified Intro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $intro = $this->introRepository->find($id);

        if (empty($intro)) {
            Flash::error('Intro not found');

            return redirect(route('intros.index'));
        }

        $this->introRepository->delete($id);

        Flash::success('Intro deleted successfully.');

        return redirect(route('intros.index'));
    }
}
