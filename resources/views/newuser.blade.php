@extends('layouts/app')
@section('content')
    <div class="container">
        <h2 style="text-align: center;">Users Information</h2>
        <a href="{{route('displayform')}}" class="btn btn-primary btn-sm">Add new user</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $users=>$user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->city}}</td>
                    <td><img src="{{asset('images/'.$user->image_path)}}" alt="" width="80px" height="80px"></td>
                    <td><a href="{{route('user',$user->id)}}" class="btn btn-primary btn-sm">View</a></td>
                    <td><a href="{{route('fetchdata.user', $user->id)}}" class="btn btn-success btn-sm">Update</a></td>
                    <td><a href="{{route('delete.user',$user->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div>
            {{$data->links('pagination::bootstrap-4')}}
        </div> --}}
    </div>
@endsection