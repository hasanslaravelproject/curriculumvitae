<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\Student;
use Closure;
use Illuminate\Http\Request;

class Checklogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $s_id =$request->input('s_id');

        $std = Student::where('s_id',$s_id)->first();
        if ($std){

            /*session(['st' => "yes"]);
            return redirect()->route('student');
*/
            $role = Role::where('student_id',$s_id)->first();
            session(['role' => $role ->role_name]);
            switch ($role ->role_name){
                case "admin":
                    return redirect('studentdetail');
                    break;
                case "student":
                    return redirect('students');
                    break;
                case "parent":
                    return redirect('family');
                    break;
                default:
                    return back();
            }



        }else{

            return back()->with('msg', 'hello, it is not found');
        }
    }
}
