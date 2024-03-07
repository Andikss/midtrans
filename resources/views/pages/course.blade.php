@extends('index')

@section('content')
    <section id="courses" class="pt-5">
        <div class="container">
            <h3 class="text-center mb-5" style="font-weight: 600">
                <span class="bg-teal text-white" style="padding-left: 8px">
                    Course
                </span>
                &nbsp;Lists
            </h3>

            <div class="slider-container">
                @foreach ($courses as $course)
                    @include('components.card', ['course' => $course])
                @endforeach
            </div>
        </div>
    </section>
@endsection
