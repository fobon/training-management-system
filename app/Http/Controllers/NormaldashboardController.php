<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NormaldashboardController extends Controller
{
    public function index()
    {
        $latestBanners = Banner::latest()->take(3)->get();
        $totalBanners = Banner::count();
        $totalUsers = User::count();
        $totalCompanies = Company::count();

        // Upcoming Birthdays
        $upcomingBirthdays = User::whereNotNull('DOB')
            ->get()
            ->filter(function ($user) {
                $DOB = Carbon::parse($user->DOB);
                $dobThisYear = $DOB->copy()->year(Carbon::now()->year);
                if($dobThisYear->isPast()){
                    $dobThisYear->addYear();
                }
                return $dobThisYear->diffInDays(Carbon::now()) <= 30;
            })
            ->sortBy('DOB');

        return view('normaluser.normaldashboard', compact('latestBanners', 'totalBanners', 'totalUsers', 'totalCompanies', 'upcomingBirthdays'));
    }

}
