<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>Show Form</title>
</head>

<body>
    <div class="container">
        <form class="mt-3" method="GET" action="{{ url("/$cat_slug/$sub_cat_slug") }}">
            @csrf
            <div class="d-flex">
                <input type="search" class="form-control" name="searchText" placeholder="search...">
                <select name="" id="category" name="category" class="form-select mx-1">
                    <option value="">Category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
                <select name="" id="sub_category" name="sub_category" class="form-select mx-1">

                </select>
                <input type="submit" value="seacrh" id="seacrh" class="btn btn-dark mx-1">
            </div>
            <div class="d-flex justify-content-center mt-1">
                <div class="mb-3">
                    <input type="number" name="min" min="0" step="1" class="form-control" placeholder="min">
                    
                </div>
                <div class="mb-3">
                    <input type="number" name="max" min="" class="form-control" placeholder="max">
                    
                </div>
                @foreach ($inputOptions as $item)
                    @php
                        
                        $pos = strpos($item->type, ' ');
                        
                        if (!empty($pos)) {
                            $exp = explode(' ', $item->type);
                            $tagName = $exp[0];
                            $tagType = $exp[1];
                        } else {
                            $tagName = $item->type;
                        }
                        
                    @endphp
                    @if ($tagName == 'input')
                        {{-- <div class="mb-3 dynamic">
                    
                    <label
                        for="form_input{{ $item->id }}">{{ $item->label }}</label>
                    <input type="{{ $tagType }}" class=""
                        id="form_input{{ $item->id }}">
                 
                </div> --}}
                    @elseif($tagName == 'dropdown')
                        <div class="mb-3">
                            <select class="form-control" name="{{ $item->name }}" id="form_input{{ $item->id }}">
                                <option class="text-muted" value="">{{ ucwords($item->label) }}</option>

                                @if (count(json_decode($item->option)) > 0)
                                    @foreach (json_decode($item->option) as $value)
                                        <option value='{{ $value }}'>
                                            {{ $value }}</option>
                                    @endforeach
                                @endif

                            </select>

                        </div>
                    @elseif($tagName == 'textarea')
                    @endif
                @endforeach
            </div>
        </form>

        <div class="mt-3">
            <div class="col-8 offset-2">
                @foreach ($result as $item)
                    <div class="card mb-3" style="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <span class="text-info">{{ $item->posted_by }}</span>
                                <span class="text-danger">{{ $item->no_of_rooms }}</span>
                                <span class="text-dark">{{ $item->parking }}</span>
                                <span class="text-primary">{{ $item->property_type }}</span>
                                <span class="text-success">{{ $item->area }}</span>

                            </h6>
                            <p class="card-text">{{ $item->address }}</p>
                            <a href="#" class="card-link">read...</a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        let objForm = {
            post: (url, data) => {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    url: url,
                    data: data,
                    //  contentType: 'application/json',
                    success: function(response) {

                        if (response.status) {
                            // alert(response.msg);
                            if (response.slug == 'getSubCategory') {
                                objForm.getSubCategory(response.data);
                            }
                            // window.location.reload();
                        }
                        console.log(response);

                    },
                    error: (err) => console.log(err),
                });
            },
            getSubCategory: (res) => {
                let html = "";
                $('#sub_category').html('');
                res.forEach((elem, index) => {
                    html += `<option value="${elem.id}">${elem.sub_category_name}</option>`;
                })
                $('#sub_category').append(html);
            }
        }
        $('#category').change((e) => {
            const url = "{{ url('/get_sub_category') }}";
            const data = {
                category_id: e.target.value,
                slug: "getSubCategory",
            }
            console.log(data);
            objForm.post(url, data);

        })

        $('#seacrh').click((e) => {



        })
    </script>



</body>

</html>
