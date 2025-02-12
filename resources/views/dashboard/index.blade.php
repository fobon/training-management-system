@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .slideshow-container
    {
        position: relative;
        max-width: 1000px;
        max-height: 700px;
        margin: auto;
        overflow: hidden;
        border: red;
    }

    .mySlides img
    {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .mySlides.show
    {
        display: block;
        opacity: 1;
    }

    .prev, .next
    {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    .next
    {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover
    {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .text {
        color: #ffffff;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .dot
    {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover
    {
        background-color: #717171;
    }

    .fade
    {
        animation-name: fade;
        animation-duration: 99999999999s;
    }

    @keyframes fade
    {
        from {opacity: 1}
        to {opacity: 1}
    }

    .index
    {
        position: absolute;

    }

</style>

<body >

    <div class="slideshow-container">
        @foreach ($latestBanners as $index => $banner)
            <div class="mySlides fade">
                <div class="numbertext">{{ $index + 1 }} / {{ count($latestBanners) }}</div>
                <img src="{{ asset('storage/' . $banner->image) }}" style="width:100%">
                <div class="text">{{ $banner->name }}</div>
            </div>
        @endforeach

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div style="text-align: center">
        @foreach ($latestBanners as $index => $banner)
            <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
        @endforeach

    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");


            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

    <br>
    <div class="index">
        <div class="indexText">
            <br><br><br><br><br><br>

        </div>
    </div>
</body>


<div class="table p-2">

    <div class="card-container d-flex">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upcoming Birthdays</h5>
                <ul class="list-disc pl-5">
                    @forelse ($upcomingBirthdays as $user)
                        <li class="py-2">
                            {{ $user->name }} <br>Birthday on {{ \Carbon\Carbon::parse($user->DOB)->format('F d') }}
                        </li>
                    @empty
                        <li>No upcoming birthdays.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Banners</h5>
                <p class="card-text text-4xl">{{ $totalBanners }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Companies</h5>
                <p class="card-text text-4xl">{{ $totalCompanies }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text text-4xl">{{ $totalUsers }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Latest Banners</h5>
                @foreach ($latestBanners as $banner)
                        <div>
                            <strong>{{ $banner->name }}</strong> - <a href="{{ $banner->image }}"></a>
                            <td><img src="{{ asset('storage/' . $banner->image)  }}" width="100"></td>
                            <br>
                        </div>
                    <br>
                @endforeach
            </div>
        </div>



    </div>

    <style>
        .card-container
        {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card-title, .card-text
        {
            text-align: center;
        }

        .card
        {
            /* flex: 1; */
            width: 250px;
            height: 120px;
        }


    </style>

</div>

@endsection
