@extends('layouts.master')

@section('content')

<a href="/" class="btn btn-secondary mb-3">
    ← Quay lại
</a>
<h3>{{ $course->name }}</h3>

<div class="row">

    <!-- LEFT: Lessons -->
    <div class="col-md-8">
        @foreach($course->lessons as $lesson)
        <div class="card mb-3 p-3">
            <h5>{{ $lesson->title }}</h5>
            <p>{{ $lesson->content }}</p>

            @if($lesson->video_url)
                <iframe width="100%" height="250"
                    src="{{ $lesson->video_url }}"
                    frameborder="0" allowfullscreen>
                </iframe>
            @endif
        </div>
        @endforeach
    </div>

    <!-- RIGHT: Học viên -->
    <div class="col-md-4">
        <h5>👨‍🎓 Học viên</h5>

        @foreach($course->enrollments as $e)
            <div class="border p-2 mb-2 rounded">
                {{ $e->student->name ?? 'N/A' }}
            </div>
        @endforeach
    </div>

</div>

@endsection