<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Repositories\Eloquent\Product\ProductRepository;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    private $repository;

    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct($productRepository);
        $this->repository = $productRepository;
    }

    public function store(ProductRequest $request)
    {
        return $this->successResponse(
            'created',
            $this->repository->create($request->all()),
            Response::HTTP_CREATED
        );
    }

    public function update(ProductRequest $request, int $id)
    {
        return  $this->successResponse(
            'updated',
            $this->repository->updateById($request->all(), $id),
            Response::HTTP_OK
        );
    }
}
