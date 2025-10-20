<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;         
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class NoticeController extends Controller
{  
    public function index(){
        $data['notices'] = Notice::latest()->get();
        return view('backend.admin.notices.index', $data);
    }
    
    public function store(Request $request)
    {
        try {
            $data = new Notice;        
            $data->title = $request->title;  
            if($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $imageName = time() . '.webp';
                $destinationPath = public_path('images/notices/' . $imageName);
                $img = Image::make($imageFile->getRealPath());
                $img->encode('webp', 80)->save($destinationPath);
                $data->image = $imageName;
            }
            $data->save();
    
            return redirect()->back()->with('success', 'Added Successfully Done.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->with('error', $e->validator->errors()->first())
                ->withInput();
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $data = Notice::findOrFail($id);    
            $data->title = $request->title; 
            if($request->hasFile('image')) {
                $destination = 'images/notices/'.$data->image; if(File::exists($destination)){ File::delete($destination); }
                $imageFile = $request->file('image');
                $imageName = time() . '.webp';
                $destinationPath = public_path('images/notices/' . $imageName);
                $img = Image::make($imageFile->getRealPath());
                $img->encode('webp', 80)->save($destinationPath);
                $data->image = $imageName;
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
        $data = Notice::findOrFail($id);
        $destination = 'images/notices/'.$data->image; if(File::exists($destination)){ File::delete($destination); }
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
}
