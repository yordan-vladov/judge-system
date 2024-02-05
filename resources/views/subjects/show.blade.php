<!DOCTYPE html>
<html>

<head>
    <title>Subject App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('subjects') }}">subject Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('subjects') }}">View All subjects</a></li>
                <li><a href="{{ URL::to('subjects/create') }}">Create a subject</a>
            </ul>
        </nav>

        <h1>{{ $subject->title }}</h1>
        <div class="w-100 d-flex justify-content-between">
            <h2>Topics</h2>
            <a class="btn btn-small btn-success" href="{{ url('topics/create') . '?' . http_build_query(['subject_id' => $subject->id])}}">Add Topic</a>
        </div>
        @foreach($subject->topics as $topic)
        <a href="{{ url('/topics/'. $topic->id) }}">
            <h3>
                {{ $topic->title }}
            </h3>
        </a>
        @endforeach

    </div>
</body>

</html>