<div class="content">
    <img src="{{ $course->image }}" alt="Content">

    <h5 style="font-weight: 600; margin-left:8px" class="my-3 mb-0">
        {{ $course->name }}
    </h5>
    <small style="margin-left:8px">
        {{ $course->description }}
    </small>

    <br>

    <a href="{{ route('course.detail', ['id' => $course->id]) }}" class="btn rounded-btn btn-teal m-2">
        Get Course <i class="bi bi-arrow-right"></i>
    </a>
</div>
