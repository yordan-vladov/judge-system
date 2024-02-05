<!DOCTYPE html>
<html>
<head>
    <title>Topic App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
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

<h1>All the topics</h1>

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
    @foreach($topics as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->Subject->title }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the topic (uses the destroy method DESTROY /topics/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the topic (uses the show method found at GET /topics/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('topics/' . $value->id) }}">Show this topic</a>

                <!-- edit this topic (uses the edit method found at GET /topics/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('topics/' . $value->id . '/edit') }}">Edit this topic</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>