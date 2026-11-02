<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Course;

class CourseController extends Controller
{
    // Display the dashboard and the logged-in user's courses
    public function index(Request $request)
    {
        return $this->dashboard($request);
    }

    // Register a new course
    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        $validated['user_id'] = $request->user()->id;

        Course::create($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Course registered successfully!');
    }

    // Display details of a specific course
    public function show(Request $request, int $course)
    {
        $viewing = $this->ownedCourse($request, $course);

        return $this->dashboard($request, null, $viewing);
    }

    // Open the course editing form
    public function edit(Request $request, int $course)
    {
        $editing = $this->ownedCourse($request, $course);

        return $this->dashboard($request, $editing);
    }

    // Update an existing course
    public function update(Request $request, int $course)
    {
        $existingCourse = $this->ownedCourse($request, $course);

        $validated = $this->validatedData(
            $request,
            $existingCourse
        );

        $existingCourse->update($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Course updated successfully!');
    }

    // Delete a course
    public function destroy(Request $request, int $course)
    {
        $existingCourse = $this->ownedCourse($request, $course);

        $existingCourse->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Course deleted successfully!');
    }

    // Load the dashboard with optional editing or viewing data
    private function dashboard(
        Request $request,
        ?Course $editing = null,
        ?Course $viewing = null
    ) {
        $courses = Course::where('user_id', $request->user()->id)
            ->latest()
            ->get();
        
        return view('dashboard', compact(
            'courses',
            'editing',
            'viewing'
        ));
    }

    // Find a course only if it belongs to the logged-in user
    private function ownedCourse(Request $request, int $id): Course
    {
        return Course::where('user_id', $request->user()->id)
            ->findOrFail($id);
    }

    // Normalize and validate course information
    private function validatedData(
        Request $request,
        ?Course $ignore = null
    ): array {
        $courseCode = $request->input('course_code');

        if (is_string($courseCode)) {
            $request->merge([
                'course_code' => strtoupper(trim($courseCode))
            ]);
        }

        $uniqueRule = Rule::unique('courses', 'course_code')
            ->where('user_id', $request->user()->id);

        if ($ignore !== null) {
            $uniqueRule->ignore($ignore->id);
        }

        return $request->validate([
            'course_code' => [
                'required',
                'string',
                'max:20',
                $uniqueRule,
            ],

            'course_name' => [
                'required',
                'string',
                'max:150',
            ],

            'credit_hours' => [
                'required',
                'integer',
                'between:1,6',
            ],

            'semester' => [
                'required',
                Rule::in(['Spring 2026', 'Fall 2026']),
            ],
        ]);
    }
}
