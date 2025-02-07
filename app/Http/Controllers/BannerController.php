<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'name' => 'required|string|max:255',
            'link' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $imagePath = $request->file('image')->store('banners', 'public');

        Banner::create([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $imagePath,
        ]);

        return redirect()->route('banners.index')->with('success', 'Banner successfully created!');
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate
        ([
            'name' => 'required|string|max:255',
            'link' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if($request->hasFile('image'))
        {
            Storage::disk('public')->delete($banner->image);
            $imagePath = $request->file('image')->store('banners', 'public');
            $banner->image = $imagePath;
        }

        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully!');
    }

    public function destroy(Banner $banner)
    {
        Storage::disk('public')->delete($banner->image);
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully!');
    }
}
