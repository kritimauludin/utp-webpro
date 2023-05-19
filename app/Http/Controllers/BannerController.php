<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->roles_id == 1){
            $umkms = Umkm::all();
        }else {
            $umkms = Umkm::where('user_id', auth()->user()->id)->get();
        }
        return view('banner.v-indexBanner', [
            'umkms' => $umkms
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner.v-addNewBanner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // setup rules
        $validatedData = $request->validate([
            'business_name' => 'required|min:3|max:255',
            'business_owner' => 'required|min:3|max:255',
            'url_instagram' => 'required|min:10|max:255',
            'img_url' => 'required|min:10',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        

        Umkm::create($validatedData);
        return redirect('/banner')->with('success', 'Banner promosi berhasil disimpan !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bannerData = Umkm::where('id', $id)->get();
        return view('banner.v-updateBanner', [
            'banner' => $bannerData[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'business_name' => 'required|min:3|max:255',
            'business_owner' => 'required|min:3|max:255',
            'url_instagram' => 'required|min:10|max:255',
            'img_url' => 'required|min:10',
        ]);
        Umkm::where('id', $id)->update($validatedData);
        return redirect('/banner')->with('success', 'Banner promosi berhasil diubah !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Umkm::destroy($id);
        return redirect('/banner')->with('success', 'Banner promosi berhasil dihapus !!');
    }
}
