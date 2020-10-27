<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMeatTypeAPIRequest;
use App\Http\Requests\API\UpdateMeatTypeAPIRequest;
use App\Models\MeatType;
use App\Repositories\MeatTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MeatTypeController
 * @package App\Http\Controllers\API
 */

class MeatTypeAPIController extends AppBaseController
{
    /** @var  MeatTypeRepository */
    private $meatTypeRepository;

    public function __construct(MeatTypeRepository $meatTypeRepo)
    {
        $this->meatTypeRepository = $meatTypeRepo;
    }

    /**
     * Display a listing of the MeatType.
     * GET|HEAD /meatTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $meatTypes = $this->meatTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($meatTypes->toArray(), 'Meat Types retrieved successfully');
    }

    /**
     * Store a newly created MeatType in storage.
     * POST /meatTypes
     *
     * @param CreateMeatTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMeatTypeAPIRequest $request)
    {
        $input = $request->all();

        $meatType = $this->meatTypeRepository->create($input);

        return $this->sendResponse($meatType->toArray(), 'Meat Type saved successfully');
    }

    /**
     * Display the specified MeatType.
     * GET|HEAD /meatTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MeatType $meatType */
        $meatType = $this->meatTypeRepository->find($id);

        if (empty($meatType)) {
            return $this->sendError('Meat Type not found');
        }

        return $this->sendResponse($meatType->toArray(), 'Meat Type retrieved successfully');
    }

    /**
     * Update the specified MeatType in storage.
     * PUT/PATCH /meatTypes/{id}
     *
     * @param int $id
     * @param UpdateMeatTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeatTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var MeatType $meatType */
        $meatType = $this->meatTypeRepository->find($id);

        if (empty($meatType)) {
            return $this->sendError('Meat Type not found');
        }

        $meatType = $this->meatTypeRepository->update($input, $id);

        return $this->sendResponse($meatType->toArray(), 'MeatType updated successfully');
    }

    /**
     * Remove the specified MeatType from storage.
     * DELETE /meatTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MeatType $meatType */
        $meatType = $this->meatTypeRepository->find($id);

        if (empty($meatType)) {
            return $this->sendError('Meat Type not found');
        }

        $meatType->delete();

        return $this->sendSuccess('Meat Type deleted successfully');
    }
}
