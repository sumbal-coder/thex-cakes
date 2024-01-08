@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush
<div>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Add Role</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item">User Management</li>
							<li class="breadcrumb-item"><a wire:navigate href="{{ url('roles') }}">Roles</a></li>
							<li class="breadcrumb-item active">Create</li>
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
								<button wire:navigate href="{{ url('roles') }}" class="square-btn-secondary mb-2" title="Back"><i
										class="fas fa-chevron-left"></i>
									<span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Back</span>
								</button>
								<hr>

								<h5 class="pt-3"><strong>Role Information</strong></h5>
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
								</div>

								<h5 class="pt-3"><strong>Permissions</strong></h5>
								<div class="row">
									<div class="col-12">
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
																<input wire:model.live="permissions" id="permission-cb-{{ $permission->id }}" type="checkbox"
																	value="{{ $permission->id }}">
																<label class="font-weight-normal"
																	for="permission-cb-{{ $permission->id }}">{{ $permission->name }}</label>
															</div>
														</li>
													@endforeach
												</ul>
											@endforeach

											@error('permissions')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>

									</div>
								</div>

								<div class="text-right py-3">
									<button wire:click="update" wire:loading.attr="disabled" class="square-btn-success mr-2" title="update">
										<span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-check-circle"></i></span>
										<span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Update</span>
									</button>
									<button wire:navigate href="{{ url('roles') }}" class="square-btn-secondary" title="Cancel">
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

</div>
