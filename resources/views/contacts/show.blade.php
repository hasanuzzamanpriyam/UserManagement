<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Contact Details</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        @include('messages')

        @error('success')
            <div class="alert alert-success">{{ $message }}</div>
        @enderror

        <div class="card" style="width:400px">
          <div class="card-body">
            <h4 class="card-title">Name: {{ $contact->First_name. ' '.$contact->Last_name }}</h4>
            <p class="card-text">Phone: {{ $contact->Number }}</p>
            <a href="{{ url('contact/destroy/'.$contact->id) }}') }}" class="btn btn-danger">Delete</a>
          </div>
        </div>
    </div>
</body>
</html>
