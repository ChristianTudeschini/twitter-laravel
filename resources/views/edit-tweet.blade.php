<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Tweet</title>
</head>
<body>
  <h1>Edit</h1>
  <form action="/edit-tweet/{{$tweet->id}}" method="POST">
    @csrf
    @method('PUT')
    <textarea name="body">
      {{$tweet->body}}
    </textarea>
    <button>Edit</button>
  </form>
</body>
</html>