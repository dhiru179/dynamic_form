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
    <title>Hello, world!</title>
</head>

<body>
    <div class="container d-flex">
        <form class="row col-6">
            @foreach ($result as $item)
                @php
                    
                    $pos = strpos($item->type, ' ');
                    // echo !empty($pos)."-".$pos."<br>";
                    
                    if (!empty($pos)) {
                        $exp = explode(' ', $item->type);
                        $tagName = $exp[0];
                        $tagType = $exp[1];
                    } else {
                        $tagName = $item->type;
                    }
                    
                @endphp
                @if ($tagName == 'input')
                    <div class="mb-3 dynamic">
                        <label for="form_input{{ $item->id }}">{{ $item->label }}</label>
                        <input type="{{ $tagType }}" class="" id="form_input{{ $item->id }}">
                        <div class="d-flex justify-content-end">
                            <label for="">
                                <span class="mx-1">select</span>
                                <input type="checkbox" class="form-input-checkbox selectCheck mx-1"
                                    value="{{ $item->id }}">
                            </label>
                            <span
                                onclick="editField('{{ json_encode([
                                    'id' => $item->id,
                                    'label' => $item->label,
                                    'name' => $item->name,
                                    'is_need' => $item->is_need,
                                    'option' => false,
                                ]) }}')"
                                class="text-success mx-3" style="cursor: pointer;">Edit</span>
                            <span onclick="deleteField(id={{ $item->id }})" class="text-danger mx-3"
                                style="cursor: pointer;">Delete</span>
                        </div>
                    </div>
                @elseif($tagName == 'dropdown')
                    <div class="mb-3 dynamic">
                        <label for="form_input">{{ $item->id }}</label>

                        <select name="" id="form_input">{{ $item->id }}>
                            <option value="">--</option>

                            @if (count(json_decode($item->option)) > 0)
                                @foreach (json_decode($item->option) as $value)
                                    <option value='{{ $value }}'>{{ $value }}</option>
                                @endforeach
                            @endif

                        </select>
                        <div class="d-flex justify-content-end">
                            <label for="">
                                <span class="mx-1">select</span>
                                <input type="checkbox" class="form-input-checkbox selectCheck mx-1"
                                    value="{{ $item->id }}">
                            </label>
                            <span
                                onclick="editField('{{ json_encode([
                                    'id' => $item->id,
                                    'label' => $item->label,
                                    'name' => $item->name,
                                    'is_need' => $item->is_need,
                                    'option' => json_decode($item->option),
                                ]) }}')"
                                class="text-success mx-3" style="cursor: pointer;">Edit</span>
                            <span onclick="deleteField(id={{ $item->id }})" class="text-danger mx-3"
                                style="cursor: pointer;">Delete</span>
                        </div>
                    </div>
                @elseif($tagName == 'textarea')
                    <div class="mb-3 dynamic">
                        <label for="form_input">{{ $item->id }}</label>
                        <textarea name="" id="form_input{{ $item->id }}" cols="3" rows="2"></textarea>
                        <div class="d-flex justify-content-end">
                            <label for="">
                                <span class="mx-1">select</span>
                                <input type="checkbox" class="form-input-checkbox selectCheck mx-1"
                                    value="{{ $item->id }}">
                            </label>
                            <span
                                onclick="editField('{{ json_encode([
                                    'id' => $item->id,
                                    'label' => $item->label,
                                    'name' => $item->name,
                                    'is_need' => $item->is_need,
                                    'option' => false,
                                ]) }}')"
                                class="text-success mx-3" style="cursor: pointer;">Edit</span>
                            <span onclick="deleteField(id={{ $item->id }})" class="text-danger mx-3"
                                style="cursor: pointer">Delete</span>
                        </div>
                    </div>
                @endif
            @endforeach
        </form>
        <div class="col-4 offset-1">
            <h3 class="mb-3 text-center">Grouping</h3>
            <div class="mb-3">
                <select class="form-select form-select-sm mx-1" name="" id="category">
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select form-select-sm mx-1" name="" id="sub_category">
                    {{-- <option value="">SubCategories</option> --}}
                </select>
            </div>
            <div class="mb-3">
                <input type="button" class="btn btn-info btn-sm" value="grouping" onclick="groupBy()">
            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content col-8 offset-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="" id="edit_field">
                        <div class="mb-3">
                            <input type="hidden" value="" id="field_id">
                            <input type="text" class="form-control" id="label" placeholder="Enter Label">
                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="nameAttr" placeholder="Enter Name">
                        </div>
                        <div class="mb-3 d-flex d-none" id="addt_field">

                            <div class="dropdown col-6 ">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Add Option
                                </button>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1" id="dropdown1">

                                </ul>
                            </div>
                            <div class="col-6 ">
                                <div class="d-flex mb-1">
                                    <input type="text" class="form-control form-control-sm mx-1"
                                        id="option_value">
                                    <input type="button" class="btn btn-sm btn-primary mx-1" onclick="addOption()"
                                        value="Add Option" />
                                    {{-- <input type="button" class="btn btn-sm btn-danger mx-1" id="remove_option" value="-" /> --}}
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="">
                                <span class="mx-2">Is Need : </span>
                                <input type="checkbox" class="form-input-checkbox" id="star">
                            </label>
                        </div>
                    </form>
                    <div class="d-flex ">
                        <span class="">Assign</span>
                        <select class="form-select form-select-sm mx-1" name="" id="">


                        </select>
                        <select class="form-select form-select-sm mx-1" name="" id="">

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_form">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script>
        let option = {};
        let objForm = {
            changeDynamicForm: (class_name, add_class) => {

            },

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
                            alert(response.msg);
                            if(response.slug=='getSubCategory')
                            {
                                objForm.getSubCategory(response.data);
                            }
                            // window.location.reload();
                        }
                        console.log(response);

                    },
                    error: (err) => console.log(err),
                });
            },
            getSubCategory:(res)=>{
                let html = "";
                $('#sub_category').html('');
                res.forEach((elem,index)=>{
                    html += `<option value="${elem.id}">${elem.sub_category_name}</option>`;
                })
                $('#sub_category').append(html);
            }
        }
        $(".dynamic").each(function(e, elem) {
            // elem.children[0]//label
            // elem.children[1]//input,select,textarea
            let label = elem.children[0];
            let field = elem.children[1]
            if (field.tagName === "INPUT") {
                if (field.getAttribute("type") === "checkbox") {
                    label.classList.add("form-check-label");
                    field.classList.add("form-check-input");
                } else {
                    label.classList.add("form-label");
                    field.classList.add("form-control");
                }
            } else if (field.tagName === "SELECT") {
                label.classList.add("form-label");
                field.classList.add("form-select");
            } else if (field.tagName === "TEXTAREA") {
                label.classList.add("form-label");
                field.classList.add("form-control");
            }

        });

        function editField(obj) {

            let data = JSON.parse(obj);
            $('#addt_field').addClass('d-none');
            if (data.option) {
                console.log("a");
                $('dropdown1').html("");
                $('#addt_field').removeClass('d-none');
                let html = ""
                data.option.forEach((element, index) => {
                    option[index] = element;
                    html += `  <li class="dropdown-item d-flex justify-content-between align-items-center">
                                 <span>${element}</span>
                                 <span class="btn btn-sm btn-danger" onclick="removeOption(event,${index})">x</span>
                             </li>`

                });
                $('#dropdown1').append(html);

            }

            $('#field_id').val(data.id);
            $('#label').val(data.label);
            $('#nameAttr').val(data.name);
            $('#star').prop('checked', data.is_need == 'true' ? true : false);
            $('#exampleModal').modal('show');

            // console.log("edit", id, label, name);
        }

        function deleteField(field_id) {
            const url = "{{ url('/destroy_form') }}";
            const data = {
                id: field_id,
            }
            objForm.post(url, data)

        }

        $('#save_form').click((e) => {

            const url = "{{ url('/update_form') }}";
            let arrOption = [];
            Object.entries(option).forEach((entries) => {
                const [index, elem] = entries;
                arrOption.push(elem);
            });
            console.log(arrOption)
            const data = {
                id: $('#field_id').val(),
                label: $('#label').val(),
                name: $('#nameAttr').val(),
                is_need: $('#star')[0].checked,
                option: arrOption,
            }

            objForm.post(url, data);

            console.log(data);

        })

        function removeOption(event, index) {
            $(event.target.parentNode).remove();
            delete option[index];
            return false;
        }

        function addOption() {
            let count = (Object.keys(option).length) + 1;
            let val = $('#option_value').val();
            option[count] = val;
            let html = `  <li class="dropdown-item d-flex justify-content-between align-items-center">
                                 <span>${val}</span>
                                 <span class="btn btn-sm btn-danger" onclick="removeOption(event,${count})">x</span>
                             </li>`
            $('#dropdown1').append(html);
            $('#option_value').val("");

        }

        function groupBy() {
            let id = [];
            $('.selectCheck').each((index, elem) => {

                if (elem.checked === true) {
                    id.push(elem.value);
                }
            })
            const data = {
                field_id: id,
                category_id: $('#category').val(),
                sub_cate_id: $('#sub_category').val(),
                slug: "AssignTo",
            }
            const url = "{{ url('/assign_to') }}";
            objForm.post(url, data);
            console.log(data);
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
    </script>

</body>

</html>
