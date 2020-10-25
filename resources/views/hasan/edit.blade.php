


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
    <div class=" container pt-5">
        <div class="row ">
            <div class="col-md-8 offset-2 ">
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <div class="text-right">
                         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">Add New</button>
                         </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm bordered">
                            <thead>
                                <tr>
                                    <th>student ID</th>
                                    <th>Department</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentdetails as $abc)
                                <tr>
                                    <td>{{ $abc->id }}</td>
                                    <td>{{ $abc->department }}</td>

                                    <td>{{ $abc->email }}</td>
                                    <form action="{{ route('details.destroy', $abc->id) }}" method="POST">
                                        @csrf

                                    <td>
                                         <button  class="btn btn-success btn-sm">Edit</button>

                                  </td>
                                </form>

                                <form action="{{ route('details.update', $abc->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')


                                <td>
                                    <a href="{{ route('details.edit', $abc->id) }}"> <button  class="btn btn-success btn-sm">Edit</button></a>

                              </td>
                            </form>



                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    <title>Document</title>

    </body>

    </html>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('details.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">department</label>
                <input type="text" name="department" placeholder ="department" class="form-control">
            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="email" name="email" placeholder ="email" class="form-control">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>
