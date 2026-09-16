<?php

namespace App\Http\Controllers\IT;

use App\Helpers\JsonResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\IT\OrganizationRequest;
use App\Http\Resources\IT\OrganizationResource;
use App\Interfaces\OrganizationRepositoryInterface;
use App\Models\Organization;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(OrganizationRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }
    public function updateOrganization(OrganizationRequest $request, Organization $organization)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('logo')) {
                // حذف الصورة القديمة
                if ($organization->avatar) {
                    $oldPath = public_path('storage/' . str_replace(asset('storage/'), '', $organization->avatar));
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                // رفع الصورة الجديدة وتخزين المسار فقط
                $path = $request->file('logo')->store('uploads', 'public');
                $data['avatar'] = $path;
            }

            $organization->update($data);

            activity()
                ->performedOn($organization)
                ->withProperties(['attributes' => $organization->toArray()])
                ->log('Organization updated');

            return JsonResponse::respondSuccess('Organization updated successfully');
        } catch (\Exception $e) {
            return JsonResponse::respondError('Failed to update organization: ' . $e->getMessage());
        }
    }

    public function index()
    {
        try {
            $organization = OrganizationResource::collection($this->crudRepository->all());
            return $organization->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function store(OrganizationRequest $request)
    {

        try {
            $data = $request->validated();

            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('uploads', 'public');
                $data['avatar'] = $path; // فقط الـ path بدون asset()
            }

            $model = $this->crudRepository->create($data);

            return new OrganizationResource($model);
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function show(Organization $organization): ?\Illuminate\Http\JsonResponse
    {
        try {
            return JsonResponse::respondSuccess('Item Fetched Successfully', new OrganizationResource($organization));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function update(OrganizationRequest $request, Organization $organization)
    {
        try {
            $data = $request->validated();

            // if ($request->hasFile('logo')) {
            //     // حذف الصورة القديمة لو موجودة
            //     if ($organization->avatar) {
            //         // avatar هنا بترجع URL، فلازم نجيب المسار الحقيقي
            //         $oldPath = public_path('storage/' . str_replace(asset('storage/'), '', $organization->avatar));
            //         if (file_exists($oldPath)) {
            //             unlink($oldPath);
            //         }
            //     }

            //     // تخزين فقط اسم الملف داخل قاعدة البيانات
            //     $path = $request->file('logo')->store('uploads', 'public');
            //     $data['avatar'] = $path; // هنا بنخزن المسار النسبي مش URL
            // }


            $organization->update($data);

            activity()->performedOn($organization)
                ->withProperties(['attributes' => $organization])
                ->log('update');

            return JsonResponse::respondSuccess('organization updated successfully');
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function destroy(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->deleteRecords('organizations', $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->restoreItem(Organization::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $exists = DB::table('organizations')->whereIn('id', $request['items'])->exists();
            if (!$exists) {
                return JsonResponse::respondError("One or more records do not exist. Please refresh the page.");
            }
            $this->crudRepository->deleteRecordsFinial(Organization::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchOrganization(Request $request)
    {
        try {
            $OrganizationData = Organization::get();
            return OrganizationResource::collection($OrganizationData)->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
