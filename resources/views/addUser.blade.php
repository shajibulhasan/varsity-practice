@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4">
                <h1>Add new user</h1>
                <form action="{{route('add.user')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control" autocomplete="off">
                        @if ($errors->has('age'))
                        <span class="text-danger">{{$errors->first('age')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" autocomplete="off">
                        @if ($errors->has('city'))
                        <span class="text-danger">{{$errors->first('city')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Photo</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($errors->has('image'))
                        <span class="text-danger">{{$errors->first('image')}}</span>
                        @endif
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
                
            </div>
        </div>
    </div>
    
@endsection