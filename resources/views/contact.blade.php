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
                <h1 class="text-center mt-3 mb-4">Form Validation</h1>
                <div id="form-errors" class="text-danger"></div>
                <form id="contact-form" method="post" enctype="multipart/form-data" onsubmit="saveContactForm(event)">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-2">
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1"> Name</label>
                                <input type="text" class="form-control" name="input_name" 
                                    aria-describedby="emailHelp" >
                                    <span class="text-danger input_name_err formErrors"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1"> Email</label>
                                <input type="email" class="form-control" name="input_email"
                                    aria-describedby="emailHelp" >
                                    <span class="text-danger input_email_err formErrors"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1"> Phone No</label>
                                <input type="tel" class="form-control" name="input_phone" 
                                    aria-describedby="emailHelp">
                                    <span class="text-danger input_phone_err formErrors"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1"> Image</label>
                                <input type="file" class="form-control" name="input_image" 
                                    aria-describedby="emailHelp" >
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
</body>
<script>
    function saveContactForm(e){
        e.preventDefault();
        console.log($('#contact-form'));
        var contactForm = $('#contact-form')[0];
        var contactFormData = new FormData(contactForm);

        $('.formErrors').html('');
        $.ajax({
            method:"POST",
            url:"{{url('saveContactForm')}}",
            data:contactFormData,
            processData:false,
            contentType:false,
            success:function(response){
            },
            error:function(error){
                var formErr = error.responseJSON.errors;
                console.log(error);
                for(var err in formErr){
                    $('.'+ err +'_err').html(formErr[err][0]);
                }
            }
        })
    }
</script>

</html>
