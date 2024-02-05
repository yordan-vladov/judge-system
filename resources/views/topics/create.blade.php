<!DOCTYPE html>
<html>
<head>
    <title>Judge System</title>
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

<h1>Create a topic</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'topics')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', old('title'), array('class' => 'form-control')) }}
    </div>

    {{Form::hidden('subject_id',request()->get('subject_id'), array('class' => 'form-control')) }}

    {{ Form::submit('Create the topic!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>