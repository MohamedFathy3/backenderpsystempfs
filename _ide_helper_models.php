<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BaseModel filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BaseModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BaseModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BaseModel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BaseModel withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
	class BaseModel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $local_name
 * @property string|null $phone
 * @property string|null $phone_two
 * @property string|null $mobile
 * @property string|null $fax
 * @property string|null $address
 * @property string|null $zip_code
 * @property string|null $alias_name
 * @property string|null $notes
 * @property bool $active
 * @property int|null $city_id
 * @property int|null $country_id
 * @property int|null $phone_key_id
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Branch|null $branch
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Country|null $phoneKey
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereAliasName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch wherePhoneKeyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch wherePhoneTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch withoutTrashed()
 */
	class Branch extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceModel> $deviceModels
 * @property-read int|null $device_models_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $devices
 * @property-read int|null $devices_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereCode($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $time
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $code
 * @property string|null $priority
 * @property string|null $short_description
 * @property int $type_id
 * @property-read \App\Models\Type $type
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereTypeId($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $Locode
 * @property array<array-key, mixed>|null $port_types
 * @property int|null $order_id
 * @property bool $active
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Country $country
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereLocode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City wherePortTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City withoutTrashed()
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $country
 * @property string|null $code
 * @property string|null $city
 * @property CompanyType|null $type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Department> $departments
 * @property-read int|null $departments_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $address
 * @property string|null $email
 * @property string|null $website
 * @property string|null $avatar
 * @property int|null $organization_id
 * @property int|null $city_id
 * @property int|null $country_id
 * @property string|null $phone
 * @property int|null $phone_key_id
 * @property-read \App\Models\Organization|null $organization
 * @property-read \App\Models\Country|null $phoneKey
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company wherePhoneKeyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereWebsite($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string|null $code
 * @property string|null $icon
 * @property int|null $order_id
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\CountryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country withoutTrashed()
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCode($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $serial_number
 * @property string $condition
 * @property bool $active
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $purchase_date
 * @property \Illuminate\Support\Carbon|null $warranty_expire_date
 * @property int|null $user_id
 * @property int|null $company_id
 * @property int|null $created_by_user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $memory_id
 * @property int|null $graphic_card_id
 * @property int|null $processor_id
 * @property int|null $brand_id
 * @property int|null $device_model_id
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\Processor|null $cpu
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $currentEmployee
 * @property-read \App\Models\DeviceModel|null $deviceModel
 * @property-read \App\Models\GraphicCard|null $gpu
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceHistory> $history
 * @property-read int|null $history_count
 * @property-read \App\Models\Memory|null $memory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Storage> $storages
 * @property-read int|null $storages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereCreatedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereDeviceModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereGraphicCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereProcessorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereWarrantyExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $type
 * @property string|null $screen_size
 * @property int|null $device_status_id
 * @property-read \App\Models\DeviceStatus|null $deviceStatus
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereDeviceStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereScreenSize($value)
 */
	class Device extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $device_id
 * @property int|null $employee_id
 * @property int|null $help_desk_id
 * @property int|null $ticket_id
 * @property string $action_type
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Device $device
 * @property-read \App\Models\User|null $employee
 * @property-read \App\Models\User|null $helpDesk
 * @property-read \App\Models\Ticket|null $ticket
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereActionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereHelpDeskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
	class DeviceHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int|null $brand_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereCode($value)
 */
	class DeviceModel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceStatus withoutTrashed()
 */
	class DeviceStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EquipmentStatus withoutTrashed()
 */
	class EquipmentStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $model
 * @property string $vram
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereVram($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereCode($value)
 */
	class GraphicCard extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $file_name
 * @property string|null $file_path
 * @property string $mime_type
 * @property int $size
 * @property int|null $author_id
 * @property string|null $disk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $file_type
 * @property-read string $full_url
 * @property-read string $path
 * @property-read mixed $preview_url
 * @property-read string $url
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $modelable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media month($date)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media search($term)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media type($type)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereUpdatedAt($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $size
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereCode($value)
 */
	class Memory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property int $favorite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite whereFavorite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyFavorite whereUserId($value)
 */
	class MyFavorite extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $avatar
 * @property string|null $outgoing_server
 * @property int|null $port
 * @property bool $ssl
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereOutgoingServer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereSsl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization withoutTrashed()
 */
	class Organization extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position withoutTrashed()
 */
	class Position extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereCode($value)
 */
	class Processor extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $ticket_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Ticket|null $ticket
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply withoutTrashed()
 * @mixin \Eloquent
 */
	class Reply extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $size
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $devices
 * @property-read int|null $devices_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereCode($value)
 */
	class Storage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $ticket_number
 * @property string|null $title
 * @property string|null $content
 * @property \App\Models\Category|null $category
 * @property \Illuminate\Support\Carbon|null $open_at
 * @property \Illuminate\Support\Carbon|null $close_at
 * @property string|null $postpone_note
 * @property string $status
 * @property int|null $employee_id
 * @property int|null $help_desk_id
 * @property int|null $created_by_id
 * @property int|null $device_id
 * @property string|null $priority
 * @property string $rating
 * @property int $ata_time
 * @property int|null $daily_time
 * @property bool $daily_status
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\Device|null $device
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceHistory> $deviceHistories
 * @property-read int|null $device_histories_count
 * @property-read \App\Models\User|null $employee
 * @property-read \App\Models\User|null $helpDesk
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reply> $replies
 * @property-read int|null $replies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TicketStatus> $statuses
 * @property-read int|null $statuses_count
 * @property-read \App\Models\User|null $transferTo
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereAtaTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCloseAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDailyStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDailyTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereHelpDeskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereOpenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket wherePostponeNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereTicketNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $avatar
 * @property string|null $des
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDes($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property string $content
 * @property bool $is_system_generated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticket $ticket
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment whereIsSystemGenerated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketComment whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
	class TicketComment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $ticket_id
 * @property string $status
 * @property int|null $updated_by
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticket $ticket
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereUpdatedBy($value)
 * @property int|null $updated_by_id
 * @property int|null $transfer_to_id
 * @property int|null $duration
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $transferTo
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereTransferToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereUpdatedById($value)
 * @mixin \Eloquent
 */
	class TicketStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type withoutTrashed()
 */
	class Type extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $job_title
 * @property string|null $phone
 * @property string|null $phone_ext
 * @property string|null $cell
 * @property bool $active
 * @property UserRole $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $first_login_at
 * @property string|null $password
 * @property string|null $code_verify
 * @property string|null $expiry_time_code_verify
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $department_id
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $assignedTickets
 * @property-read int|null $assigned_tickets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TicketComment> $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\Department|null $department
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceHistory> $deviceHistories
 * @property-read int|null $device_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $devices
 * @property-read int|null $devices_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceHistory> $helpDeskActions
 * @property-read int|null $help_desk_actions_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $tickets
 * @property-read int|null $tickets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCell($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCodeVerify($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereExpiryTimeCodeVerify($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFirstLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\DeviceHistory|null $latestDeviceHistory
 * @mixin \Eloquent
 * @property string|null $code
 * @property int|null $position_id
 * @property string|null $avatar
 * @property string|null $title
 * @property int|null $city_id
 * @property int|null $country_id
 * @property int|null $branch_id
 * @property int|null $phone_key_id
 * @property bool $sale_man
 * @property bool $access_all_charges
 * @property bool $hide_other_records
 * @property string|null $email_password
 * @property string|null $email_display_name
 * @property string|null $email_host
 * @property string|null $email_port
 * @property string|null $email_ssl
 * @property string|null $local_name
 * @property string|null $note
 * @property string|null $username
 * @property string|null $address
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Country|null $phoneKey
 * @property-read \App\Models\Position|null $position
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccessAllCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailSsl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHideOtherRecords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneKeyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSaleMan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

