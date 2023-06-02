@extends('user.app')
@section('content')

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/make/paymnet') }}/{{$projectDetail->id}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Enter Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount"
                                placeholder="Enter amount in multiples of 500">
                           
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Proceed">
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="container my-5">
    <span class="text-danger">
        @error('amount')
            {{ $message }}
        @enderror
    </span>

    <div class="row py-5">
        <div class="col-md-6 col-sm-12 col-12">
            <h1 class="text-center">{{$projectDetail->title}}</h1>
            <p class="h5 my-5">{{$projectDetail->description}}</p>
        </div>
        <div class="col-md-6 col-sm-12 col-12 project-detail">
            <div class="img" >
                <img src="Project-images/{{ $projectDetail->image }}">
            </div>
        </div>
        <div class="d-flex justify-content-center">

            <button type="button" class="fw-bold btn-1 mt-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Donate
            </button>
        </div>
        
        
    </div>
</div>




@endsection