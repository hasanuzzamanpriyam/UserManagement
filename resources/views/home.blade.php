<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        @include('messages')

        @error('success')
            <div class="alert alert-success">{{ $message }}</div>
        @enderror

        <h1>Welcome {{ $user->first_name. ' '.$user->last_name }}, To Home Page.</h1>

        {{-- <h2>Card Image</h2>
        <p>Image at the top (card-img-top):</p> --}}
        <div class="card" style="width:400px">
          <img class="card-img-top" src="{{ asset($user->image) }}" alt="Card image" style="width:100%">
          <div class="card-body">
            <h4 class="card-title">{{ $user->first_name. ' '.$user->last_name }}</h4>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Phone: {{ $user->mo_no }}</p>
            <p class="card-text">Interested In: {{ $user->hobby }}</p>
            <a href="{{ route('contact.create') }}" class="btn btn-primary">Add Contact</a>
            <a href="{{ route('contact.list') }}" class="btn btn-success">See Contacts</a>
            <a href="{{ route('logout') }}" class="btn btn-danger">Log Out</a>
          </div>
        </div>
    </div>
</body>
</html>
