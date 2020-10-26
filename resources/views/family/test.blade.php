<?php
//$1=Modelname
//$2=foldername
//$3=filename
//$4=imagefoldername
//$9=field1name
namespace App\Http\Controllers;

use App\Models\$$1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class $$1Controller extends Controller
{
    public function index()
    {
        $$abcs = $1::all();
        return view('$2.$3', compact('abcs'));
        return Response()->json($$abcs);
    }

    public function create(Request $$request)
    {

$$std= $1::orderBy('created_at', 'desc')->first();
        if ($$std) {
            $$stid = $$std->s_id +1;
    }else{
            $$stid = 1000;

    }
        $img= "";
    if ($image = $request->file('s_image')) {
        $name = $stid;
        $extension = $image->getClientOriginalExtension();
        $imageName = $name . '.' . $extension;
        $path = public_path('backend/image/$4');

        $image->move($path, $imageName);
        $img = $imageName;
    }
        Student::create([
            '$9' => strtoupper( $request->input('$9')),
            's_image' =>  $img,
            's_id' =>  $stid,
            's_status' =>  0,
        ]);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $$stid,
        ]);
    }
    public function delete(Request $$request)
    {
        $$id = $$request->input('id');
        $$std= $1::find($$id);
        $$image_path = "backend/image/$4/$$std->s_image";
        if(File::exists($$image_path)) {
            File::delete($$image_path);
        }
        $1::destroy($$id);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $$id,
        ]);
    }

    public function edit($$id)
    {
        $$stu = $1::find($$id);
        //return view('hasan.index', compact('stu'));
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "m" => "$2",
            "ms" => $$stu,
        ]);
    }
    public function update(Request $$request)
    {
        $$id = $$request->input('inid');
        $$stu = $1::find($$id);
        $$img= "";
        if ($$image = $$request->file('s_image')) {
            $$name = $$stu->s_id;
            $$extension = $$image->getClientOriginalExtension();
            $$imageName = $$name . '.' . $$extension;
            $$path = public_path('backend/image/$4');
            $$image->move($$path, $$imageName);
            $$img = $$imageName;
        }

        $1::where('id',$$id)->update([
            '$9' => strtoupper( $$request->input('$9')),
            's_image' => $$img,
        ]);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
        ]);
    }
    public function status($$id){
        $$std = $1::find($$id);
        if ($$std->status == 1){
            $$t = "Deactivated";

            $1::where('id',$$id)->update([
                'status' =>  0,
            ]);
        }else{
            $$t = "Activated";
            $1::where('id',$$id)->update([
                'status' =>  1,
            ]);
        }
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $$std->status,
            "info" => "$1 status Changed to ".$$t,

        ]);
    }
}


Route::get('$2s', [\App\Http\Controllers\$2Controller::class, 'index']);
Route::post('$2s/create', [\App\Http\Controllers\$2Controller::class, 'create']);
Route::get('$2s/edit/{id}', [\App\Http\Controllers\$2Controller::class, 'edit']);
Route::post('$2s/update', [\App\Http\Controllers\$2Controller::class, 'update']);
Route::post('$2s/delete', [\App\Http\Controllers\$2Controller::class, 'delete']);
Route::get('$2s/status/{id}', [\App\Http\Controllers\$2Controller::class, 'status']);

 $(document).ready(function (){
     var url = $('#url').val();
     $('.dtable').DataTable();
     $(document).on('click', '#addmodal', function () {
         alert("yes");
         $('.modal').modal('show');
         $('#state').text('Save').val('save');
         $("#modal-title").text("Add New");
     });
     $(document).on('click', '.del', function () {

         var id = $(this).val();
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
             if (result.isConfirmed) {
                 $.ajaxSetup({
                    headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var   url = $('#url').val();
                var my_url = url + "/delete";

                alert(my_url);
                $.ajax({
                    type: 'post',
                    url: my_url,
                    data: {
                     id: id,
                    },

                    success: (data) => {
                     console.log(data);

                     $(".table").load(location.href + " .table");
                     Swal.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                     )

                    },
                    error: function (data) {
                     console.log(data)

                    }
                });

            }
         });
    });
     $('#form4submit').submit(function (e) {
         $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        var state = $('#state').val();

        if (state === "save") {
            var my_url = url + "/create";

        } else if (state === "update") {
            my_url = url + "/update";
        } else {
            my_url = $('#adurl').val();
        }
alert(my_url);
        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
             console.log(data);

             $(".table").load(location.href + " .table");
             $('#form4submit').trigger("reset");
             $('.modal').modal('hide');

             Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Added successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function (data) {
             console.log(data)
            }
        });
    });

     $(document).on('click', '.edit', function () {
         var state = $(this).val();
         var my_url = url + '/edit/' + state;
         alert(my_url);
         $.ajax({
            type: 'get',
            url: my_url,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
             console.log(data);
             $('.modal').modal('show');
             $('#state').text('Update').val('update');
             $("#modal-title").text("View/Update");

             $("#inid").val(data.ms.id);
             switch (data.m) {
                 case "$2":
                     $('$9').val(data.ms.$9);
                $("#$9").val(data.ms.$9).trigger('change');
                break;
                 default:
                     console.log('Data Not Found');
             }
         },
            error: function (data) {
             //  toastr.error('Data Load Failed')
         }
        });
    });
// Status Change
     $(document).on('click', '.st', function () {
         var state = $(this).val();
         var my_url = url + '/status/' + state;
         alert(my_url)
        $.ajax({
            type: 'get',
            url: my_url,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
             $(".table").load(location.href + " .table");
             console.log(data);
             setTimeout(function () {
                 Swal.fire(
                     'Good job!',
                     data.info,
                     'success'
                 )
                }, 300);
         },
            error: function (data) {
             Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });
    });
 });

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create$1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('$2s', function (Blueprint $$table) {
            $$table->id();
            $$table->string('$9name');
            $$table->string('s_image');
            $$table->string('s_id');
            $$table->string('status');

            $$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('$2s');
    }
}

@extends('helper.file')
@section('content')
    <div class="row ">
        <div class="col-md-10 offset-1 ">
            <div class="card mb-3">
                <div class="card-header bg-primary">

                    <div class="text-right">
                        <a href="{{URL::to('logout')}}" button class="btn btn-danger" >logout</button>></a>

                        <button type="button" class="btn btn-secondary" id="addmodal">Add New</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table bordered dtable">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($s =1)
                        @foreach ($abcs as $st)
                            <tr>
                                <td>{{$s++ }}</td>
                                <td><img src="{{asset('backend/image/im1/'.$st->s_image)}}" alt="" width="50"></td>

                                <td>{{ $st->name }}</td>
                                <td>{{ $st->s_id }}</td>
                                <td>
                                <?php
                                    if ($st->status ==0){
                                        echo '<button class="btn btn-danger st" value="'.$st->id .'">Disabled</button>';
                                    }else{
                                        echo '<button class="btn btn-success st" value="'.$st->id .'">Enabled</button>';
                                    }

                                    ?>
                                </td>

                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>

                                <td>
                                    <button class="btn btn-warning edit" value="{{ $st->id }}">Edit</button>
                                    <button class="btn btn-danger del" value="{{ $st->id }}">Delete</button>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><span id="modal-title"></span> $1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="form4submit">

                        <div class="form-group">
                            <label for="">$9</label>
                            <input type="text" name="$9" id="$9" placeholder ="$9" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="s_image" id="s_image" placeholder ="image" class="form-control">
                        </div>

                        <input type="text" name="inid" id="inid" value="" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="state" value="save">Save</button>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection

