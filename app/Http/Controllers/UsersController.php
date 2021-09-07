<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserRequest;
use App\Repositories\Eloquent\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
        $this->repository = $userRepository;
    }

    public function store(UserRequest $request)
    {
        return $this->successResponse(
            'created',
            $this->repository->create($request->all()),
            Response::HTTP_CREATED
        );
    }

    public function update(UserRequest $request, int $id)
    {
        return  $this->successResponse(
            'updated',
            $this->repository->updateById($request->all(), $id),
            Response::HTTP_OK
        );
    }
}
