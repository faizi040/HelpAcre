<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Update Member </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary  d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-8 rounded bg-white px-5 py-4 ">

                <h1 class="my-5 text-center">Update Member</h1>
                <form action="{{route('UpdateMember',$team->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label"><strong>Name</strong></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$team->name}}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="designation" class="form-label"><strong>Designation</strong></label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="{{$team->designation}}">
                                    <span class="text-danger">
                                        @error('designation')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">

                                    <label for="dscription" class="form-label"><strong>Description</strong></label>
                                    <textarea name="description" class="form-control" id="dscription" rows="3">{{$team->description}}</textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror

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
                            </div>


                            <div class="d-flex justify-content-center mb-4 mt-5">
                                <button class="btn btn-primary">Update Member</button>
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
