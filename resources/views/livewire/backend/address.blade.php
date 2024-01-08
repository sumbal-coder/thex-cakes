<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Address</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a wire:navigate href="{{ url('address') }}">Address</a></li>
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
                            <h5 class="pt-3"><strong>Address Information</strong></h5>
                            <div class="row py-3">

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Title</label>
                                    <div wire:ignore>
                                        <textarea wire:model="title" name="title" id="title"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Address</label>
                                    <div wire:ignore>
                                        <textarea wire:model="address" name="address" id="address"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Optional Address</label>
                                    <div wire:ignore>
                                        <textarea wire:model="optional_address" name="optional_address" id="optional_address"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Phone Number</label>
                                    <div wire:ignore>
                                        <textarea wire:model="phone_number" name="phone_number" id="phone_number"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Optional Phone Number</label>
                                    <div wire:ignore>
                                        <textarea wire:model="optional_phone_number" name="optional_phone_number" id="optional_phone_number"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Website</label>
                                    <div wire:ignore>
                                        <textarea wire:model="website" name="website" id="website"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Optional Website</label>
                                    <div wire:ignore>
                                        <textarea wire:model="optional_website" name="optional_website" id="optional_website"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <label class="control-label">Link</label>
                                    <div wire:ignore>
                                        <textarea wire:model="link" name="link" id="link"></textarea>
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
        $('#title').summernote();
        $('#address').summernote();
        $('#optional_address').summernote();
        $('#phone_number').summernote();
        $('#optional_phone_number').summernote();
        $('#website').summernote();
        $('#optional_website').summernote();
        $('#link').summernote();
        // $('#title').summernote({
        //     placeholder: 'Hello stand-alone UI',
        //     tabsize: 2,
        //     height: 120,
        //     toolbar: [
        //         ['style', ['style']],
        //         ['font', ['bold', 'underline', 'clear']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['table', ['table']],
        //         ['insert', ['link', 'picture', 'video']],
        //         ['view', ['fullscreen', 'codeview', 'help']]
        //     ]
        // });
        $('#title').on('summernote.change', function() {
            @this.set('title', $('#title').summernote('code'));
        });
        $('#address').on('summernote.change', function() {
            @this.set('address', $('#address').summernote('code'));
        });
        $('#optional_address').on('summernote.change', function() {
            @this.set('optional_address', $('#optional_address').summernote('code'));
        });
        $('#phone_number').on('summernote.change', function() {
            @this.set('phone_number', $('#phone_number').summernote('code'));
        });
        $('#optional_phone_number').on('summernote.change', function() {
            @this.set('optional_phone_number', $('#optional_phone_number').summernote('code'));
        });
        $('#website').on('summernote.change', function() {
            @this.set('website', $('#website').summernote('code'));
        });
        $('#optional_website').on('summernote.change', function() {
            @this.set('optional_website', $('#optional_website').summernote('code'));
        });
        $('#link').on('summernote.change', function() {
            @this.set('link', $('#link').summernote('code'));
        });
    });
</script>

@endpush