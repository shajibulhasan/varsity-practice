<h1>Welcome page</h1>
<p>Semester: {{$semester}} </p>
<h1>Course</h1>
@foreach ($c_name as $course)
    <li> {{$course}}</li>
@endforeach