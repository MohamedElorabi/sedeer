<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateButchersAPIRequest;
use App\Http\Requests\API\UpdateButchersAPIRequest;
use App\Models\Butchers;
use App\Repositories\ButchersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ButchersController
 * @package App\Http\Controllers\API
 */

class ButchersAPIController extends AppBaseController
{
    /** @var  ButchersRepository */
    private $butchersRepository;

    public function __construct(ButchersRepository $butchersRepo)
    {
        $this->butchersRepository = $butchersRepo;
    }

    /**
     * Display a listing of the Butchers.
     * GET|HEAD /butchers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $butchers = $this->butchersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($butchers->toArray(), 'Butchers retrieved successfully');
    }

    /**
     * Store a newly created Butchers in storage.
     * POST /butchers
     *
     * @param CreateButchersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateButchersAPIRequest $request)
    {
        $input = $request->all();

        $butchers = $this->butchersRepository->create($input);

        return $this->sendResponse($butchers->toArray(), 'Butchers saved successfully');
    }

    /**
     * Display the specified Butchers.
     * GET|HEAD /butchers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Butchers $butchers */
        $butchers = $this->butchersRepository->find($id);

        if (empty($butchers)) {
            return $this->sendError('Butchers not found');
        }

        return $this->sendResponse($butchers->toArray(), 'Butchers retrieved successfully');
    }

    /**
     * Update the specified Butchers in storage.
     * PUT/PATCH /butchers/{id}
     *
     * @param int $id
     * @param UpdateButchersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateButchersAPIRequest $request)
    {
        $input = $request->all();

        /** @var Butchers $butchers */
        $butchers = $this->butchersRepository->find($id);

        if (empty($butchers)) {
            return $this->sendError('Butchers not found');
        }

        $butchers = $this->butchersRepository->update($input, $id);

        return $this->sendResponse($butchers->toArray(), 'Butchers updated successfully');
    }

    /**
     * Remove the specified Butchers from storage.
     * DELETE /butchers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Butchers $butchers */
        $butchers = $this->butchersRepository->find($id);

        if (empty($butchers)) {
            return $this->sendError('Butchers not found');
        }

        $butchers->delete();

        return $this->sendSuccess('Butchers deleted successfully');
    }

    public function favorites(Request $request)
    {

        $favorites = $request->user()->butchers()->paginate(10);

        return responseJson(1, 'success', $favorites);
    }


    public function addFavorites(Request $request)
    {
        $currentUser = Auth::user();

    }




}
