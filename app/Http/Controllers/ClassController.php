<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Student;

class ClassController extends Controller
{
    
    // visit to home page
    public function home() {
        return view('home');
    }

    // visit the class page and READ all stored data in the database
    public function collection() {
        $data = DB::table('students')->get()->toArray();
        return view('collection', compact('data'));
    }

    // UPDATE data in the class page
    public function update(Request $request, $id) {

        DB::table('students')->where('id', $id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'program' => $request->program,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description
        ]);
        
        return redirect('/collection');
    }

    // DELETE data from the class page
    public function delete($id) {

        $student = Student::find($id);
        $destination = public_path('/images/'. $student->image_path);

        if(File::exists($destination)) {
            if($student->image_path != 'sample.png') {
                File::delete($destination);
            }
        }

        $student->delete();
          
        return redirect('/collection');
    }

    // visit store page
    public function store() {
        return view('store');
    }

    // CREATE a new data and insert it to database
    public function create(Request $request) {

        $request->path = 'sample.png';

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('/images'), $filename);
            $request->path = $filename;          
        }
       
        Student::create([
            'image_path' => $request->path,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'program' => $request->program,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect('/collection');
    }

}
