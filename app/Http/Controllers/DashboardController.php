<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $latestbanners = Banner::latest()->take(3)->get();
        $totalBanners = Banner::count();
        $totalUsers = User::count();
        $totalCompanies = Company::count();

        // Upcoming Birthdays
        $upcomingBirthdays = User::whereNotNull('date_of_birth')
            ->get()
            ->filter(function ($user) {
                $DOB = Carbon::parse($user->DOB);
                $dobThisYear = $DOB->copy()->year(Carbon::now()->year);
                if($dobThisYear->isPast()){
                    $dobThisYear->addYear();
                }
                return $dobThisYear->diffInDays(Carbon::now()) <= 30;
            })
            ->sortBy('date_of_birth');

        return view('dashboard.index', compact('latestBanners', 'totalBanners', 'totalUsers', 'totalCompanies', 'upcomingBirthdays'));
    }

    public function deleteBanner($id) {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('dashboard.index')->width('success', 'Banner deleted successfully.');
    }
}
