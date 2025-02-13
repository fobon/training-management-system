{{-- UNUSED  --}}

@extends('layouts.' . $user->role)

@section('title', 'Profile Page')

@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body{
            /* font-family: 'Roboto', sans-serif; */
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: #060606;
        }

        .rounded-circle {
            margin-left: auto;
            margin-right: auto;
            margin-top: 5%;
            margin-bottom: 10%;
            display:block;
            width: 300px;
            height:300px;
            object-fit: cover;
            margin-bottom: 40px;
        }

        .profile-picture-text{
            margin-top: 20px;
            text-align: center;
            font-size: 28px;
            margin-bottom: 40px;
            font-weight: 700;
            /* font:bold; */
        }

        .profile-data{
            color: #ffffff;
            margin-left:100px;
            font-size: 30px;
            padding: 10px;
            line-height: 1.6;
        }

        .profile-data strong{
            font-weight: 500;
        }

        .profile-data-background{
            background-color: #323232;
            padding: 30px;
            border-radius: 12px;
            max-width: 800;
            margin: 0 auto;
            margin-left: 5%;
            margin-right: 30%;
            /* margin-top:5%; */
        }

    </style>

    <p>This is the profile page</p><br>




    <div class="profile-data-background">
        <img class="rounded-circle" src="{{  asset('storage/' . $user->image)  }}" width="100" alt="Profile Picture">
        {{-- <div class="profile-picture-text">{{  $user->name  }}<br></div> --}}
        <div class="profile-data"><strong>Name : </strong> {{  $user->name   }}</div>
        <div class="profile-data"><strong>Username : </strong> {{  $user->username   }}</div>
        <div class="profile-data"><strong>Company : </strong> {{  $user->company   }}</div>
        <div class="profile-data"><strong>Role : </strong> {{  $user->role   }}</div>
        <div class="profile-data"><strong>Email : </strong> {{  $user->email   }}</div>
        <div class="profile-data"><strong>Phone Number : </strong> {{  $user->phone   }}</div>
        <div class="profile-data"><strong>Date of Birth : </strong> {{  $user->DOB   }}</div>
    </div>

@endsection
