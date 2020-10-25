<?php

namespace App\Http\Controllers;

use App\Models\FamilyInfo;
use App\Models\Student;

use Illuminate\Http\Request;

class FamilyInfoController extends Controller
{
    public function index()
    {
        $Std = Student::all();
        $abcs = FamilyInfo::all();
        return view('family.index', compact('abcs','Std'))    ;

    }

    public function create(Request $request)
    {



        FamilyInfo::create([
            'parents_name' => strtoupper( $request->input('parents_name')),
            'address' => strtoupper( $request->input('address')),
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
        $std= FamilyInfo::find($id);

        FamilyInfo::destroy($id);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $id,
        ]);
    }

    public function edit($id)
    {
        $stu = FamilyInfo::find($id);



        //return view('hasan.index', compact('stu'));


        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "m" => "family",
            "ms" => $stu,
        ]);

    }

    public function update(Request $request)
    {
        $id = $request->input('inid');
        $stu = FamilyInfo::find($id);

        FamilyInfo::where('id',$id)->update([
            'parents_name' => strtoupper( $request->input('parents_name')),
            'address' => strtoupper( $request->input('address')),
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





