<!DOCTYPE html>
<html>

<head>
    <title>Judge System</title>
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

        <h1>Create a problem</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <form class="d-flex flex-column" action="{{ url('/problems') }}" method="POST">
            @csrf
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="">

            <label for="language">Language:</label>
            <input type="text" id="language" name="language" value="">

            <label for="difficulty">Difficulty:</label>
            <select name="difficulty" id="difficulty">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>

            <input type="hidden" name="topic_id" value="">

            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>


            <label for="solution">Solution:</label>
            <textarea name="solution" id="solution" cols="30" rows="10"></textarea>

            <label for="input">Inputs:</label>
            <textarea name="inputs" id="inputs" cols="30" rows="10" value="[]" readonly>[]</textarea>

            <label for="new_input">New Input:</label>
            <textarea id="new_input" cols="30" rows="10"></textarea>

            <button type="button" onclick="addInput()">Add</button>
            <button type="button" onclick="clearInput()">Clear</button>


            <input id="topic_id" name="topic_id" type="hidden" value="{{ request()->get('topic_id') }}">

            <input type="submit" value="Submit">
        </form>
   <script id="wildcardScript" src="{{ asset('js/updateWildcards.js') }}"></script>
    </div>
</body>

</html>