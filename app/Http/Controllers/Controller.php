<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginateRequest;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function index(PaginateRequest $request)
    {
        return $this->successResponse(
            'index',
            $this->repository->paginate($request->get('perPage', 10))
        );
    }

    public function show(int $id)
    {
        return $this->successResponse(
            'gotted',
            $this->repository->findById($id)
        );
    }

    public function destroy(int $id)
    {
        $this->repository->deleteById($id);
        return $this->successResponse('deleted');
    }

    public function successResponse($message, $data = null, $httpCode = Response::HTTP_OK)
    {
        return response()->json(
            [
                'success' => true,
                'message' => $message,
                'data' => $data
            ],
            $httpCode
        );
    }
}
