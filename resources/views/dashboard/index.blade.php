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

    /* .mySlides
    {
        display: none;
        opacity: 0;
        transition: opacity 1s ease;
    } */

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
    {{-- <h1 >
        Latest Banners
    </h1> --}}

    <!-- Slideshow container -->
    <div class="slideshow-container">
        @foreach ($latestBanners as $index => $banner)
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">{{ $index + 1 }} / {{ count($latestBanners) }}</div>
                <img src="{{ asset('storage/' . $banner->image) }}" style="width:100%">
                <div class="text">{{ $banner->name }}</div>
            </div>
        @endforeach

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align: center">
        @foreach ($latestBanners as $index => $banner)
            <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
        @endforeach

    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
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


{{-- <div class="table p-2"> --}}
    {{-- <h1 class="text-2xl font-bold mb-4">Dashboard</h1> --}}

    <!-- Latest Banners -->
    <div class="bg-white shadow-md p-4 rounded-lg mb-6">
        <h2 class="text-xl font-semibold mb-3">Latest Banners</h2>
        <ul>
            @foreach ($latestBanners as $banner)
                <li class="flex justify-between items-center py-2 border-b">
                    <div>
                        <strong>{{ $banner->name }}</strong> - <a href="{{ $banner->image }}"></a>
                        <td><img src="{{ asset('storage/' . $banner->image)  }}" width="100"></td>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white shadow-md p-4 rounded-lg">
            <h2 class="text-lg font-semibold">Total Banners</h2>
            <p class="text-3xl">{{ $totalBanners }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white shadow-md p-4 rounded-lg">
            <h2 class="text-lg font-semibold">Total Users</h2>
            <p class="text-3xl">{{ $totalUsers }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white shadow-md p-4 rounded-lg">
            <h2 class="text-lg font-semibold">Total Companies</h2>
            <p class="text-3xl">{{ $totalCompanies }}</p>
        </div>
    </div>



    <!-- Upcoming Birthdays -->
    <div class="bg-white shadow-md p-4 rounded-lg">
        <h2 class="text-xl font-semibold mb-3">Upcoming Birthdays</h2>
        <ul>
            @forelse ($upcomingBirthdays as $user)
                <li class="py-2 border-b">
                    {{ $user->name }} <br>Birthday on {{ \Carbon\Carbon::parse($user->DOB)->format('F d') }}
                </li>
            @empty
                <li>No upcoming birthdays.</li>
            @endforelse
        </ul>
    </div>

{{-- </div> --}}

@endsection
