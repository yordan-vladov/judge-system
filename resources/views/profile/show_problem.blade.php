<!DOCTYPE html>
<html>

<head>
    <title>Problem App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('problems') }}">problem Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('problems') }}">View All problems</a></li>
                <li><a href="{{ URL::to('problems/create') }}">Create a problem</a>
            </ul>
        </nav>

        
        <h1>{{ $problem -> title }}</h1>
        
        <p>{{ $problem->difficulty }}</p>
        <p>{{ $problem->language }}</p>
        <p>{{ $problem->description }}</p>


        <form class="d-flex flex-column" action="{{ url('/submissions') }}" method="POST">
            @csrf
            <label for="solution">Solution:</label>
            <textarea name="solution" id="solution" cols="30" rows="10"></textarea>

            <input id="topic_id" name="problem_id" type="hidden" value="{{  $problem->id }}">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>