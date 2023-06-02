@extends('user.app')

@section('content')
    <div class="up-icon">
        <i class="bi bi-arrow-up" id="top-btn"></i>
    </div>

    <div class="container-fluid color-primary  text-center my-5 ">
        <h1 class="fw-bold">Projects</h1>
    </div>

    <!-- To set bar progress set width -->

    <div class="container my-5">
        <div class="row text-center">


            @foreach ($projects as $project)
            @php
            $totalAmount = 0;
            @endphp
                @foreach ($payments as $payment)
                    @php
                        
                        
                        if ($payment->project_id == $project->id) {
                            $totalAmount = $totalAmount + $payment->amount;
                        }
                        
                    @endphp
                @endforeach
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-5">
                    <a href="/project-detail/{{ $project->id }}" class="text-decoration-none">
                        <div class="proj-img">
                            <img src="Project-images/{{ $project->image }}" alt="Not Found">
                            <div class="proj-overlay">




                            </div>
                            <div class="date text-white d-flex px-4 text-center pt-3">
                                <p class="ms-2 fw-bold h4">Click To Donate</p>
                            </div>

                        </div>
                    </a>
                    <h4 class="fw-bold proj-head my-4 ">{{ $project->title }}</h4>
                    <div class="d-flex justify-content-between">
                        <p class="">Project Deadline</p>
                        <p class="">{{ date('d-m-Y', strtotime($project->timeline)) }}</p>
                    </div>

                    <div class="progress">
                        <div class="progress-bar fw-bold " role="progressbar"
                            style="width: {{ ($totalAmount / $project->target) * 100 }}%" aria-valuemin="0"
                            aria-valuemax="100">

                            {{ round(($totalAmount / $project->target) * 100, 2) }}%

                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="">{{ $totalAmount }}</p>
                        <p class="">{{ $project->target }}</p>
                    </div>

                </div>
            @endforeach
            {{ $projects->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
