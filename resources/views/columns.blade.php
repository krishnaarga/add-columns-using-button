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
        <div class="container mt-5">
            <form method="post" action="add-columns" id="stdForm">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover table-hover">
                            <thead class="table-dark">
                                <tr>
                                    @php
                                        $last_column = end($columns);
                                        $last_column_exp = explode('column', $last_column);
                                        $last_column_num = end($last_column_exp);
                                        $get_student_id = [];
                                    @endphp

                                    @foreach($columns as $column)
                                        <th>{{$column}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    @php
                                        $get_student_id[] = $student->id;
                                    @endphp
                                    <tr id="tr{{$student->id}}">
                                        @foreach($columns as $column)
                                            <th>
                                                <input type="text" name="{{$student->id}}[{{$column}}]" class="form-control" value="{{$student->$column}}">
                                            </th>
                                        @endforeach
                                    </tr>
                                @endforeach
                                @php
                                    $get_student_id = implode(",", $get_student_id);
                                @endphp
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-success btn-sm" id="addColumn">Add Column</button>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-danger btn-sm btn-block" id="addColumn">Reset</button>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-primary btn-sm btn-block" id="addColumn">Update</button>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>   
        <script>
            $(document).ready(function(){
                // name="id${lastColumnNum}['column${lastColumnNum}']
                var lastColumnNum = "<?= $last_column_num; ?>";
                var get_student_id = "<?= $get_student_id; ?>";
                var get_student_id = get_student_id.split(",");

                $('#addColumn').click(function(){
                    lastColumnNum++;
                    $('table > thead > tr').append(`<th>column${lastColumnNum}</th>`);
                    get_student_id.forEach(element => {
                        $('table > tbody > #tr'+element).append( `<td><input type="text" name="${element}[column${lastColumnNum}]" class="form-control" value=""></td>` );
                    });
                });
            });
        </script>
</body>
</html>