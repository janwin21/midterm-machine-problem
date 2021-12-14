<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class ClassController extends Controller
{
    
    // visit to home
    public function home() {
        return view('home');
    }

    // visit collection and show all current data
    public function collection() {
        $data = DB::table('students')->get()->toArray();
        return view('collection', compact('data'));
    }

    // update data at collection page
    public function update(Request $request, $id) {

        $request->path = 'sample.png';

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('/images'), $filename);
            $request->path = $filename;          
        }

        DB::table('students')->where('id', $id)->update([
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

    // delete data at collection page
    public function delete($id) {
        DB::table('students')->where('id', $id)->delete();

        return redirect('/collection');
    }

    // visit store
    public function store() {
        return view('store');
    }

    // create new place at store page
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
