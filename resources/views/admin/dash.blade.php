@extends('admin.app')

@section('content')
    <div class="col-lg-9 col-12  ps-5">
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

        <div class="das-text bg-white dash-two py-5 ">
            <h1 class="my-5 text-center">Records</h1>
            <div class="d-flex flex-wrap justify-content-center">

            
            <div class="dash-block">
                <p class="fw-bold">Total Number of Users:{{ $userCount }}</p>
            </div>
            <div class="dash-block">
                <p class="fw-bold">Total Number of Projects:{{ $projectCount }}</p>
            </div>
            <div class="dash-block">
                <p class="fw-bold">Upcoming Events:{{ $eventCount }}</p>
            </div>
            <div class="dash-block">
                <p class="fw-bold">Total Team members:{{ $teamCount}}</p>
            </div>
            <div class="dash-block">
               
                     <p class="fw-bold">Total Number of Donations:{{$donorCount}}</p>
            </div>
            <div class="dash-block">
                @php
                    $Amount = 0;
                @endphp
                @foreach ($payments as $payment)
                @php
                    
                    $Amount += $payment->amount;
                @endphp
                    
                @endforeach
                     <p class="fw-bold">Total Donations Amount:{{$Amount}}</p>
            </div>
        </div>
           

        </div>
        <div class="das-text bg-white dash-two p-5 mt-5">
            <h1 class="my-5 text-center">List of Users</h1>
            <div class="table-responsive-sm">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>email</th>
                            @if (Auth::user()->name=="Muhammad Faiz Rasool")
                                
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                {{-- displaying image name --}}
                                <td>{{ $user->name }}</td>
                                {{-- displaying image --}}
                                <td>{{ $user->email }}</td>
                                @if (Auth::user()->name=="Muhammad Faiz Rasool")
                                <td>
                                    @if ($user->role == 0)
                                        <a href="{{ route('admin.role', $user->id) }}"><button class="btn btn-primary">Make
                                                Admin</button></a>
                                    @else
                                        <a href="{{ route('admin.role', $user->id) }}"><button class="btn btn-danger">Remove
                                                Admin</button></a>
                                    @endif

                                </td>
                                @endif
                                

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- bootstrap pagination link --}}
            {{ $users->withQueryString()->links('pagination::bootstrap-5') }}

        </div>
    </div>
@endsection
