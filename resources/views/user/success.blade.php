@extends('user.app')

@section('content')

<div class="container my-5 p-4">

    <h1 class="text-center fw-bold mt-4">Thank You for Donating</h1>

    <p class="text-center my-4 fw-300">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias illum, in aliquam dicta aperiam exercitationem nemo incidunt voluptatibus delectus culpa sint maiores obcaecati nisi facere deserunt eligendi facilis error asperiores.</p>

    <div class="d-flex justify-content-center">

        <a href="{{url('/')}}" class="btn btn-primary">Go to home</a>
    </div>
</div>
@endsection