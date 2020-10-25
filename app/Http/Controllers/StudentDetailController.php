<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentDetail;
use Illuminate\Http\Request;

class StudentDetailController extends Controller
{
    public function index()
    {
        $Std = Student::all();
        $abcs = StudentDetail::all();
        return view('studentdetail.index', compact('abcs','Std'))    ;

}

public function create(Request $request)
    {



        StudentDetail::create([
            'class' => strtoupper( $request->input('class')),
            'gender' => strtoupper( $request->input('gender')),
            'student_id' => strtoupper( $request->input('student_id')),
             'status' =>  0,
        ]);


        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",

        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $std= StudentDetail::find($id);

        StudentDetail::destroy($id);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $id,
        ]);
    }

    public function edit($id)
    {
        $stu = StudentDetail::find($id);



        //return view('hasan.index', compact('stu'));


        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "m" => "studentdetail",
            "ms" => $stu,
        ]);

    }

    public function update(Request $request)
    {
        $id = $request->input('inid');
        $stu = StudentDetail::find($id);

        StudentDetail::where('id',$id)->update([
            'class' => strtoupper( $request->input('class')),
            'gender' => strtoupper( $request->input('gender')),
            'student_id' => strtoupper( $request->input('student_id')),

        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",


        ]);

    }

    public function status(){

    }
}





