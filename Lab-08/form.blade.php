
<section class="card">

    <h2>
        {{ $editing ? 'Edit Course' : 'Register a Course' }}
    </h2>

    @if ($errors->any())
        <div class="notice error">
            <strong>Please correct the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ $editing
              ? route('courses.update', $editing->id)
              : route('courses.store') }}">

        @csrf

        @if ($editing)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input
                type="text"
                id="course_code"
                name="course_code"
                maxlength="20"
                value="{{ old('course_code', $editing?->course_code) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input
                type="text"
                id="course_name"
                name="course_name"
                maxlength="150"
                value="{{ old('course_name', $editing?->course_name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="credit_hours">Credit Hours</label>
            <input
                type="number"
                id="credit_hours"
                name="credit_hours"
                min="1"
                max="6"
                value="{{ old('credit_hours', $editing?->credit_hours) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="semester">Semester</label>
            <select id="semester" name="semester" required>
                <option value="">Select semester</option>

                <option value="Spring 2026"
                    @selected(old('semester', $editing?->semester) === 'Spring 2026')>
                    Spring 2026
                </option>

                <option value="Fall 2026"
                    @selected(old('semester', $editing?->semester) === 'Fall 2026')>
                    Fall 2026
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $editing ? 'Save Changes' : 'Register Course' }}
        </button>

        @if ($editing)
            <a href="{{ route('dashboard') }}" class="btn btn-neutral">
                Cancel
            </a>
        @endif

    </form>

</section>
