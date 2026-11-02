
<section class="card">

    <div class="section-heading">
        <h2>My Registered Courses</h2>
        <span>{{ $courses->count() }} Courses</span>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Credits</th>
                    <th>Semester</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($courses as $course)
                    <tr class="{{ $editing?->id === $course->id ? 'editing-row' : '' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->credit_hours }}</td>
                        <td>{{ $course->semester }}</td>

                        <td class="actions">
                            <a href="{{ route('courses.show', $course->id) }}"
                               class="btn btn-neutral">
                                View
                            </a>

                            <a href="{{ route('courses.edit', $course->id) }}"
                               class="btn btn-primary">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('courses.destroy', $course->id) }}"
                                  onsubmit="return confirm('Delete this course?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-state">
                            You have not registered any courses yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</section>
