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
            <h1 class="my-5 text-center">Add New Project</h1>
            <form action="{{ route('AddProject') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label"><strong>Project Title</strong></label>
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
                                <label for="target" class="form-label"><strong>Fund Target</strong></label>
                                <input type="text" class="form-control" id="target" name="target">
                                <span class="text-danger">
                                    @error('target')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                        </div>
                       



                        <div class="col-12">

                            <div class="mb-3">
                                <label for="image" class="form-label"><strong>Image</strong></label>
                                <input type="file" class="form-control" id="image" name="image">
                                <span class="text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
    
                                    <label for="dscription" class="form-label"><strong> Project Description</strong></label>
                                    <textarea name="description" class="form-control" id="dscription" rows="3"></textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
    
                                </div>
                            </div>
                            <div class="mb-12">
                                <label for="timeline" class="form-label"><strong>Project Timeline</strong></label>
                                <input type="date" class="form-control" id="timeline" name="timeline">
                                <span class="text-danger">
                                    @error('timeline')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                      
                        </div>
                        
                        <div class="d-flex justify-content-center mb-4 mt-5">
                            <button class="btn btn-primary">Add Project</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="das-text bg-white dash-two p-5 mt-5">
            <h1 class="my-5 text-center">List of Projects</h1>
            <div class="table-responsive-sm">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Title</th>
                            <th>Target</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $key => $project)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                             
                                <td>{{ $project->title }}</td>
                          
                                <td>{{ $project->target }}</td>

                                <td>
                                    <a class="btn btn-warning" href="{{ route('EditProject', $project->id) }}"><i
                                            class="bi bi-pencil-square"></i></a>

                                    <a class="btn btn-danger" href="{{route('DeleteProject',$project->id)}}" onclick="return confirm('Are you sure you want to delete this?')"><i
                                        class="bi bi-trash3-fill"></i></a> 
                                </td>
                               

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- bootstrap pagination link --}}
            {{ $projects->withQueryString()->links('pagination::bootstrap-5') }}

        </div>
    </div>
@endsection
