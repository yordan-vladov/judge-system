<!DOCTYPE html>
<html>
<head>
    <title>Subject App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
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

<h1>All the subjects</h1>

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
    @foreach($subjects as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the subject (uses the destroy method DESTROY /subjects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the subject (uses the show method found at GET /subjects/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('subjects/' . $value->id) }}">Show this subject</a>

                <!-- edit this subject (uses the edit method found at GET /subjects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('subjects/' . $value->id . '/edit') }}">Edit this subject</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>