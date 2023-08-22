<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Twitter</title>
</head>
<body>
  @auth
    <h2>Logged</h2>
    <form action="/logout" method="POST">
      @csrf
      <button>Log Out</button>
    </form>
    
    <div style="border: 3px solid black;">
      <h2>Create a new Tweet:</h2>
      <form action="/create-tweet" method="POST">
        @csrf
        <textarea name="body" placeholder="What's happening?"></textarea>
        <button>Tweet</button>
      </form>
    </div>

    <div style="border: 3px solid black;">
      <h2>Tweets:</h2>
      @foreach ($tweets as $tweet)
          <div style="background: gray; padding: 5px; margin: 5px">
            {{$tweet['body']}}
            <p><a href="/edit-tweet/{{$tweet->id}}">Edit</a></p>
            <form action="/delete-tweet/{{$tweet->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button>Delete</button>
            </form>
          </div>
      @endforeach
    </div>
  @else
    <div style="border: 3px solid black;">
      <h2>Register</h2>
      <form action="/register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="name">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>
      </form>
    </div>
    <div style="border: 3px solid black;">
      <h2>Login</h2>
      <form action="/login" method="POST">
        @csrf
        <input name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button>Log In</button>
      </form>
    </div>
  @endauth
</body>
</html>