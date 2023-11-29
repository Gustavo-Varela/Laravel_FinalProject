<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    public function getAllBands(){

        $bands = $this->allBands();

        return view('bands.all_bands',
            compact('bands'));
    }

    protected function allBands(){
        $bands = db::table('bands')
            ->get();

        return $bands;

    }

    public function viewBand($id) {
        $band = DB::table('bands')
            ->where('id', $id)
            ->first();

        return view('bands.add_band',
            compact('band'));
    }

    public function addBand() {
        return view('bands.add_band');
    }

    public function storeBand(Request $request) {

        if($request->band_id){
            $request->validate([
                'name' => 'string|max:50',
                'year_formed' => '',
                'created_by' => 'min:1',
                'image_path' => 'image'
            ]);

            $image_path = null;
            if ($request->hasFile('photo')){
                $image_path = Storage::putFile('bandPhotos', $request->image_path);
            }

            DB::table('bands')
                ->where('id', $request->band_id)
                ->update([
                    'name' => $request->name,
                    'year_formed' => $request->year_formed,
                    'created_by' => $request->created_by,
                    'image_path' => $image_path
                ]);
        }else{
            $request->validate([
                'name' => 'string|max:50',
                'year_formed' => '',
                'created_by' => 'min:1',
                'image_path' => 'image'
            ]);

            DB::table('bands')
                ->insert([
                    'name' => $request->name,
                    'year_formed' => $request->year_formed,
                    'created_by' => $request->created_by,
                    'image_path' => $request->image_path
                ]);

        }
        return redirect()->route('viewBands');
    }

    public function deleteBand($id) {

        DB::table('bands')
            ->where('id', $id)
            ->delete();

        return redirect()->route('viewBands');
    }
}
