<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mx-5">
                    <div class="card-body">
                        <button wire:navigate href="{{ url('users') }}" class="square-btn-secondary mb-2" title="Back">
                            <i class="fas fa-chevron-left"> </i>
                            <span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Back</span>
                        </button>
                        <hr>
                        <h4 class="pb-2">Role | Permissions Setting</h4>

                        <div class="row py-3">
                            <div class="col-12">

                                <div class="col-lg-6 col-md-6 col-sm-12 my-3">
                                    <div class="group">
                                        <select wire:model.live="role" class="input">
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach

                                        </select>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="label">Role<span class="text-danger">*</span></label>
                                        @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-12">
                                <button wire:click="toggleAdvanceVisibility()" class="square-btn-primary" aria-expanded="false">
                                    @if ($advancedVisibility == false)
                                    Show Advance Options <i class="fa fa-chevron-right pull-right"></i>
                                    @else
                                    Hide Advance Options <i class="fa fa-chevron-down pull-right"></i>
                                    @endif
                                </button>
                            </div>
                            @if ($advancedVisibility == true)
                            <div class="col-12 text-right">
                                <div class="icheck-alizarin d-inline py-3 pr-5 text-right">
                                    <input id="select-all" type="checkbox" wire:model.live="selectAllPermissions" value="1">
                                    <label class="font-weight-normal" for="select-all">Select All</label>
                                </div>
                            </div>
                            <div class="col-12 pt-2">
                                @foreach ($permissionGroups as $group)
                                <h5>{{ $group->name }}</h5>

                                <ul class="list-unstyled py-2" style="column-count: 4;">

                                    @foreach ($group->permissions as $permission)
                                    <li wire:key="permission-{{ $permission->id }}">
                                        <div class="icheck-alizarin d-inline pb-2">
                                            <input wire:model.live="permissions" id="permission-cb-{{ $permission->id }}" type="checkbox" value="{{ $permission->id }}">
                                            <label class="font-weight-normal" for="permission-cb-{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endforeach

                                @error('permissions')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @endif
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