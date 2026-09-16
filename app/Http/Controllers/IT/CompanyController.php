<?php

namespace App\Http\Controllers\IT;

use App\Http\Controllers\BaseController;

use App\Helpers\JsonResponse;
use App\Http\Requests\IT\CompanyCreateRequest;
use App\Http\Requests\IT\CompanyUpdateRequest;
use App\Http\Resources\IT\CompanyOnlyResource;
use App\Http\Resources\IT\CompanyResource;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(CompanyRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }

    public function index()
    {
        try {
            $companies = CompanyResource::collection($this->crudRepository->all());
            return $companies->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function store(CompanyCreateRequest $request)
    {

        try {
            $data = $request->validated();

            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('uploads', 'public');
                $data['avatar'] = $path; // فقط الـ path بدون asset()
            }

            $model = $this->crudRepository->create($data);

            return new CompanyResource($model);
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function updateCompany(CompanyUpdateRequest $request, Company $company)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('avatar')) {
                // حذف الصورة القديمة
                if ($company->avatar) {
                    $oldPath = public_path('storage/' . str_replace(asset('storage/'), '', $company->avatar));
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                // رفع الصورة الجديدة وتخزين المسار فقط
                $path = $request->file('avatar')->store('uploads', 'public');
                $data['avatar'] = $path;
            }

            $company->update($data);

            activity()
                ->performedOn($company)
                ->withProperties(['attributes' => $company->toArray()])
                ->log('Company updated');

            return JsonResponse::respondSuccess('Company updated successfully');
        } catch (\Exception $e) {
            return JsonResponse::respondError('Failed to update Company: ' . $e->getMessage());
        }
    }

    // public function store(CompanyCreateRequest $request)
    // {
    //     try {
    //         $this->crudRepository->create($request->validated());
    //         return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY));
    //     } catch (Exception $e) {
    //         return JsonResponse::respondError($e->getMessage());
    //     }
    // }

    public function show(Company $company): ?\Illuminate\Http\JsonResponse
    {
        try {
            return JsonResponse::respondSuccess('Item Fetched Successfully', new CompanyResource($company));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        try {
            $data = $request->validated();
            $this->crudRepository->update($data, $company->id);
            activity()->performedOn($company)->withProperties(['attributes' => $company])->log('update');
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function destroy(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->deleteRecords('companies', $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->restoreItem(company::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $exists = DB::table('companies')->whereIn('id', $request['items'])->exists();
            if (!$exists) {
                return JsonResponse::respondError("One or more records do not exist. Please refresh the page.");
            }
            $this->crudRepository->deleteRecordsFinial(company::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function fetchCompany(Request $request)
    {
        try {
            $CompanyData = company::get();
            return CompanyOnlyResource::collection($CompanyData)->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
