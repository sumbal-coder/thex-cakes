<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage About</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a wire:navigate href="{{ url('content/about-us') }}">About Us</a></li>
                        <li class="breadcrumb-item active">Update</li>
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
                            <h5 class="pt-3"><strong>About Us Information</strong></h5>
                            <div class="row py-3">

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Vision</label>
                                    <div wire:ignore>
                                        <textarea wire:model="vision" name="vision" id="vision"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Mission</label>
                                    <div wire:ignore>
                                        <textarea wire:model="mission" name="mission" id="mission"></textarea>
                                    </div>
                                </div>

                                <div class="text-right pt-3">
                                    <button wire:click="update" wire:loading.attr="disabled" id="update" class="square-btn-success mr-2" title="Update">
                                        <span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-check-circle"></i></span>
                                        <span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Update</span>
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#vision').summernote();
        $('#mission').summernote();

        $('#vision').on('summernote.change', function() {
            @this.set('vision', $('#vision').summernote('code'));
        });
        $('#mission').on('summernote.change', function() {
            @this.set('mission', $('#mission').summernote('code'));
        });
    });
</script>

@endpush