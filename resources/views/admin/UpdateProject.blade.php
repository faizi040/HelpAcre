<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Update </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary  d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-8 rounded bg-white px-5 py-4 ">

                <h1 class="my-5 text-center">Update Project</h1>
                <form action="{{ route('UpdateProject', $project->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"><strong>Project Title</strong></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $project->title }}">
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
                                    <input type="text" class="form-control" id="target" name="target"
                                        value="{{ $project->target }}">
                                    <span class="text-danger">
                                        @error('target')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                            </div>




                            <div class="col-md-12">
                                <div class="mb-3">

                                    <label for="dscription" class="form-label"><strong> Project
                                            Description</strong></label>
                                    <textarea name="description" class="form-control" id="dscription" rows="3">{{ $project->description }}</textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror

                                </div>
                            </div>
                            <div class="mb-12">
                                <label for="timeline" class="form-label"><strong>Project Timeline</strong></label>
                                <input type="date" class="form-control" id="timeline" name="timeline" value="{{$project->timeline}}">
                                <span class="text-danger">
                                    @error('timeline')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="col-12">

                                <div class="mb-3">
                                    <label for="image" class="form-label"><strong>Image</strong></label>
                                    <input type="file" class="form-control" id="image" name="image">


                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-4 mt-5">
                                <button class="btn btn-primary">Update Project</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
