<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a wire:navigate href="{{ url('product') }}">Products</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mx-5">
                        <div class="card-body">

                            <button wire:navigate href="{{ url('product') }}" class="square-btn-secondary mb-2">
                                <i class="fas fa-chevron-left"></i>
                                <span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline">Back</span>
                            </button>
                            <hr>
                            <h5 class="pt-3"><strong>Product Information</strong></h5>
                            <div class="row py-3">

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Name<span class="text-danger">*</span></label>
                                        <input wire:model.live="name" type="text" class="form-control" placeholder="Enter Product Name">
                                        <div>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Price<span class="text-danger">*</span></label>
                                        <input wire:model.live="price" type="number" class="form-control" placeholder="Enter price">

                                        <div>
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Description<span class="text-danger">*</span></label>
                                        <input wire:model.live="description" type="text" class="form-control" placeholder="Enter Product Description">
                                        <div>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Image<span class="text-danger">*</span>
                                        </label>
                                        <input wire:model.live="image" type="file" accept="Image/*" class="form-control" placeholder="Upload Product Image">
                                        @if ($image)
                                        <img class="img-fluid mt-2 img-thumbnail" src="{{ $image->temporaryUrl() }}" width="150" height="150">
                                        @elseif($oldImage)
                                        <img class="img-fluid mt-2 img-thumbnail" src="{{ $oldImage }}" width="150" height="150">
                                        @endif
                                        <div>
                                            @error('image')
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
                                    <button wire:navigate href="{{ url('product') }}" class="square-btn-secondary" title="Cancel">
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