@extends('user.app')
@section('content')


    <div class="container p-5">

        <h1 class="text-center my-5">Project Details for Donation</h1>

        <div class="table-responsive-sm">


            <table class="table table-hover text-center  mt-5">
                <thead>
                    <tr>

                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>

                        <td>
                            <h1>{{ $payProject->title }}</h1>
                        </td>
                        {{-- displaying image --}}
                        <td><img src="Project-images/{{ $payProject->image }}" width="200px"></td>
                        <td>
                            <p class="h5">{{$payProject->description}}</p>
                        </td>



                    </tr>

                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">


            <form action="/donate/{{$amount}}/{{$payProject->id}}" method="POST" class="mx-auto mt-5">
                @csrf
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_51N5QndFedBnjuJXgADRcVTzcHtfFmpy4pPkPTj54ahyVFnm0jvZeyIYXMVhA2vo5vyTR3XU1iIyIAdmJ4huLF3fC00uLAFWCjQ"
                    data-name="Donation" data-description="HelpAcre,Your Help their Need" data-amount="{{ $amount * 100 }}"
                    data-currency="pkr"></script>
            </form>
        </div>
    </div>
        @endsection

       
