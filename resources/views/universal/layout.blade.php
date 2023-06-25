<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="{{asset('/bootstrap/bootstrap.min.css')}}">
   
    <script src="{{asset('/bootstrap/jquery.min.js')}}"></script> --}}
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            {{-- <h3>Adhoards</h3> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-2" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="{{ url('category') }}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="{{ url('/custom_form') }}">Create Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="{{ url('/modify_custom_form') }}">Modify Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="{{ url('/form') }}">form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="{{ url('/list_form_data') }}">list data</a>
                    </li>
                </ul>

            

            </div>
        </div>
    </nav>
    @section('layout')

    @show
    {{-- <script src="{{asset('/bootstrap/bootstrap.bundle.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</body>
</html>
