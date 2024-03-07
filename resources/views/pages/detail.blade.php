@extends('index')
@section('content')
    <section id="course">
        <div class="container py-5">
            <h1 style="font-size: 32px; font-weight: 650">
                <span class="bg-teal text-white" style="padding-left: 8px">
                    Midtrans
                </span>
                &nbsp;Course
            </h1>
            <small>
                where academic excellence meets innovative learning solutions!
            </small>

            <div class="row my-3">
                <div class="col-lg-6 col-ms-12 col-sm-12">
                    <img src="{{ $course->image }}" alt="Course Image" width="100%">
                </div>
                <div class="col-lg-6 col-ms-12 col-sm-12">

                </div>
            </div>

            <div class="row">
                <h5>Course Detail</h5>

                <div class="col-lg-6 col-md-12 col-sm 12">
                    <form action="{{ route('transaction.store') }}" method="POST">
                        <input type="hidden" value="{{ $course->id }}" name="id">
                        <div class="mb-2">
                            <label for="name" class="form-label mb-0"><small>Course Name</small></label>
                            <input type="text" class="form-control" value="{{ $course->name }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="category" class="form-label mb-0"><small>Category</small></label>
                            <input type="text" class="form-control" value="{{ $course->category->name }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label mb-0"><small>Course Price</small></label>
                            <input type="text" class="form-control" value="{{ $course->price }}" disabled>
                        </div>

                        <button type="submit" class="btn rounded-btn btn-teal">
                            Get Course <i class="bi bi-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
