<?php

namespace App\Providers;

use App\Interfaces\BranchRepositoryInterface;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Interfaces\DeviceModelRepositoryInterface;
use App\Interfaces\DeviceRepositoryInterface;
use App\Interfaces\DeviceStatusRepositoryInterface;
use App\Interfaces\EquipmentStatusRepositoryInterface;
use App\Interfaces\GraphicCardRepositoryInterface;
use App\Interfaces\MemoryRepositoryInterface;
use App\Interfaces\OrganizationRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\PositionRepositoryInterface;
use App\Interfaces\ProcessorRepositoryInterface;
use App\Interfaces\ReplyRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\StorageRepositoryInterface;
use App\Interfaces\TicketRepositoryInterface;
use App\Interfaces\TypeRepositoryInterface;
use App\Repositories\DeviceStatusRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\BranchRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\CountryRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\DeviceModelRepository;
use App\Repositories\DeviceRepository;
use App\Repositories\EquipmentStatusRepository;
use App\Repositories\GraphicCardRepository;
use App\Repositories\MemoryRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\PositionRepository;
use App\Repositories\ProcessorRepository;
use App\Repositories\ReplyRepository;
use App\Repositories\RoleRepository;
use App\Repositories\StorageRepository;
use App\Repositories\TicketRepository;
use App\Repositories\TypeRepository;
use App\Repositories\UserRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(MemoryRepositoryInterface::class, MemoryRepository::class);
        $this->app->bind(StorageRepositoryInterface::class, StorageRepository::class);
        $this->app->bind(ProcessorRepositoryInterface::class, ProcessorRepository::class);
        $this->app->bind(DeviceModelRepositoryInterface::class, DeviceModelRepository::class);
        $this->app->bind(GraphicCardRepositoryInterface::class, GraphicCardRepository::class);
        $this->app->bind(DeviceRepositoryInterface::class, DeviceRepository::class);
        $this->app->bind(TicketRepositoryInterface::class, TicketRepository::class);
        $this->app->bind(ReplyRepositoryInterface::class, ReplyRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(TypeRepositoryInterface::class, TypeRepository::class);
        $this->app->bind(EquipmentStatusRepositoryInterface::class, EquipmentStatusRepository::class);
        $this->app->bind(PositionRepositoryInterface::class, PositionRepository::class);
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepository::class);
        $this->app->bind(DeviceStatusRepositoryInterface::class, DeviceStatusRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}


