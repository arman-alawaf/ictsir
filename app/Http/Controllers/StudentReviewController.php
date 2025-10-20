<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentReview;         
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class StudentReviewController extends Controller
{  
    public function index(){
        $data['studentreviews'] = StudentReview::latest()->get();
        return view('backend.admin.studentreviews.index', $data);
    }
    
    public function store(Request $request)
    {
        try {
            // $request->validate([
            //     'name' => 'required|unique:studentreviews,name'
            // ]);
    
            $data = new StudentReview;        
            $data->name = $request->name; 
            $data->review = $request->review; 
            $data->varsity = $request->varsity; 
            $data->subject = $request->subject;  
            if($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $imageName = time() . '.webp';
                $destinationPath = public_path('images/studentreviews/' . $imageName);
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
            // $request->validate([
            //     'title' => 'required|unique:studentreviews,title,' . $id
            // ]);
    
            $data = StudentReview::findOrFail($id);
            $data->name = $request->name;
            $data->review = $request->review; 
            $data->varsity = $request->varsity; 
            $data->subject = $request->subject; 
            if($request->hasFile('image')) {
                $destination = 'images/studentreviews/'.$data->image; if(File::exists($destination)){ File::delete($destination); }
                $imageFile = $request->file('image');
                $imageName = time() . '.webp';
                $destinationPath = public_path('images/studentreviews/' . $imageName);
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
        $data = StudentReview::findOrFail($id);
        $destination = 'images/studentreviews/'.$data->image; if(File::exists($destination)){ File::delete($destination); }
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
}

