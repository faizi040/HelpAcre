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
        <div class="das-text bg-white dash-two p-5">
            <h1 class="my-5 text-center">Add New Event</h1>
            <form action="{{ route('AddEvent') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label"><strong>Event Title</strong></label>
                                <input type="text" class="form-control" id="title" name="title">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="location" class="form-label"><strong>Event Location</strong></label>
                                <input type="text" class="form-control" id="location" name="location">
                                <span class="text-danger">
                                    @error('location')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="datetime" class="form-label"><strong>Date and Time</strong></label>
                                <input type="datetime-local" class="form-control" id="datetime" name="datetime">
                                <span class="text-danger">
                                    @error('datetime')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                        </div>
                        
                        <div class="col-6">

                            <div class="mb-3">
                                <label for="image" class="form-label"><strong>Image</strong></label>
                                <input type="file" class="form-control" id="image" name="image">
                                <span class="text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-4 mt-5">
                            <button class="btn btn-primary">Add Event</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="das-text bg-white dash-two p-5 mt-5">
            <h1 class="my-5 text-center">List of Upcoming Events</h1>
            <div class="table-responsive-sm">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventlist as $key => $event)
                        <tr>
                            <td>{{ $key += 1 }}</td>
                           
                            <td>{{ $event->title }}</td>
                            
                            <td>{{ $event->location }}</td>

                             <td>
                                <a class="btn btn-warning" href="{{ url('/EditEvent') }}/{{ $event->id }}"><i
                                        class="bi bi-pencil-square"></i></a>

                                <a class="btn btn-danger" href="{{ url('/DeleteEvent') }}/{{ $event->id }} " onclick="return confirm('Are you sure you want to delete this?')"><i
                                        class="bi bi-trash3-fill"></i></a>
                            </td> 
                            

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            {{-- bootstrap pagination link --}}
            {{ $eventlist->withQueryString()->links('pagination::bootstrap-5') }}

        </div>
    </div>
@endsection
