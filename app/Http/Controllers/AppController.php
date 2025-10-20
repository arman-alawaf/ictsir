<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App;         
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AppController extends Controller
{  
    public function index(){
        $data['app'] = App::latest()->first();
        return view('backend.admin.apps.index', $data);
    }
    
    public function update(Request $request, $id)
    {
        try {
            // $request->validate([
            //     'title' => 'required|unique:studentreviews,title,' . $id
            // ]);
    
            $data = App::findOrFail($id);
            $data->title = $request->title; 
            $data->description = $request->description; 
            $data->phone = $request->phone; 
            $data->email = $request->email;  
            $data->whatsapp = $request->whatsapp;  
            $data->facebook = $request->facebook;  
            $data->facebook_page = $request->facebook_page;  
            $data->youtube = $request->youtube;  
            $data->linkedin = $request->linkedin;  
            $data->instagram = $request->instagram; 
            if($request->hasFile('logo')) {
                $destination1 = 'images/apps/'.$data->logo; if(File::exists($destination1)){ File::delete($destination1); }
                $imageFile = $request->file('logo');
                $imageName = time() . '.webp';
                $destinationPath = public_path('images/apps/' . $imageName);
                $img = Image::make($imageFile->getRealPath());
                $img->encode('webp', 80)->save($destinationPath);
                $data->logo = $imageName;
            }
            if($request->hasFile('favicon')) {
                $destination2 = 'images/apps/'.$data->favicon; if(File::exists($destination2)){ File::delete($destination2); }
                $imageFile = $request->file('favicon');
                $imageName = time() . '.webp';
                $destinationPath = public_path('images/apps/' . $imageName);
                $img = Image::make($imageFile->getRealPath());
                $img->encode('webp', 80)->save($destinationPath);
                $data->favicon = $imageName;
            }
            $data->save();
    
            return redirect()->back()->with('success', 'Updated Successfully Done.');
        } 
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->with('error', $e->validator->errors()->first())
                ->withInput();
        }
    }

    public function destroy(Request $request, $id){
        $data = App::findOrFail($id);
        $destination = 'images/apps/'.$data->image; if(File::exists($destination)){ File::delete($destination); }
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
}
