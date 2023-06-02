@extends('user.app')


@section('content')
    {{-- <div id="preloader">

    </div> --}}
    <div class="up-icon">
        <i class="bi bi-arrow-up" id="top-btn"></i>
    </div>
   



    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img src="assets/images/hero.webp" alt="Not Found">
                <div class="overlay">

                </div>
                <div class="text text-center">
                    <h1 class="fw-bold">Our Helping To
                        The World.</h1>
                    <p>Onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut bore et dolore magnt, sed do eiusmod.
                    </p>


                    {{-- <button type="button" class="fw-bold btn-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Donate
                    </button> --}}

                </div>

            </div>
            <div class="carousel-item">
                <img src="assets/images/hero2.jpg" class="d-block " alt="...">
                <div class="overlay">

                </div>
                <div class="text text-center">
                    <h1 class="fw-bold">Our Helping To
                        The World.</h1>
                    <p>Onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut bore et dolore magnt, sed do eiusmod.
                    </p>


                    {{-- <button type="button" class="fw-bold btn-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Donate
                    </button> --}}

                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/hero3.jpg" class="d-block " alt="...">
                <div class="overlay">

                </div>
                <div class="text text-center">
                    <h1 class="fw-bold">Our Helping To
                        The World.</h1>
                    <p>Onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut bore et dolore magnt, sed do eiusmod.
                    </p>

{{-- 
                    <button type="button" class="fw-bold btn-3 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Donate
                    </button> --}}

                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="about container pt-5">


        <div class="row my-5">
            <div class=" col-md-6 col-sm-12 col-12 feature-image about-box">
                <div class="img">
                    <img src="assets/images/hero.webp" alt="Not found">
                    <div class="overlay">
                        <div>
                            <h1 class="fw-bold text-white">Trusted Donations</h1>
                            <h4 class="text-light">Form 50 Years</h4>
                        </div>
                    </div>
                </div>

            </div>
            <div class="  col-md-6 col-sm-12 col-12  px-5 feature-text">

                <h2 class="fw-bold">About Us</h2>
                <p class="text-secondary mt-4">Et tempora id nostrum saepe amet doloribus deserunt totam officiis
                    cupiditate asperiores quasi accusantium voluptatum dolorem quae sapiente voluptatem ratione odio
                    iure blanditiis earum fuga molestiae alias dicta perferendis inventore!

                </p>
                <p class="text-secondary mt-4">Et tempora id nostrum saepe amet doloribus deserunt totam officiis
                    cupiditate asperiores quasi accusantium voluptatum dolorem quae sapiente voluptatem ratione odio
                    iure blanditiis earum fuga molestiae alias dicta perferendis inventore!

                </p>
                <button class="btn-2"><a class="text-decoration-none text-white" href="{{ url('/about') }}"> LEARN
                        MORE</a></button>


            </div>
        </div>


    </section>
    <section class="project text-center">
        <h2 class="fw-bold">Projects</h2>

        <div class="container ">
            <div class="row ">
                @foreach ($projects as $project)
                @php
                $totalAmount = 0;
                @endphp
                    @foreach ($payments as $payment)
                        @php
                            
                            
                            if ($payment->project_id == $project->id) {
                                $totalAmount = $totalAmount + $payment->amount;
                            }
                            
                        @endphp
                    @endforeach
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-5">
                        <a href="/project-detail/{{ $project->id }}" class="text-decoration-none">
                            <div class="proj-img">
                                <img src="Project-images/{{ $project->image }}" alt="Not Found">
                                <div class="proj-overlay">
    
    
    
    
                                </div>
                                <div class="date text-white d-flex px-4 text-center pt-3">
                                    <p class="ms-2 fw-bold h4">Click To Donate</p>
                                </div>
    
                            </div>
                        </a>
                        <h4 class="fw-bold proj-head my-4 ">{{ $project->title }}</h4>
                        <div class="d-flex justify-content-between">
                            <p class="">Project Deadline</p>
                            <p class="">{{ date('d-m-Y', strtotime($project->timeline)) }}</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar fw-bold " role="progressbar"
                                style="width: {{ ($totalAmount / $project->target) * 100 }}%" aria-valuemin="0"
                                aria-valuemax="100">
    
                                {{ round(($totalAmount / $project->target) * 100, 2) }}%
    
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="">{{ $totalAmount }}</p>
                            <p class="">{{ $project->target }}</p>
                        </div>
    
                    </div>
                @endforeach
                {{ $projects->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>


    <section class="counter py-4">
        <div class="container">
            <div class="row">
                <h1 class="text-center fw-bold text-white my-5">Our Precious Stats</h1>
                <div class="col-md-3 col-sm-6 col-12 text-center">
                    <h1 id="counter" class="text-white">234</h1>
                    <h2 class="Fw-bold text-white">Donations</h2>
                </div>
                <div class="col-md-3 col-sm-6 col-12 text-center">
                    <h1 id="counter2" class="text-white">313</h1>
                    <h2 class="Fw-bold text-white">Fund Raised</h2>
                </div>
                <div class="col-md-3 col-sm-6 col-12 text-center">
                    <h1 id="counter3" class="text-white">110</h1>
                    <h2 class="Fw-bold text-white">Organizations</h2>
                </div>
                <div class="col-md-3 col-sm-6 col-12 text-center">
                    <h1 id="counter4" class="text-white">250</h1>
                    <h2 class="Fw-bold text-white">Volunteers</h2>
                </div>
            </div>
        </div>

    </section>

    {{-- <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('pk_test_51N5QndFedBnjuJXgADRcVTzcHtfFmpy4pPkPTj54ahyVFnm0jvZeyIYXMVhA2vo5vyTR3XU1iIyIAdmJ4huLF3fC00uLAFWCjQ');
        const btn = document.getElementById('donate');
        btn.addEventListener('click',function(e){
            e.preventDefault();
            // console.log("hello");
            // let price = document.getElementById('amount').value;
            // console.log(price);
            stripe.redirectToCheckout({
                sessionId : "",
               
            });
        });
    </script> --}}
@endsection
