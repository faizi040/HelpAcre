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
            <h1 class="my-5 text-center">Add New Image To Gallery</h1>
            <form action="{{ url('/AddImage') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label"><strong>Image</strong></label>
                    <input type="file" class="form-control" id="image" name="image">
                    <span class="text-danger">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>

                </div>
                <div class="d-flex justify-content-center mb-4 mt-5">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <div class="das-text bg-white dash-two p-5 mt-5">
            <h1 class="my-5 text-center">List of Images</h1>
            <div class="table-responsive-sm">


                <table class="table table-hover text-center ">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $key => $image)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                {{-- displaying image name --}}
                                <td>{{ $image->image }}</td>
                                {{-- displaying image --}}
                                <td><img src="Gallery-images/{{ $image->image }}" width="100px"></td>

                                <td><a class="btn btn-warning" href="{{ url('/editImage') }}/{{ $image->id }}"><i
                                            class="bi bi-pencil-square"></i></a>

                                    <a class="btn btn-danger" href="{{ url('/deleteImage') }}/{{ $image->id }} "
                                        onclick="return confirm('Are you sure you want to delete this?')"><i
                                            class="bi bi-trash3-fill"></i></a>
                                </td>
                                {{-- {{url('/CommentDelete')}}/{{$message->id}}" --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- bootstrap pagination link --}}
            {{ $gallery->withQueryString()->links('pagination::bootstrap-5') }}

        </div>
    </div>
@endsection
