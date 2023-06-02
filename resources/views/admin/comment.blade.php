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
            <h1 class="my-4 text-center">User Messages</h1>
            <div class="table-responsive-sm">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $key => $message)
                        <tr>
                            <td>{{ $key += 1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->message }}</td>

                            <td><a class="btn btn-danger" href=" {{ url('/CommentDelete') }}/{{ $message->id }}" onclick="return confirm('Are you sure you want to delete this?')"><i
                                        class="bi bi-trash3-fill"></i></a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            {{-- bootstrap pagination link --}}
            {{ $comment->withQueryString()->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
