@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white shadow-md p-4 rounded-lg">
            <h2 class="text-lg font-semibold">Total Banners</h2>
            <p class="text-3xl">{{ $totalBanners }}</p>
        </div>
        <div class="bg-white shadow-md p-4 rounded-lg">
            <h2 class="text-lg font-semibold">Total Users</h2>
            <p class="text-3xl">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white shadow-md p-4 rounded-lg">
            <h2 class="text-lg font-semibold">Total Companies</h2>
            <p class="text-3xl">{{ $totalCompanies }}</p>
        </div>
    </div>

    <!-- Latest Banners -->
    <div class="bg-white shadow-md p-4 rounded-lg mb-6">
        <h2 class="text-xl font-semibold mb-3">Latest Banners</h2>
        <ul>
            @foreach ($latestBanners as $banner)
                <li class="flex justify-between items-center py-2 border-b">
                    <div>
                        <strong>{{ $banner->name }}</strong> - <a href="{{ $banner->link }}" target="_blank" class="text-blue-500">View</a>
                    </div>
                    <div>
                        <a href="{{ route('banners.edit', $banner->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('banners.delete', $banner->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Upcoming Birthdays -->
    <div class="bg-white shadow-md p-4 rounded-lg">
        <h2 class="text-xl font-semibold mb-3">Upcoming Birthdays</h2>
        <ul>
            @forelse ($upcomingBirthdays as $user)
                <li class="py-2 border-b">
                    {{ $user->name }} - {{ \Carbon\Carbon::parse($user->date_of_birth)->format('F d') }}
                </li>
            @empty
                <li>No upcoming birthdays.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
