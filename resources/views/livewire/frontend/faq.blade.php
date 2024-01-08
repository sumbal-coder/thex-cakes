<div>
    <div class="breadcrumbs_aree breadcrumbs_bg mb-110" style="background-image: url('assets/frontend/images/others/breadcrumbs-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>FAQ</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq-main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="frequently-area">
                        <h2 class="heading mb-0">General Questions</h2>
                        <div class="row">
                            <div class="row">
                                @foreach($faqs as $faq)
                                <div class="col-md-6 mb-4">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample{{ $faq->id }}">
                                                <div class="accordion-body">
                                                    <p>{{ $faq->answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>