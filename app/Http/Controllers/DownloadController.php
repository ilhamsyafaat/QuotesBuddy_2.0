<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    //view
    public function download_salespage()
    {
        //
        return view('landing.download.Download_salespage');
    }

    public function download_upsell()
    {
        //
        return view('landing.download.Download_upsell');
    }

    public function download_downsell()
    {
        //
        return view('landing.download.Download_downsell');
    }

    //Download_Frontend
    public function downloadfe()
    {
        try {
            return Storage::disk('local')->download('public/file_download/QB(FRONTEND).pdf');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function lisensife()
    {
        try {
            return Storage::disk('local')->download('public/file_download/PLR CERTIFICATE.png');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //Download_Upsell
    public function downloadup()
    {
        try {
            return Storage::disk('local')->download('public/file_download/QB(UPSELL).pdf');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function lisensiup()
    {
        try {
            return Storage::disk('local')->download('public/file_download/PLR CERTIFICATE.png');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //Download_Downsell
    public function downloaddwn()
    {
        try {
            return Storage::disk('local')->download('public/file_download/QB(DOWNSELL).pdf');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function lisensidwn()
    {
        try {
            return Storage::disk('local')->download('public/file_download/PLR CERTIFICATE.png');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
