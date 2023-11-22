<?php

namespace App\Http\Controllers;

use App\Models\youtube;
use App\Models\Youtube as ModelsYoutube;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;
use Session;
use File;

class YoutubeController extends Controller
{

    public function index()
    {
        $products = youtube::all();

        return view('frontend.index', compact('products'));
    }

    public function create()
    {
        return view('frontend.add-product');
    }

    public function store(Request $request)
    {
        $tanvir = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);


        // UploadedFile::class

        // $file = $request->file('image');

        // $imageName = $file->store('/uploads');

        $image = $request
            ->file('image')
            ->store('/uploads');



        $tanvir['image'] = $image;


        // Youtube::create([
        //     'name' => $request->name,
        //     'image' => $image,
        // ]);

        Youtube::create($tanvir);


        // Session::flush('key', 'message');
        // session()->flush('key', 'message');
        // back()->with('key', 'message');
        // return redirect()->route('all.product');
        return back()->withMsg('Product add success');
    }


    public function edit($id)
    {
        $product = Youtube::findOrFail($id);
        return view('frontend.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Youtube::findOrFail($id);
        $tanvir = $request->validate([
            'name' => 'required',

        ]);

        if ($request->file('image')) {
            Storage::delete($product->image);
            $image = $request
                ->file('image')
                ->store('/uploads');

            $tanvir['image'] = $image;
        }

        // if ($file = $request->file('image')) {
        //     $image = $file->store('/uploads');

        //     $tanvir['image'] = $image;    
        // }




        $product->update($tanvir);

        // Youtube::where('id', $id)->update($tanvir);


        return back()->withMsg('Product update success');
    }

    public function delete(Youtube $product)
    {
        Storage::delete($product->image);

        $product->delete();
        return back()->withMsg('Product delete success');
    }





















    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     return view('frontend.index');

    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     return view('frontend.index');

    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(youtube $youtube)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(youtube $youtube)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, youtube $youtube)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(youtube $youtube)
    // {
    //     //
    // }
}
