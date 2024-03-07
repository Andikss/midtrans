@extends('index')

@section('content')
    <section id="courses">
        <div class="container">
            <h3 class="text-center mb-5" style="font-weight: 600">
                <span class="bg-teal text-white" style="padding-left: 8px">
                    Course
                </span>
                &nbsp;Lists
            </h3>

            <div class="slider-container">
                @foreach ($courses as $course)
                    <div class="content">
                        <img src="{{ $course->image }}" alt="Content">

                        <h5 style="font-weight: 600; margin-left:8px" class="my-3 mb-0">
                            {{ $course->name }}
                        </h5>
                        <small style="margin-left:8px">
                            {{ $course->description }}
                        </small>

                        <br>

                        <a href="#" class="btn rounded-btn btn-teal m-2">
                            Get Course <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
