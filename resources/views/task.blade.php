<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3 mb-4">Export File</h1>
                <div id="form-errors"></div>
                <table class="table table-bordered">
                    <thead class="bg-info">
                        <th>Task Title</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        @foreach($task as $task) 
                        <tr>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div class="text-center">
                <button class="btn btn-primary" onclick="saveForm()">Export</button>
            </div>
        </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    function saveForm(){

        $.ajax({
            method:"GET",
            url:"{{url('exportSheet')}}",
            xhrFields: {
                responseType: 'blob'
            },
            success:function(response){
                console.log(response);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(new Blob([response]));
                link.download = 'tasks.xlsx';
                link.click();
            },
            error:function(response){
                console.log(response);
            }
        })
    }
</script>
</body>

</html>