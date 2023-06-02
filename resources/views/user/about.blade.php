@extends('user.app')

@section('content')
    <div class="up-icon">
        <i class="bi bi-arrow-up" id="top-btn"></i>
    </div>

    <div class="container-fluid   text-center my-5 ">
        <h1 class="fw-bold">About Us</h1>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-4  ">
                <div class="about-service text-center py-5">
                    <div class="about-icon1 mt-4"><i class="bi bi-life-preserver"></i></div>
                    <h3 class="fw-bold text-white my-4">Help the Needy</h3>
                    <p class="text-white my-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero saepe
                        provident culpa tenetur recusandae ex iure, cupiditate nostrum quaerat sit quos! Et tenetur nesciunt
                        eos quam, quibusdam provident quas voluptatem!</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-4 ">
                <div class="about-service text-center py-5">
                    <div class="about-icon1 mt-4"><i class="bi bi-gear"></i></div>
                    <h3 class="fw-bold text-white my-4">Self Progression</h3>
                    <p class="text-white my-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero saepe
                        provident culpa tenetur recusandae ex iure, cupiditate nostrum quaerat sit quos! Et tenetur nesciunt
                        eos quam, quibusdam provident quas voluptatem!</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-4  ">
                <div class="about-service text-center py-5">
                    <div class="about-icon1 mt-4"><i class="bi bi-bar-chart"></i></div>
                    <h3 class="fw-bold text-white my-4">Making Life Easy</h3>
                    <p class="text-white my-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero saepe
                        provident culpa tenetur recusandae ex iure, cupiditate nostrum quaerat sit quos! Et tenetur nesciunt
                        eos quam, quibusdam provident quas voluptatem!</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn-2"><a class="text-decoration-none text-white" href="#"> DONATE</a></button>
            </div>

        </div>

    </div>

    <section class="team text-center  mt-5 pt-5 container">
        <h6 class="color-primary">TEAM</h6>
        <h1 class="fw-bold">
            Leadership
        </h1>

        <div class="row mt-5">
            @foreach ($members as $member)
                <div class="col-md-4 col-sm-12 col-12 team-col mb-3 ">
                    <div class="img">
                        <img src="Team-images/{{ $member->image }}" alt="Not found">
                    </div>
                    <h6 class="text-secondary mt-4">{{ $member->name }}</h6>
                    <h6 class="text-secondary mt-4">{{ $member->designation }}</h6>
                    <p class="text-secondary mt-4">{{ $member->description }}</p>


                    <div class="team-icon ">
                        <a href="#" class="mx-1"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="mx-1"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="mx-1"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="mx-1"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            @endforeach


            {{ $members->withQueryString()->links('pagination::bootstrap-5') }}

        </div>

    </section>


    {{-- <section class="testimon mt-5 pt-5">
        <h6 class="color-primary text-center">PEOPLE SAYS</h6>
        <h1 class="fw-bold mt-3 text-center">
            Testimonials
        </h1>
        <div class="container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimon-item text-center">
                            <div class="img">
                                <img src="assets/images/team1.png" alt="Not Found">
                            </div>
                            <p class=" text-secondary mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. In vitae consequuntur laborum, saepe repudiandae adipisci ut magnam
                                repellat optio nostrum?</p>
                            <p class="fw-bold">John Smith</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimon-item text-center">
                            <div class="img">
                                <img src="assets/images/team1.webp" alt="Not Found">
                            </div>
                            <p class=" text-secondary mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. In vitae consequuntur laborum, saepe repudiandae adipisci ut magnam
                                repellat optio nostrum?</p>
                            <p class="fw-bold">John Smith</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimon-item text-center">
                            <div class="img">
                                <img src="assets/images/team2.webp" alt="Not Found">
                            </div>
                            <p class=" text-secondary mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. In vitae consequuntur laborum, saepe repudiandae adipisci ut magnam
                                repellat optio nostrum?</p>
                            <p class="fw-bold">John Smith</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimon-item text-center">
                            <div class="img">
                                <img src="assets/images/team2.png" alt="Not Found">
                            </div>
                            <p class=" text-secondary mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. In vitae consequuntur laborum, saepe repudiandae adipisci ut magnam
                                repellat optio nostrum?</p>
                            <p class="fw-bold">John Smith</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimon-item text-center">
                            <div class="img">
                                <img src="assets/images/team3.png" alt="Not Found">
                            </div>
                            <p class=" text-secondary mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. In vitae consequuntur laborum, saepe repudiandae adipisci ut magnam
                                repellat optio nostrum?</p>
                            <p class="fw-bold">John Smith</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimon-item text-center">
                            <div class="img">
                                <img src="assets/images/team3.webp" alt="Not Found">
                            </div>
                            <p class=" text-secondary mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. In vitae consequuntur laborum, saepe repudiandae adipisci ut magnam
                                repellat optio nostrum?</p>
                            <p class="fw-bold">John Smith</p>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>




    </section> --}}
@endsection
