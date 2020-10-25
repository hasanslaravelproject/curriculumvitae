<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index()
    {
        $abcs = Student::all();
        return view('student.index', compact('abcs'));
        return Response()->json($abcs);
    }

    public function create(Request $request)
    {

$std= Student::orderBy('created_at', 'desc')->first();
        if ($std) {
            $stid = $std->s_id +1;
    }else{
            $stid = 1000;

    }
        $img= "";
    if ($image = $request->file('s_image')) {
            $name = $stid;
            $extension = $image->getClientOriginalExtension();
            $imageName = $name . '.' . $extension;
            $path = public_path('backend/image/im1');

            $image->move($path, $imageName);
            $img = $imageName;
        }
        Student::create([
            's_name' => strtoupper( $request->input('s_name')),
            's_image' =>  $img,
            's_id' =>  $stid,
            's_status' =>  0,
        ]);


        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $stid,
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $std= Student::find($id);
        $image_path = "backend/image/im1/$std->s_image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Student::destroy($id);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $id,
        ]);
    }

    public function edit($id)
    {
        $stu = Student::find($id);



        //return view('hasan.index', compact('stu'));


        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "m" => "student",
            "ms" => $stu,
        ]);

    }

    public function update(Request $request)
    {
        $id = $request->input('inid');
        $stu = Student::find($id);
        $img= "";
        if ($image = $request->file('s_image')) {
            $name = $stu->s_id;
            $extension = $image->getClientOriginalExtension();
            $imageName = $name . '.' . $extension;
            $path = public_path('backend/image/im1');
            $image->move($path, $imageName);
            $img = $imageName;
        }



        Student::where('id',$id)->update([
            's_name' => strtoupper( $request->input('s_name')),
            's_image' => $img,
        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",


        ]);

    }

    public function status($id){
        $std = Student::find($id);
        if ($std->s_status == 1){
            $t = "Deactivated";

            Student::where('id',$id)->update([
                's_status' =>  0,
            ]);
        }else{
            $t = "Activated";
            Student::where('id',$id)->update([
                's_status' =>  1,
            ]);
        }
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $std->s_status,
            "info" => "student status Changed to ".$t,

        ]);
    }
}





