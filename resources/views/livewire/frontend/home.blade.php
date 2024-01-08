<div>
    <!--slide banner section start-->
    <div class="hero_banner_section d-flex align-items-center mb-110">
        <div class="container">
            <div class="hero_banner_inner">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="hero_content">
                            <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s"><span></span>
                            </h3>
                            <h1 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">Quality Products
                                Bakery Items</h1>
                            <a class="btn btn-link wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s" href="Products.html">Shop Now</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero_shape_banner">
                            <img class="banner_keyframes_animation wow" src="{{ asset('assets/frontend/images/others/banner_product.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider area end-->

    <!-- service section start-->
    <div class="service_section mb-86">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="services_section_inner d-flex justify-content-between">
                        <div class="single_services one text-center wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <div class="services_thumb">
                                <img src="assets/new-images/pastery.jpeg" alt="">
                            </div>
                            <div class="services_content">
                                <h3><a href="#">Pastry</a></h3>
                                <p>Pastry is a broad category of baked goods that are characterized by a rich and flaky
                                </p>
                            </div>
                        </div>
                        <div class="single_services two text-center wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <div class="services_thumb">
                                <img src="assets/new-images/cake_c.jpg" alt="">
                            </div>
                            <div class="services_content">
                                <h3><a href="#">CupCake</a></h3>
                                <p>A cupcake is a small, individual-sized cake that is typically baked in a cup-shaped
                                    container</p>
                            </div>
                        </div>
                        <div class="single_services three text-center wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <div class="services_thumb">
                                <img src="assets/new-images/Croissant Italy Cake.jpg" alt="">
                            </div>
                            <div class="services_content">
                                <h3><a href="#">Italy Cake</a></h3>
                                <p>Italy Cake is a specific term or product, I recommend checking with local bakeries,
                                    online </p>
                            </div>
                        </div>
                        <div class="single_services four text-center wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s">
                            <div class="services_thumb">
                                <img src="assets/new-images/Brownie.jpg" alt="">
                            </div>
                            <div class="services_content">
                                <h3><a href="#">Brownie</a></h3>
                                <p>A brownie is a rich and dense chocolate dessert that is typically square</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service section end-->

    <!-- product section start -->
    <div class="product_section mb-80 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
        <div class="container">
            <div class="product_header">
                <div class="section_title text-center">
                    <h2>Products</h2>
                </div>
                <!-- <div class="product_tab_button">
                    <ul class="nav justify-content-center" role="tablist" id="nav-tab">
                        <li>
                            <a class="active" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="false">Brownie </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#seller" role="tab" aria-controls="seller" aria-selected="false">
                                Cakes </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">CupCake</a>
                        </li>
                    </ul>
                </div> -->
            </div>
            <div class="tab-content product_container">
                <div class="tab-pane fade show active" id="features" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="single-product.html"><img src="{{ asset('/'.$product->image) }}" style="width: 242px; height: 162px" class="img-fluid" alt=""></a>
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
    </div>
    <!-- product section end -->

    <!-- banner fullwidth section start -->
    <div class="discount_banner banner_fullwidth_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_discount_text text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">Best Quality
                            Bakery
                            Products</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">Lorem ipsum
                            dolor sit
                            amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut
                            labore et
                            dolore magna</p>
                        <a class="btn btn-link wow fadeInUp" href="Products.html" data-wow-delay="0.3s" data-wow-duration="1.3s">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner fullwidth section end -->
</div>