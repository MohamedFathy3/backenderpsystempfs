<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\CountryResource;
use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends BaseController
{
    protected mixed $crudRepository;

    public function __construct(CountryRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }

    public function index()
    {
        try {
            $countries = CountryResource::collection($this->crudRepository->all(
                [],
                [],
                ['id', 'name', 'key', 'code', 'icon', 'order_id', 'active', 'created_at', 'updated_at', 'deleted_at']
            ));
            return $countries->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function store(CountryRequest $request)
    {
        try {
            $country = Country::create($request->validated());
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY), new CountryResource($country));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function show(Country $country): CountryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return (new CountryResource($country))->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        try {
            $country->update($request->validated());
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY), new CountryResource($country->fresh()));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $ids = (array) $request->input('items', []);
            if (!$ids) return JsonResponse::respondError('No countries selected.');
            Country::whereIn('id', $ids)->delete();
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request)
    {
        try {
            $ids = (array) $request->input('items', []);
            Country::onlyTrashed()->whereIn('id', $ids)->restore();
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request)
    {
        try {
            $ids = (array) $request->input('items', []);
            Country::withTrashed()->whereIn('id', $ids)->forceDelete();
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
