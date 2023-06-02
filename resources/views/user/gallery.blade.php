@extends('user.app')

@section('content')
    

    <div class="up-icon">
        <i class="bi bi-arrow-up" id="top-btn"></i>
    </div>

    <div class="container-fluid color-primary  text-center my-5 ">
        <h1 class="fw-bold">Gallery</h1>
    </div>

    <div class="container  mt-5">
        <div class="gallery-grid grid grid-gap-sm">

            @foreach ($AllImage as $image)
                <a class="" href="#">
                    <img src="Gallery-images/{{ $image->image }}">
                </a>
                {{-- //displaying images using database names --}}
            @endforeach

        </div>
    </div>
@endsection
