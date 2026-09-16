<?php

namespace App\Http\Controllers\IT;

use App\Helpers\JsonResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\IT\CategoryRequest;
use App\Http\Resources\IT\CategoryResource;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(CategoryRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }


    public function index()
    {
        try {
            $Categories = CategoryResource::collection($this->crudRepository->all());
            return $Categories->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }



    public function store(CategoryRequest $request)
    {
        try {
            $this->crudRepository->create($request->validated());
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function show(Category $category): ?\Illuminate\Http\JsonResponse
    {
        try {
            return JsonResponse::respondSuccess('Item Fetched Successfully', new CategoryResource($category));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $data = $request->validated();
            $this->crudRepository->update($data, $category->id);
            activity()->performedOn($category)->withProperties(['attributes' => $category])->log('update');
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function destroy(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->deleteRecords('categories', $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->restoreItem(Category::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $exists = Category::whereIn('id', $request['items'])->exists();
            $exists = DB::table('categories')->whereIn('id', $request['items'])->exists();
            if (!$exists) {
                return JsonResponse::respondError("One or more records do not exist. Please refresh the page.");
            }
            $this->crudRepository->deleteRecordsFinial(category::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function categoryData(Request $request)
    {
        try {
            $categoryData = Category::get();
            return CategoryResource::collection($categoryData)->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
