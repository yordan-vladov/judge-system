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

<h1>Edit {{ $topic->title }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($topic, array('route' => array('topics.update', $topic->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the topic!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>