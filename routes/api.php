<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\IT\BrandController;
use App\Http\Controllers\IT\CategoryController;
use App\Http\Controllers\IT\CompanyController;
use App\Http\Controllers\IT\DepartmentController;
use App\Http\Controllers\IT\DeviceController;
use App\Http\Controllers\IT\DeviceModelController;
use App\Http\Controllers\IT\DeviceStatusController;
use App\Http\Controllers\IT\EquipmentStatusController;
use App\Http\Controllers\IT\GraphicCardController;
use App\Http\Controllers\IT\MemoryController;
use App\Http\Controllers\IT\OrganizationController;
use App\Http\Controllers\IT\PositionController;
use App\Http\Controllers\IT\ProcessorController;
use App\Http\Controllers\IT\ReplyController;
use App\Http\Controllers\IT\ReportController;
use App\Http\Controllers\IT\StorageController;
use App\Http\Controllers\IT\TicketController;
use App\Http\Controllers\IT\TypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [UserController::class, 'login']);
Route::post('verify-email', [UserController::class, 'verifyEmail']);
Route::post('check-verification-code', [UserController::class, 'checkVerificationCode']);

Route::group(['middleware' => ['auth:sanctum']], static fn(): array => [
    Route::get('fetch-auth', [UserController::class, 'getDashUser']),
    Route::post('/logout', [UserController::class, 'logout']),

    //employee
    // api code verify
    Route::post('complete/user/profile/{id}', [UserController::class, 'completeUserProfile']),
    Route::post('user/add-favorite', [UserController::class, 'addFavorite']),
]);



//                                            ADMIN


