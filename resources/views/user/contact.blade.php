@extends('user.app')

@section('content')
   
    <div class="up-icon">
        <i class="bi bi-arrow-up" id="top-btn"></i>
    </div>


    <div class="container-fluid color-primary  text-center my-5 ">
        <h1 class="fw-bold">Contact Us</h1>


    </div>


    <div class=" container-fluid mt-5 ">

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108936.51291721896!2d73.09557759999998!3d31.434342400000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x392242a2f5be33f3%3A0x6a214e1f73edd114!2sClock%20Tower%20Faisalabad!5e0!3m2!1sen!2s!4v1658210247519!5m2!1sen!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 left-side">
                <h1 class="mt-5 ">CONTACT INFO</h1>
                <div class="row ">
                    <div class="col-3 ">

                        <div class="contact__widget__icon mt-4">
                            <i class="fa fa-phone"></i>
                        </div>

                        <div class="contact__widget__icon mt-5">
                            <i class="fa fa-map-marker"></i>
                        </div>

                        <div class="contact__widget__icon mt-5">
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                    <div class="col-9 ">
                        <div class="contact__widget__text mt-4 text-secondary">
                            <span>Support@gmail.com</span>
                            <p>+ 1 212-683-9756</p>
                        </div>

                        <div class="contact__widget__text mt-5 text-secondary">
                            <p>799 W 6th St Hoisington, Kansas 121 Sparrow Hawk, Alberta</p>
                        </div>

                        <div class="contact__widget__text my-5 text-secondary">
                            <span>Mon - Sat : 8:00am - 5:00pm</span>
                            <p>Sunday: 8:00am - 7:00pm</p>
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 right-side">
                @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::get('Fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('Fail') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h1 class="mt-5">GET IN TOUCH</h1>

                <form action="{{ url('/AddComment') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" placeholder="Leave a Message here" id="floatingTextarea" id="message" name="message"></textarea>
                        <!-- <label for="floatingTextarea">Comments</label> -->
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn-1 ">Submit</button>
                    </div>
                </form>


            </div>


        </div>
    </div>
@endsection
