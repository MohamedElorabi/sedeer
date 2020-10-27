<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIntroAPIRequest;
use App\Http\Requests\API\UpdateIntroAPIRequest;
use App\Models\Intro;
use App\Repositories\IntroRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IntroController
 * @package App\Http\Controllers\API
 */

class IntroAPIController extends AppBaseController
{
    /** @var  IntroRepository */
    private $introRepository;

    public function __construct(IntroRepository $introRepo)
    {
        $this->introRepository = $introRepo;
    }

    /**
     * Display a listing of the Intro.
     * GET|HEAD /intros
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $intros = $this->introRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($intros->toArray(), 'Intros retrieved successfully');
    }

    /**
     * Store a newly created Intro in storage.
     * POST /intros
     *
     * @param CreateIntroAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIntroAPIRequest $request)
    {
        $input = $request->all();

        $intro = $this->introRepository->create($input);

        return $this->sendResponse($intro->toArray(), 'Intro saved successfully');
    }

    /**
     * Display the specified Intro.
     * GET|HEAD /intros/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Intro $intro */
        $intro = $this->introRepository->find($id);

        if (empty($intro)) {
            return $this->sendError('Intro not found');
        }

        return $this->sendResponse($intro->toArray(), 'Intro retrieved successfully');
    }

    /**
     * Update the specified Intro in storage.
     * PUT/PATCH /intros/{id}
     *
     * @param int $id
     * @param UpdateIntroAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntroAPIRequest $request)
    {
        $input = $request->all();

        /** @var Intro $intro */
        $intro = $this->introRepository->find($id);

        if (empty($intro)) {
            return $this->sendError('Intro not found');
        }

        $intro = $this->introRepository->update($input, $id);

        return $this->sendResponse($intro->toArray(), 'Intro updated successfully');
    }

    /**
     * Remove the specified Intro from storage.
     * DELETE /intros/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Intro $intro */
        $intro = $this->introRepository->find($id);

        if (empty($intro)) {
            return $this->sendError('Intro not found');
        }

        $intro->delete();

        return $this->sendSuccess('Intro deleted successfully');
    }
}