//////////////////////////////////////////////////////////admin//////////////////////////////////////
Route::middleware(['auth:sanctum'])->group(function () {
Route::post('user/index', [UserController::class, 'index']);
Route::post('user/create-many', [UserController::class, 'createMany']);
Route::put('/user/{id}/{column}', [UserController::class, 'toggle']);
Route::post('user/restore', [UserController::class, 'restore']);
Route::delete('user/delete', [UserController::class, 'destroy']);
Route::get('user/code/next', [UserController::class, 'nextCode']);
Route::post('update/user/{user}', [UserController::class, 'updateUser']);
Route::delete('user/forceDelete', [UserController::class, 'forceDelete']);
Route::apiResource('user', UserController::class);

//////////////////////////////////////////////////////////admin//////////////////////////////////////



//                                            Company
//////////////////////////////////////////////////////////company//////////////////////////////////////

Route::post('company/index', [CompanyController::class, 'index']);
Route::post('company/restore', [CompanyController::class, 'restore']);
Route::delete('company/delete', [CompanyController::class, 'destroy']);
Route::delete('company/forceDelete', [CompanyController::class, 'forceDelete']);
Route::post('update/company/{company}', [CompanyController::class, 'updateCompany']);
Route::get('company/code/next', [CompanyController::class, 'nextCode']);

Route::apiResource('company', CompanyController::class);
Route::get('fetch-company', [CompanyController::class, 'fetchCompany']);

//////////////////////////////////////////////////////////company//////////////////////////////////////




//                                            Department
//////////////////////////////////////////////////////////department//////////////////////////////////////
Route::post('department/index', [DepartmentController::class, 'index']);
Route::post('department/restore', [DepartmentController::class, 'restore']);
Route::delete('department/delete', [DepartmentController::class, 'destroy']);
Route::delete('department/forceDelete', [DepartmentController::class, 'forceDelete']);
Route::get('department/code/next', [DepartmentController::class, 'nextCode']);
Route::apiResource('department', DepartmentController::class);
Route::get('fetch-department', [DepartmentController::class, 'fetchDepartment']);

//////////////////////////////////////////////////////////department//////////////////////////////////////




//                                            Role
//////////////////////////////////////////////////////////role//////////////////////////////////////
Route::post('role/index', [RoleController::class, 'index'])->middleware('permission:roles.view');
Route::post('role/restore', [RoleController::class, 'restore'])->middleware('permission:roles.update');
Route::delete('role/delete', [RoleController::class, 'destroy'])->middleware('permission:roles.delete');
Route::delete('role/forceDelete', [RoleController::class, 'forceDelete'])->middleware('permission:roles.delete');
Route::get('role/code/next', [RoleController::class, 'nextCode']);
Route::apiResource('role', RoleController::class)->middleware('permission:roles.view');
Route::get('fetch-role', [RoleController::class, 'fetchRole'])->middleware('permission:roles.view');

//////////////////////////////////////////////////////////role///////////////////////////////////////


//                                            Permission
//////////////////////////////////////////////////////////Permission//////////////////////////////////////
Route::post('permission/index', [PermissionController::class, 'index'])->middleware('permission:permissions.view');
Route::post('permission/restore', [PermissionController::class, 'restore'])->middleware('permission:permissions.update');
Route::delete('permission/delete', [PermissionController::class, 'destroy'])->middleware('permission:permissions.delete');
Route::delete('permission/forceDelete', [PermissionController::class, 'forceDelete'])->middleware('permission:permissions.delete');
Route::get('permission/code/next', [PermissionController::class, 'nextCode']);
Route::apiResource('permission', PermissionController::class)->middleware('permission:permissions.view');
Route::get('fetch-permission', [PermissionController::class, 'fetchPermission'])->middleware('permission:permissions.view');

Route::post('/roles/{role}/permissions', [PermissionController::class, 'assignPermissions'])->middleware('permission:roles.update');
Route::post('/users/{user}/roles', [PermissionController::class, 'assignRole'])->middleware('permission:roles.update');
Route::post('/users/{user}/permissions', [PermissionController::class, 'assignPermissionsToUser'])->middleware('permission:permissions.update');
//////////////////////////////////////////////////////////Permission///////////////////////////////////////





//                                            Brand
//////////////////////////////////////////////////////////Brand//////////////////////////////////////
Route::post('brand/index', [BrandController::class, 'index']);
Route::post('brand/restore', [BrandController::class, 'restore']);
Route::delete('brand/delete', [BrandController::class, 'destroy']);
Route::delete('brand/forceDelete', [BrandController::class, 'forceDelete']);
Route::get('brand/code/next', [BrandController::class, 'nextCode']);
Route::apiResource('brand', BrandController::class);
Route::get('fetch-brand', [BrandController::class, 'fetchBrand']);

//////////////////////////////////////////////////////////Brand//////////////////////////////////////






//                                            Memory
//////////////////////////////////////////////////////////Memory//////////////////////////////////////
Route::post('memory/index', [MemoryController::class, 'index']);
Route::post('memory/restore', [MemoryController::class, 'restore']);
Route::delete('memory/delete', [MemoryController::class, 'destroy']);
Route::delete('memory/forceDelete', [MemoryController::class, 'forceDelete']);
Route::get('memory/code/next', [MemoryController::class, 'nextCode']);
Route::apiResource('memory', MemoryController::class);
Route::get('fetch-memory', [MemoryController::class, 'fetchMemory']);

//////////////////////////////////////////////////////////Memory//////////////////////////////////////





//                                            Storage
//////////////////////////////////////////////////////////Storage//////////////////////////////////////
Route::post('storage/index', [StorageController::class, 'index']);
Route::post('storage/restore', [StorageController::class, 'restore']);
Route::delete('storage/delete', [StorageController::class, 'destroy']);
Route::delete('storage/forceDelete', [StorageController::class, 'forceDelete']);
Route::get('storage/code/next', [StorageController::class, 'nextCode']);
Route::apiResource('storage', StorageController::class);
Route::get('fetch-storage', [StorageController::class, 'fetchStorage']);

//////////////////////////////////////////////////////////Storage//////////////////////////////////////




//                                            Processor
//////////////////////////////////////////////////////////Processor//////////////////////////////////////
Route::post('processor/index', [ProcessorController::class, 'index']);
Route::post('processor/restore', [ProcessorController::class, 'restore']);
Route::delete('processor/delete', [ProcessorController::class, 'destroy']);
Route::delete('processor/forceDelete', [ProcessorController::class, 'forceDelete']);
Route::get('processor/code/next', [ProcessorController::class, 'nextCode']);
Route::apiResource('processor', ProcessorController::class);
Route::get('fetch-processor', [ProcessorController::class, 'fetchProcessor']);

//////////////////////////////////////////////////////////Processor//////////////////////////////////////





//                                            DeviceModel
//////////////////////////////////////////////////////////Storage//////////////////////////////////////
Route::post('device-model/index', [DeviceModelController::class, 'index']);
Route::post('device-model/restore', [DeviceModelController::class, 'restore']);
Route::delete('device-model/delete', [DeviceModelController::class, 'destroy']);
Route::delete('device-model/forceDelete', [DeviceModelController::class, 'forceDelete']);
Route::get('device-model/code/next', [DeviceModelController::class, 'nextCode']);
Route::apiResource('device-model', DeviceModelController::class);
Route::get('fetch-device-model', [DeviceModelController::class, 'fetchDeviceModel']);

//////////////////////////////////////////////////////////DeviceModel//////////////////////////////////////






//                                        Graphic Card
////////////////////////////////////////////////////////// Graphic Card//////////////////////////////////////
Route::post('graphic-card/index', [GraphicCardController::class, 'index']);
Route::post('graphic-card/restore', [graphicCardController::class, 'restore']);
Route::delete('graphic-card/delete', [graphicCardController::class, 'destroy']);
Route::delete('graphic-card/forceDelete', [graphicCardController::class, 'forceDelete']);
Route::apiResource('graphic-card', graphicCardController::class);
Route::get('/graphic-card/code/next', [graphicCardController::class, 'nextCode']);
Route::get('fetch-graphic-card', [graphicCardController::class, 'fetchGraphicCard']);
////////////////////////////////////////////////////////// Graphic Card//////////////////////////////////////






////////////////////////////////////////////////////////// category//////////////////////////////////////
Route::post('category/index', [CategoryController::class, 'index']);
Route::post('category/restore', [CategoryController::class, 'restore']);
Route::delete('category/delete', [CategoryController::class, 'destroy']);
Route::delete('category/forceDelete', [CategoryController::class, 'forceDelete']);
Route::get('category/code/next', [CategoryController::class, 'nextCode']);
Route::apiResource('category', CategoryController::class);
Route::get('fetch-category', [CategoryController::class, 'categoryData']);

////////////////////////////////////////////////////////// category//////////////////////////////////////




//                                            Device
Route::group(['middleware' => ['auth:sanctum']], static fn(): array => [

    //////////////////////////////////////////////////////////company//////////////////////////////////////

    Route::post('device/index', [DeviceController::class, 'index']),
    Route::post('device/restore', [DeviceController::class, 'restore']),
    Route::delete('device/delete', [DeviceController::class, 'destroy']),
    Route::get('device/code/next', [DeviceController::class, 'nextCode']),
    Route::delete('device/forceDelete', [DeviceController::class, 'forceDelete']),
    Route::apiResource('device', DeviceController::class),
    Route::get('fetch-device-resource', [DeviceController::class, 'fetchDeviceResource']),
    Route::post('device/assign-action', [DeviceController::class, 'assignDevice']),
    Route::post('device/history/{id}', [DeviceController::class, 'deviceHistory']),
    Route::put('device/{id}/{column}', [DeviceController::class, 'toggle']),
    Route::get('/device/{device}/pdf', [DeviceController::class, 'acknowledgement']),
    //////////////////////////////////////////////////////////Device//////////////////////////////////////
    //////////////////////////////////////////////////////////ticket//////////////////////////////////////
    Route::post('ticket/index', [TicketController::class, 'index']),
    Route::post('ticket/restore', [TicketController::class, 'restore']),
    Route::delete('ticket/delete', [TicketController::class, 'destroy']),
    Route::get('ticket/code/next', [TicketController::class, 'nextCode']),
    Route::delete('ticket/forceDelete', [TicketController::class, 'forceDelete']),
    Route::get('ticket/stats', [TicketController::class, 'stats']),
    Route::apiResource('ticket', TicketController::class),
    Route::patch('ticket/{ticket}/status', [TicketController::class, 'updateStatus']),
    Route::post('ticket/create-by-employee', [TicketController::class, 'createByEmployee']),

    Route::patch('ticket/{ticket}/help-desk-description', [TicketController::class, 'helpDeskDescription']),
    Route::get('fetch-ticket/{ticket}', [TicketController::class, 'fetchTicketById']),

    //////////////////////////////////////////////////////////ticket//////////////////////////////////////

    //////////////////////////////////////////////////////////replie//////////////////////////////////////
    Route::post('replies', [ReplyController::class, 'store']),
    //////////////////////////////////////////////////////////replie//////////////////////////////////////

    //////////////////////////////////////////////////////////report//////////////////////////////////////
    Route::post('report/ticket-status-count', [ReportController::class, 'ticketsReport']),
    Route::post('log/index', [ReportController::class, 'logIndex']), // Get All users (continents, users, users, voted Members)
    //////////////////////////////////////////////////////////report//////////////////////////////////////

    // Route::post('/export-device-history/{id}', [ReportController::class, 'exportDeviceHistoryPdf']),

    Route::post('tickets-pdf', [ReportController::class, 'ticketsReportPDF']),
    Route::post('device-history-pdf/{id}', [ReportController::class, 'exportDeviceHistoryPdf']),
    // Route::post('export-device-history/{id}', [ReportController::class, 'exportDeviceHistoryPdf']),

]);
// Route::post('tickets/report/pdf', [ReportController::class, 'ticketsReportPDF']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('fetch-user', [DeviceController::class, 'fetchUser']);
    Route::get('fetch-device', [DeviceController::class, 'fetchDevice']);
    Route::post('fetch-user-device', [DeviceController::class, 'fetchDeviceData']);
    Route::post('fetch-tickets/status', [UserController::class, 'fetchTicketStatus']);
});

