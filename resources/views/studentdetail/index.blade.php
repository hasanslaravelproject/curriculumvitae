@extends('helper.file')
@section('content')
    <div class="row ">
        <div class="col-md-10 offset-1 ">
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <a href="{{URL::to('logout')}}" button class="btn btn-danger" >logout</button>></a>

                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" id="addmodal">Add New</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table bordered dtable">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Class</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($s =1)
                        @foreach ($abcs as $st)
                            <tr>
                                <td>{{$s++ }}</td>

                                <td>
                                    @switch($st->class)
                                        @case("1") one @break
                                        @case("2") two @break
                                        @default : N/A
                                    @endswitch

                                </td>

                                <td>{{ $st->gender }}</td>

                                <td>
                                    @if($st->status == 0)
                                        <button class="btn btn-danger st" value="{{$st->id}}">Disabled</button>
                                    @else
                                        <button class="btn btn-success st" value="{{$st->id}}">Enabled</button>
                                    @endif
                                </td>
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
                    <h5 class="modal-title" id="exampleModalLongTitle"><span id="modal-title"></span> Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="form4submit">




                        <div class="form-group">
                            <label for="">class</label>
                            <select class="form-control" name="class" id="class">
                                <option value="">Select Student class</option>
                                <option value="1">class 1</option>
                                <option value="2">class 2</option>
                                <option value="3">class 3</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">Select Student gender</option>
                                <option value="1">M</option>
                                <option value="2">F</option>



                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">student id</label>
                            <select class="form-control" name="student_id" id="student_id">
                                <option value="">Select Student ID</option>
                                @foreach($Std as $s)
                                    <option value="{{$s->s_id}}">{{$s->s_id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" name="inid" id="inid" value="" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="state" value="save">Save</button>


                    </form>
                </div>
            </div>
        </div>
@endsection
