<div>
    <div class="breadcrumbs_aree breadcrumbs_bg mb-110" style="background-image: url('assets/frontend/images/others/breadcrumbs-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>About Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about_description_section mb-5">
        <div class="container">
            @foreach ($abouts as $about)
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <h2>Our Vision</h2>
                        <p>{{ $about->vision }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <h2>Our Mission</h2>
                        <p>{{ $about->mission }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="about_description_section mb-5">
        <div class="container">
            @foreach ($pages as $page)
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <p>{{ $page->intro }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <p>{{ $page->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>