//////////////////////////////////////////////////////////department//////////////////////////////////////
Route::post('type/index', [TypeController::class, 'index']);
Route::post('type/restore', [TypeController::class, 'restore']);
Route::delete('type/delete', [TypeController::class, 'destroy']);
Route::get('type/code/next', [TypeController::class, 'nextCode']);
Route::delete('type/forceDelete', [TypeController::class, 'forceDelete']);
Route::apiResource('type', TypeController::class);
Route::get('fetch-type', [TypeController::class, 'fetchType']);

//////////////////////////////////////////////////////////department//////////////////////////////////////


//////////////////////////////////////////////////////////equipment-status//////////////////////////////////////
Route::post('equipment-status/index', [EquipmentStatusController::class, 'index']);
Route::post('equipment-status/restore', [EquipmentStatusController::class, 'restore']);
Route::delete('equipment-status/delete', [EquipmentStatusController::class, 'destroy']);
Route::delete('equipment-status/forceDelete', [EquipmentStatusController::class, 'forceDelete']);
Route::apiResource('equipment-status', EquipmentStatusController::class);
Route::get('fetch-equipment-status', [EquipmentStatusController::class, 'fetchEquipmentStatus']);

//////////////////////////////////////////////////////////equipment-status//////////////////////////////////////

//////////////////////////////////////////////////////////position//////////////////////////////////////
Route::post('position/index', [PositionController::class, 'index']);
Route::post('position/restore', [PositionController::class, 'restore']);
Route::delete('position/delete', [PositionController::class, 'destroy']);
Route::get('position/code/next', [PositionController::class, 'nextCode']);
Route::delete('position/forceDelete', [PositionController::class, 'forceDelete']);
Route::apiResource('position', PositionController::class);
Route::get('fetch-position', [PositionController::class, 'fetchPosition']);

