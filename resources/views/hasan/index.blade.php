@extends('helper.file')
@section('content')
        <div class="row ">
            <div class="col-md-8 offset-2 ">
                <div class="card mb-3">
                    <div class="card-header bg-primary">

                        <div class="text-right">
                          <button type="button" class="btn btn-secondary" id="addmodal">Add New</button>
                         </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm bordered dtable">
                            <thead>
                                <tr>
                                    <th>student ID</th>
                                    <th>Department</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($s =1)
                                @foreach ($abcs as $abc)
                                <tr>
                                    <td>{{$s++ }}</td>
                                    <td class="dep">{{ $abc->department }}</td>

                                    <td>{{ $abc->email }}</td>



                                    <td>
                                        <button class="btn btn-warning edit" value="{{ $abc->id }}">Edit</button>
                                        <button class="btn btn-danger del" value="{{ $abc->id }}">Delete</button>

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
                <label for="">department</label>
                <input type="text" name="department" id="department" placeholder ="department" class="form-control">
            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="email" name="email" id="email" placeholder ="email" class="form-control">
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
