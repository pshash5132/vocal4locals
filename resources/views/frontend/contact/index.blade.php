<section class="product-detail-section">
    <div class="container">
        <div class="row">
            <div class="row align-items-center listing-row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-12">
                    <div class="common-form-section cmn-bg-tab services-inquiry-wrap">
                        <h1>Get In Touch</h1>
                        <form id="contactFrom" method="POST" action="{{route('contact.add')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Full Name*</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Email Address*</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Contact Number*</label>
                                        <input type="number" name="number" class="form-control" placeholder="98980 98009" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Message*</label>
                                        <textarea name="message" cols="30" rows="2" class="form-control" placeholder="Write a message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center buttons-wrap">
                                <button type="submit" class="g-btn f-btn mb-0 radius-3">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
