<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function bandAlbums($id) {
        $albums = DB::table('albums')
            ->where('band', $id)
            ->orderBy('year_released', 'DESC')
            ->get();

        $band = DB::table('bands')
            ->where('id', $id)
            ->first();

        return view('albums.band_albums',
            compact('albums', 'band'));
    }

    public function viewAlbum($id) {

        $album = DB::table('albums')
            ->where('id', $id)
            ->first();

        $bands = DB::table('bands')
            ->get();

        return view('albums.add_album', compact('album', 'bands'));

    }

    public function addAlbum() {
        $bands = DB::table('bands')
            ->get();

        return view('albums.add_album', compact('bands'));
    }

    public function storeAlbum(Request $request) {

        if($request->album_id){
            $request->validate([
                'name' => 'string|max:50',
                'year_released' => '',
                'band' => 'min:1',
                'image_path' => 'image'
            ]);

            $image_path = null;
            if ($request->hasFile('photo')){
                $image_path = Storage::putFile('albumPhotos', $request->image_path);
            }

            DB::table('albums')
                ->where('id', $request->album_id)
                ->update([
                    'name' => $request->name,
                    'year_released' => $request->year_released,
                    'band' => $request->band,
                    'image_path' => $image_path
                ]);
        }else{
            $request->validate([
                'name' => 'string|max:50',
                'year_released' => '',
                'band' => 'min:1',
                'image_path' => 'image'
            ]);

            DB::table('albums')
                ->insert([
                    'name' => $request->name,
                    'year_released' => $request->year_released,
                    'band' => $request->band,
                    'image_path' => $request->image_path
                ]);

        }
        return redirect()->route('viewBands');
    }

    public function deleteAlbum($id) {

        DB::table('albums')
            ->where('id', $id)
            ->delete();

        return redirect()->route('viewBands');
    }
}
