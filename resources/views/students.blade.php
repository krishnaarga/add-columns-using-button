<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Students</title>
    </head>
    <body>
        <h2 class="text-center">STUDENTS</h2>
        <div class="container">
            <div class="row">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-addstudent-tab" data-bs-toggle="pill" data-bs-target="#pills-addstudent" type="button" role="tab" aria-controls="pills-addstudent" aria-selected="false">ADD STUDENT</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-studentlist-tab" data-bs-toggle="pill" data-bs-target="#pills-studentlist" type="button" role="tab" aria-controls="pills-addstudent" aria-selected="false">Session Student</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-database-tab" data-bs-toggle="pill" data-bs-target="#pills-database" type="button" role="tab" aria-controls="pills-database" aria-selected="false">Database Student</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-addstudent" role="tabpanel" aria-labelledby="pills-addstudent-tab">
                            <form method="post" action="add-student">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="age" class="form-control" name="age" id="age" placeholder="Enter Age">
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Add Student" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show active" id="pills-studentlist" role="tabpanel" aria-labelledby="pills-studentlist-tab">
                            <table class="table table-striped table-hover table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $count = 0;
                                    @endphp

                                    @if(count($students) > 0)
                                        @foreach($students as $key=>$student)
                                            @php $count++; @endphp
                                            <tr>
                                                <th>{{$count}}</th>
                                                <th>{{$student['name']}}</th>
                                                <th>{{$student['email']}}</th>
                                                <th>{{$student['age']}}</th>
                                                <th>
                                                    <a href="/edit/{{$key}}" class="btn btn-warning">Edit</a>
                                                    <a href="/delete/{{$key}}" class="btn btn-danger">Delete</a>
                                                </th>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center text-danger fw-bold">No Data Avalable</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-database" role="tabpanel" aria-labelledby="pills-database-tab">
                            <table class="table table-striped table-hover table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script ript src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>