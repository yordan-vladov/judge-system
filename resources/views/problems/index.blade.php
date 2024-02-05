<!DOCTYPE html>
<html>
<head>
    <title>Problem App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
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

<h1>All the problems</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
        </tr>
    </thead>
    <tbody>
    @foreach($problems as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the problem (uses the destroy method DESTROY /problems/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the problem (uses the show method found at GET /problems/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('problems/' . $value->id) }}">Show this problem</a>

                <!-- edit this problem (uses the edit method found at GET /problems/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('problems/' . $value->id . '/edit') }}">Edit this problem</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>