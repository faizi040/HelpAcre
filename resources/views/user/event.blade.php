@extends('user.app')

@section('content')
   
    <div class="up-icon">
        <i class="bi bi-arrow-up" id="top-btn"></i>
    </div>


    <div class="container color-primary  text-center my-5 ">
        <h1 class="fw-bold">Social Events</h1>
        <!-- We Arrange Many Social Events For Charity Donations -->
    </div>

    <div class="container">
        @foreach ($AllEvents as $Event)
            <div class="row mx-5 my-4 ">

                <!-- <div class=" d-flex"> -->
                <div class="event-img col-lg-3 col-md-4 col-sm-12  col-12 ">

                    <img src="Event-images/{{ $Event->image }}" alt="Not Found">
                </div>

                <div class=" col-lg-9 col-md-8 col-sm-12 col-12 event-text my-sm-auto ps-md-5">
                    <h2 class="proj-head mb-3 mt-md-0 mt-3"> {{ $Event->title }}</h2>
                    <span><i class="fa fa-map-marker me-3"></i>{{ $Event->location }}</span>
                    <span class="ms-4"><i class="fa fa-clock-o me-3"></i> {{date('h:i a',strtotime($Event->datetime))}}
                
                    
                    </span>
                    <span class="ms-4"><i class="bi bi-sort-down me-3"></i>{{ date('d-m-Y', strtotime($Event->datetime)) }}</span>
                </div>
               
                <!-- </div> -->

            </div>
        @endforeach
        {{ $AllEvents->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
@endsection
