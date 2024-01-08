<div>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" style="background-image: url('assets/frontend/images/others/breadcrumbs-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- contact area start -->
    <div class="contact_page_section mb-100">
        <div class="container">
            <div class="contact_details">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="contact_info_content">
                            <h2>We Are Here For Help You!
                                Please Contact Us.</h2>
                            @foreach($addresses as $address)
                            <div class="contact_info_details mb-45">
                                <h3>{{ $address->title }}</h3>
                                <p>{{ $address->address }}</p>
                                <p>{{ $address->optional_address }}</p>
                                <p><a href="{{ $address->phone_number }}">{{ $address->phone_number }}</a></p>
                                <p><a href="{{ $address->optional_phone_number }}">{{ $address->optional_phone_number }}</a></p>
                                <p><a href="{{ $address->website }}">{{ $address->website }}</a></p>
                                <p><a href="{{ $address->optional_website }}">{{ $address->optional_website }}</a></p>
                                <p><a href="{{ $address->link }}"><span>See on the map</span></a></p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="contact_form" style="background-image: url('assets/frontend/images/others/contact-form-bg-shape.png');">
                            @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                            @endif
                            @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                            <h2>Send A Quest</h2>
                            <div class="form_input">
                                <input type="text" id="name" placeholder="Enter Name*" wire:model="name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form_input">
                                <input type="text" id="email" placeholder="Enter Email*" wire:model="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form_input">
                                <input type="text" id="subject" wire:model="subject" placeholder="Enter Subject" wire:model="subject">
                            </div>
                            <div class="form_textarea">
                                <textarea id="message" placeholder="Message here" wire:model="message"></textarea>
                            </div>
                            <div class="form_input_btn">
                                <button wire:click.prevent="storeMessage()" class="btn btn-success btn-block">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact_map mt-70">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004082.928417291!2d-104.65713107818928!3d37.275578278180674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1606327234905!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>