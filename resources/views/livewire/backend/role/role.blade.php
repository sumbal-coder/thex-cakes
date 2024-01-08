@php
use App\Enums\PermissionEnum;
@endphp
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">User Management</li>
                        <li class="breadcrumb-item">Roles</li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.messages')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mx-5">
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-6 ">
                                    <div class="row ">
                                        <div class="col-6">
                                            <div class="group">
                                                <input wire:model.live.debounce.500ms="search" class="input" placeholder="Enter Search Term">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button wire:click="resetFilters" class="square-btn-danger" title="Reset Search Fields">
                                                <i class="fas fa-recycle"></i> Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @can(PermissionEnum::ADD_ROLES->value)
                                    <div class="text-right">
                                        <a wire:navigate href="{{ url('roles/create') }}" class="square-btn-success mb-2">
                                            <i class="fas fa-plus"></i>
                                            <span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Role</span>
                                        </a>
                                    </div>
                                    @endcan

                                </div>
                            </div>

                            <div class="table-responsive pt-4">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-success text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Name
                                                <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer;">
                                                    <i class="fa fa-arrow-up {{ $sortColumn == 'name' && $sortDirection === 'asc' ? '' : 'text-dark' }}"></i>
                                                    <i class="fa fa-arrow-down {{ $sortColumn == 'name' && $sortDirection === 'desc' ? '' : 'text-dark' }}"></i>
                                                </span>
                                            </th>
                                            <th>Created At
                                                <span wire:click="sortBy('created_at')" class="float-right text-sm" style="cursor: pointer;">
                                                    <i class="fa fa-arrow-up {{ $sortColumn == 'created_at' && $sortDirection === 'asc' ? '' : 'text-dark' }}"></i>
                                                    <i class="fa fa-arrow-down {{ $sortColumn == 'created_at' && $sortDirection === 'desc' ? '' : 'text-dark' }}"></i>
                                                </span>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $item)
                                        <tr wire:loading.delay.remove wire:key="role-key-{{  $item->id }}">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->name }}
                                            </td>

                                            <td>
                                                {{ $item->created_at->format('F d, Y h:i A') }}
                                            </td>

                                            <td>
                                                @can(PermissionEnum::EDIT_ROLES->value)
                                                <a wire:navigate href="{{ url("roles/edit/$item->id") }}" title="Edit Role" class="text-success"><i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                @endcan

                                                @can(PermissionEnum::DELETE_ROLES->value)
                                                <a wire:click="delete({{  $item->id }})" href="#" title="Delete Role" class="delete-record" style="margin:7px;color:red"><i class="fa-sharp fa-solid fa-trash"></i>
                                                </a>
                                                @endcan
                                            </td>

                                        </tr>

                                        @endforeach
                                        @if (count($roles) == 0)
                                        <tr wire:loading.delay.remove>
                                            <td class="text-center" colspan="100%">
                                                No data found.
                                            </td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <div wire:loading.delay class="text-center">
                                    <i class="fa fa-spinner fa-spin"></i>&nbsp; Loading Data . . .
                                </div>
                                <span class="float-right">
                                    {{ $roles->links() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>