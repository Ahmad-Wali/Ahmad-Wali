
<section class="card details-card">

    <div class="section-heading">
        <h2>Course Details</h2>

        <a href="{{ route('dashboard') }}" class="btn btn-neutral">
            Close
        </a>
    </div>

    <dl class="details-grid">
        <div>
            <dt>Course Code</dt>
            <dd>{{ $viewing->course_code }}</dd>
        </div>

        <div>
            <dt>Course Name</dt>
            <dd>{{ $viewing->course_name }}</dd>
        </div>

        <div>
            <dt>Credit Hours</dt>
            <dd>{{ $viewing->credit_hours }}</dd>
        </div>

        <div>
            <dt>Semester</dt>
            <dd>{{ $viewing->semester }}</dd>
        </div>

        <div>
            <dt>Registration Date</dt>
            <dd>{{ $viewing->created_at->format('d M Y, H:i') }}</dd>
        </div>
    </dl>

    <a href="{{ route('courses.edit', $viewing->id) }}"
       class="btn btn-primary">
        Edit This Course
    </a>

</section>