//////////////////////////////////////////////////////////position/////////////////////////////////////








//                                        device statuses


////////////////////////////////////////////////////////// device_statuses//////////////////////////////////////
Route::post('device-status/index', [DeviceStatusController::class, 'index']);
Route::post('device-status/restore', [DeviceStatusController::class, 'restore']);
Route::delete('device-status/delete', [DeviceStatusController::class, 'destroy']);
Route::get('device-status/code/next', [DeviceStatusController::class, 'nextCode']);
Route::delete('device-status/forceDelete', [DeviceStatusController::class, 'forceDelete']);
Route::apiResource('device-status', DeviceStatusController::class);
Route::get('fetch-devicestatus', [DeviceStatusController::class, 'fetchDeviceStatus']);

//////////////////////////////////////////////////////////device statuses/////////////////////////////////////







//////////////////////////////////////////////////////////organization//////////////////////////////////////
Route::post('organization/index', [OrganizationController::class, 'index']);
Route::post('organization/restore', [OrganizationController::class, 'restore']);
Route::delete('organization/delete', [OrganizationController::class, 'destroy']);
Route::get('organization/code/next', [OrganizationController::class, 'nextCode']);
Route::delete('organization/forceDelete', [OrganizationController::class, 'forceDelete']);
Route::post('update/organization/{organization}', [OrganizationController::class, 'updateOrganization']);
Route::apiResource('organization', OrganizationController::class);
Route::get('fetch-organization', [OrganizationController::class, 'fetchOrganization']);

//////////////////////////////////////////////////////////organization//////////////////////////////////////






Route::post('/autocomplete', [UserController::class, 'autoComplete']);

//require __DIR__ . '/auth.php';




Route::post('/country/index', [CountryController::class, 'index']);
Route::put('/country/{id}/{column}', [CountryController::class, 'toggle']);
Route::get('country/code/next', [CountryController::class, 'nextCode']);
Route::post('country/restore', [CountryController::class, 'restore']);
Route::delete('country/delete', [CountryController::class, 'destroy']);
Route::delete('country/forceDelete', [CountryController::class, 'forceDelete']);
Route::apiResource('country', CountryController::class);




Route::post('/city/index', [CityController::class, 'index']);
Route::put('/city/{id}/{column}', [CityController::class, 'toggle']);
Route::get('city/code/next', [CityController::class, 'nextCode']);
Route::post('city/restore', [CityController::class, 'restore']);
Route::delete('city/delete', [CityController::class, 'destroy']);
Route::delete('city/forceDelete', [CityController::class, 'forceDelete']);
Route::apiResource('city', CityController::class);
Route::get('/cities/{country_id}', [CityController::class, 'getByCountry']);





Route::post('/branch/index', [BranchController::class, 'index']);
Route::post('branch/restore', [BranchController::class, 'restore']);
Route::delete('branch/delete', [BranchController::class, 'destroy']);
Route::get('branch/code/next', [BranchController::class, 'nextCode']);
Route::delete('branch/forceDelete', [BranchController::class, 'forceDelete']);
Route::put('/branch/{id}/{column}', [BranchController::class, 'toggle']);
Route::apiResource('branch', BranchController::class);
Route::get('fetch-branch', [BranchController::class, 'fetchBranch']);
});
