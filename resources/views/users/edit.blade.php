@extends('layouts.app')

@section('content')
                <div class="card">
                    <div class="card-header">My Profile</div>

                    <div class="card-body">

                        @include('partials.error')
                        <form action="{{route('users.update-profile')}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" >
                            </div>

                            <div class="form-group">
                                <label for="about">About me</label>
                                <textarea name="about" class="form-control" cols="5" rows="5" id="about" value="{{$user->about}}">{{$user->about}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Update Profile</button>

                        </form>
                    </div>
                </div>
@endsection
