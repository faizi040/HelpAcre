<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Update </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary  d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-8 rounded bg-white px-5 py-4 ">

                <h1 class="my-5 text-center">Update Event</h1>
                <form action="{{ url('/UpdateEvent') }}/{{ $EditEvent->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"><strong>Event Title</strong></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$EditEvent->title}}">
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
                                    <input type="text" class="form-control" id="location" name="location" value="{{$EditEvent->location}}">
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
                                    <input type="datetime-local" class="form-control" id="datetime" name="datetime" value="{{$EditEvent->datetime}}">
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
                                <button class="btn btn-primary">Update Event</button>
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
