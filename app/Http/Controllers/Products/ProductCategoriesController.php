<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductCategoryRequest;
use App\Repositories\Eloquent\Product\ProductCategoryRepository;
use Symfony\Component\HttpFoundation\Response;

class ProductCategoriesController extends Controller
{
    private $repository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        parent::__construct($productCategoryRepository);
        $this->repository = $productCategoryRepository;
    }

    public function store(ProductCategoryRequest $request)
    {
        return $this->successResponse(
            'created',
            $this->repository->create($request->all()),
            Response::HTTP_CREATED
        );
    }

    public function update(ProductCategoryRequest $request, int $id)
    {
        return  $this->successResponse(
            'updated',
            $this->repository->updateById($request->all(), $id),
            Response::HTTP_OK
        );
    }
}
