<div>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" style="background-image: url('assets/frontend/images/others/breadcrumbs-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Products</h1>
                        <ul>
                            <li><a href="{{ url('/home') }}">Home </a></li>
                            <li> // Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product page section start -->
    <div class="product_page_section mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_page_wrapper">
                        <!--shop toolbar area start-->
                        <div class="product_sidebar_header mb-60 d-flex justify-content-between align-items-center">
                            <div class="page__amount border">
                                <p><span>{{ count($products) }}</span> Products Found</p>
                            </div>
                            <div class="product_header_right d-flex align-items-center">
                                <div class="product__toolbar__btn">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="active" data-bs-toggle="tab" href="#grid" role="tab" aria-controls="grid" aria-selected="true"><i class="ion-grid"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#list" aria-controls="list" role="tab" aria-selected="false"><i class="ion-ios-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--shop gallery start-->
                        <div class="product_page_gallery">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="grid">
                                    <div class="product_gallery">
                                        <div class="row">
                                            @foreach($products as $product)
                                            <div class="col-lg-3 col-md-4 col-sm-6">
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a href="#"><img src="{{ asset('/'.$product->image) }}" style="width: 242px; height: 162px" class="img-fluid" alt=""></a>
                                                            <div class="action_links">
                                                                <ul class="d-flex justify-content-center">
                                                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart">
                                                                            <span class="pe-7s-shopbag"></span></a></li>
                                                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="pe-7s-like"></span></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content text-center">
                                                            <h4><a href="single-product.html">{{ $product->name }}</a></h4>
                                                            <div class="price_box">
                                                                <span class="current_price">Rs {{ $product->price }}</span>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination poduct_pagination">
                                    @if ($products->lastPage() > 1)
                                    <ul class="pagination">
                                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                                            <li class="{{ ($products->currentPage() == $i) ? 'active' : '' }}">
                                                <a href="{{ $products->url($i) }}">{{ $i }}</a>
                                            </li>
                                            @endfor
                                            <li class="next"><a href="#"><i class="ion-chevron-right"></i></a></li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- <div class="sort-item product float-end">
                            <select name="perPage" class="use-chosen" wire:model="perPage">
                                <option value="4" selected="selected">4 per page</option>
                                <option value="8">8 per page</option>
                                <option value="12">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="20">20 per page</option>
                                <option value="24">24 per page</option>
                            </select>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>