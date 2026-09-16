<?php

namespace App\Http\Controllers\IT;

use App\Http\Controllers\BaseController;

use App\Helpers\JsonResponse;
use App\Http\Requests\IT\TypeRequest;
use App\Http\Resources\IT\TypeResource;
use App\Interfaces\TypeRepositoryInterface;
use App\Models\Type;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(TypeRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }
    public function index()
    {
        try {
            $types = $this->crudRepository->all();

            $sorted = $types->sortBy(function ($item) {
                // لو الكود null نخليه رقم كبير علشان ييجي في الآخر
                if (is_null($item->code)) {
                    return PHP_INT_MAX;
                }

                // استخراج الرقم بعد IS وتحويله لعدد صحيح
                return (int) preg_replace('/[^0-9]/', '', $item->code);
            })->values();

            $types = TypeResource::collection($sorted);
            return $types->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function store(TypeRequest $request)
    {
        try {
            $this->crudRepository->create($request->validated());
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function show(Type $type): ?\Illuminate\Http\JsonResponse
    {
        try {
            return JsonResponse::respondSuccess('Item Fetched Successfully', new TypeResource($type));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function update(TypeRequest $request, Type $type)
    {
        try {
            $data = $request->validated();
            $this->crudRepository->update($data, $type->id);
            activity()->performedOn($type)->withProperties(['attributes' => $type])->log('update');
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function destroy(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->deleteRecords('types', $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->restoreItem(Type::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $exists = DB::table('types')->whereIn('id', $request['items'])->exists();
            if (!$exists) {
                return JsonResponse::respondError("One or more records do not exist. Please refresh the page.");
            }
            $this->crudRepository->deleteRecordsFinial(Type::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchType(Request $request)
    {
        try {
            $query = Type::query();

            if ($request->has('type') && !empty($request->type)) {
                $query->where('type', $request->type);
            }

            $TypeData = $query->get();

            return TypeResource::collection($TypeData)->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
