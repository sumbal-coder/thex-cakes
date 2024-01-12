@php
	use App\Enums\PermissionEnum;
@endphp
<div>
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Activity Logs</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">Activity Logs</li>
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
								<div class="col-md-6">
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
							</div>
							<div class="table-responsive pt-4">
								<table class="table table-bordered table-hover">
									<thead class="bg-success text-white">
										<tr>
											<th>#</th>
											<th>User</th>
											<th>Name</th>
											<th>Action</th>
											<th>Old</th>
											<th>New</th>
											<th>Time</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($activities as $activity)
											@php
												$properties = json_decode($activity->properties);
											@endphp
											<tr wire:loading.delay.remove wire:key="{{ $activity->id }}">
												<td>{{ $loop->iteration }}</td>
												<td>{{ $activity->causer?->name }}</td>
												<td>{{ $activity->log_name }}</td>
												<td>{{ $activity->description }}</td>
												<td>
													<ul>
													@foreach ($properties as $key => $value)
															<li><b>{{ $key }}:</b>
																@if (gettype($value) != 'object')
																	{{ $value ? $value : 'NULL' }}
																@else
																	<ol>
																		@foreach ($value as $k => $v)
																			<li><b>{{ $k }}:</b> {{ $v }}</li>
																		@endforeach
																	</ol>
																@endif

															</li>
														@endforeach
													</ul>
												</td>
												<td>
													<ul>
														@if (isset($properties?->attributes))
															@foreach ($properties?->attributes as $key => $value)
																<li><b>{{ $key }}:</b>
																	@if (gettype($value) != 'object')
																		{{ $value ? $value : 'NULL' }}
																	@else
																		<ol>
																			@foreach ($value as $k => $v)
																				<li><b>{{ $k }}:</b> {{ $v }}</li>
																			@endforeach
																		</ol>
																	@endif

																</li>
															@endforeach
														@endif
													</ul>

												</td>

												<td>{{ $activity->created_at }}</td>

											</tr>
										@endforeach
										@if (count($activities) == 0)
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
									{{ $activities->links() }}
								</span>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
