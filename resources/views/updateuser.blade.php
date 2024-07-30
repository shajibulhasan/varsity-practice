@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4">
                <h1>Update user</h1>
                <form action="{{route('update.user', $data->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" id="email" value="{{$data->email}}" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="name">Age</label>
                        <input type="number" name="age" id="age" value="{{$data->age}}" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="name">City</label>
                        <input type="text" name="city" id="city" value="{{$data->city}}" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Photo</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
                
            </div>
        </div>
    </div>
    
@endsection