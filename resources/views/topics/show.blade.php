<!DOCTYPE html>
<html>

<head>
    <title>Topic App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('topics') }}">topic Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('topics') }}">View All topics</a></li>
                <li><a href="{{ URL::to('topics/create') }}">Create a topic</a>
            </ul>
        </nav>

        <h1>{{ $topic->title }}</h1>
        <div class="w-100 d-flex justify-content-between">
            <h2>Problems</h2>
            <a class="btn btn-small btn-success" href="{{ url('problems/create') . '?' . http_build_query(['topic_id' => $topic->id])}}">Add Problem</a>
        </div>
        @foreach($topic->problems as $problem)
        <a href="{{ url('/problems/'. $problem->id) }}">
            <h3>
                {{ $problem->title }}
            </h3>
        </a>
        @endforeach
    </div>
</body>

</html>