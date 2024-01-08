<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User | {{ $this->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">User Management</li>
                        <li class="breadcrumb-item"><a wire:navigate href="{{ url('users') }}">Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.messages')
    <div class="content">
        <div class="container-fluid pb-3">
            <div class="row">
                <div class="col-12">
                    <div class="card mx-5">
                        <div class="card-body">
                            <button wire:navigate href="{{ url('users') }}" class="square-btn-secondary mb-2">
                                <i class="fas fa-chevron-left"></i>
                                <span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Back</span>
                            </button>
                            <hr>

                            <h5 class="pt-3"><strong>User Information</strong></h5>
                            <div class="row py-3">

                                <div class="col-lg-6 col-md-6 col-sm-12 my-3">
                                    <div class="group">
                                        <input wire:model.live="name" type="text" class="input" placeholder="Enter Name">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="label">Name<span class="text-danger">*</span></label>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 my-3">
                                    <div class="group">
                                        <input wire:model.live="email" type="email" class="input" placeholder="Enter Email">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="label">Email<span class="text-danger">*</span></label>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 my-3">
                                    <div class="group">
                                        <input wire:model.live="password" type="password" class="input" placeholder="Enter Password">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="label">Password</label>
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-right pt-3">
                                <button wire:click="update" wire:loading.attr="disabled" class="square-btn-success mr-2" title="Update">
                                    <span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-check-circle"></i></span>
                                    <span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Update</span>
                                </button>
                                <button wire:navigate href="{{ url('users') }}" class="square-btn-secondary" title="Cancel">
                                    <span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-window-close"></i></span>
                                    <span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Cancel</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>