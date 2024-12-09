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
                <h1 class="text-center mt-3 mb-4">Edit Task</h1>
                <form id="task-form" method="post" onsubmit="editForm(event)">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-2">
                        </div>
                        <div class="col-md-4 ">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1"> Title</label>
                            <input type="text" class="form-control" name="title" value="{{$task->title}}">
                                <span class="text-danger input_image_err formErrors"></span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1"> Description</label>
                            <textarea class="form-control" name="description" >{{$task->description}}</textarea>
                                <span class="text-danger input_image_err formErrors"></span>
                        </div>

                            <div class="form-group mb-2 text-center">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                        </div>
                    </div>

            </form>
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
    function editForm(e){
        e.preventDefault();
        console.log($('#task-form'));
        var uploadForm = $('#task-form')[0];
        var uploadFormData = new FormData(uploadForm);

        $.ajax({
            method:"POST",
            url:"{{url('update/'. $task->id)}}",
            data:uploadFormData,
            processData:false,
            contentType:false,
            success:function(response){
                console.log(response);
                $('#form-errors').html('');
            },
            error:function(response){
                console.log(response);
                var errorsRes = response.responseJSON.errors;

                var str = '';
                for(let i=0; i < errorsRes.length; i++)
                {
                    str += errorsRes[i][0];
                }
                    $('#form-errors').html(str);
            }
        })
    }
</script>
</body>

</html>