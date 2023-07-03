@extends('universal.layout')
@section('title', 'form')
{{-- @section('dash', 'active') --}}
@section('layout')

    <div class="container">
        <div class="mt-3 col-12 row">
            <div class="col-3">
                <div id="clasified">
                    <div class="mb-3">
                        <select class="form-select" onchange="category(this)" level="1" id="category">
                            <option class="text-muted" value="">category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" id="get_form">get form</button>
                </div>
            </div>
            <div class="col-6 offset-2">
                <form class="" id="formTable">

                </form>
                <div class="d-flex">

                    <button class="btn btn-info mx-3 d-none" id="save">save</button>
                </div>


            </div>
        </div>
    </div>

    <script>
        let count = 1;
        let optionCount = 0;
        let arr = {};
        let currentId = null;
        let validate = {
            required: function(e) {
                typeof e == 'string' ? id = e : id = e.target.id;
                let inputField = $('#' + id);
                $('#' + id).next().remove();

                if ($.trim(inputField.val()) == '') {
                    $('#' + id).after(`<span class="text-danger">This field is required</span>`)
                    validate.is_validate = true;
                }
                return validate.is_validate;
            },
            email: function(e) {
                typeof e == 'string' ? id = e : id = e.target.id;
                let emailPattern = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                let inputField = $('#' + id);
                $('#' + id).next().remove();

                if ($.trim(inputField.val()) == '') {
                    validate.required(id);

                } else {
                    if (!emailPattern.test(inputField.val())) {
                        validate.is_validate = true;
                        $('#' + id).after(`<span class="text-danger">Enter Valid Email address</span>`)
                    } else {
                        validate.is_validate = false;
                        // $('#admin_email_msg').html('');
                    }
                }
            }

        };
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
                    success: function(res) {
                        console.log(res);

                        if (res.status) {
                            // alert(response.msg);
                            if (res.slug == 'getSubCategory') {
                                objForm.getSubCategory(res.data, data.level);
                            } else if (res.slug == "getForm") {
                                objForm.getForm(res.data, res.options);
                            } else if (res.slug == "storeFormData") {
                                alert(res.msg);
                            }
                            // window.location.reload();
                        }

                    },
                    error: (err) => console.log(err),
                });
            },
            getSubCategory: (res, level) => {
                let option = `<option value="">--</option>`;
                // level
                $('#clasified [level]').each(function() {
                    if (parseInt($(this).attr('level')) > level) {
                        $(this).parent().remove();
                    }
                })
                if (res.length > 0) {
                    res.forEach((elem, index) => {
                        option += `<option value="${elem.id}">${elem.name}</option>`;
                    })
                    const html = `<div class="mb-3">
                     <select class="form-select" onchange="category(this)" level="${++level}" id="sub_category">
                        ${option}
                     </select>
                </div>`;
                    $('#clasified').append(html);
                }

            },
            getForm: (data, options) => {
                let formHtml = "";
                validate.star = [];
                validate.type = [];
                $('#formTable').html("");
                if (data.length > 0) {

                    data.forEach((elem, index) => {
                        let tag = String(elem.type).split(' ');
                        let tagType = tag[0];
                        let type = tag[1] || "";
                        let star = "";
                        validate.type.push(type);
                        if (elem.is_need == 'true') {
                            validate.star.push(elem.name);
                            star = `<span class="text-danger">*</span>`;
                        }
                        // console.log(type, tag)
                        if (tagType == 'input') {

                            if (type == "radio" || type == "checkbox") {
                                let option = "";
                                let name = "";
                                let a = 0;
                                let singleCheck = {};
                                console.log(options.length)

                                options.forEach((e, i) => {
                                    if (elem.id === e.tmp_tbl_form_field_id) {
                                        if (type == "checkbox") {
                                            name = elem.name + `[${elem.id}][${e.id}][]`;
                                        } else if (type == "radio") {
                                            name = elem.name + `[${elem.id}]`;
                                        }
                                        singleCheck.check = e;
                                        option += `<div class="form-check form-check-inline">
                                            
                                                    <input class="form-check-input" name="${name}" type="${type}" id="inlineCheckbox${i}" value="${e.option.trim()}">
                                                    <label class="form-check-label" for="inlineCheckbox${i}">${e.option}</label>
                                              </div>`
                                        a++;
                                    }

                                })
                                // console.log(singleCheck,a)
                                if (type == "checkbox" && a < 2) {
                                    // console.log(singleCheck)
                                    option = `<div class="form-check form-check-inline">
                                            
                                            <input class="form-check-input singleCheckField" name="${elem.name + `[${elem.id}]`}" type="${type}"  id="inlineCheckbox${index}" value="${singleCheck.check.option}">
                                            <label class="form-check-label" for="inlineCheckbox${index}">${singleCheck.check.option}</label>
                                      </div>`
                                }

                                formHtml += `<div class="mb-3">
                                          <label for="" class="form-label mx-2">${elem.label+star}:</label>
                                          ${option}
                                        </div>`;

                            } else {
                                formHtml += `<div class="mb-3">
                                                <label for="" class="form-label">${elem.label+star}</label>
                                                <input type="${type}" id="${elem.name}" name="${elem.name+`[${elem.id}]`}"  class="form-control" value="" >
                                            </div>`;
                            }

                        } else if (tagType == 'dropdown') {
                            let option = `<option class="text-muted" value="">--</option>`;

                            options.forEach((e, i) => {
                                if (elem.id === e.tmp_tbl_form_field_id) {
                                    option +=
                                        `<option value="${e.option.trim()}">${e.option}</option>`;
                                }
                            })

                            formHtml += `<div class="mb-3">
                               
                                        <label for=""  class="form-label">${elem.label+star}</label>
                                        <select  name="${elem.name+`[${elem.id}]`}" id="${elem.name}" class="form-select">
                                            ${option}
                                         </select>   
                                     </div>`;
                        } else if (tagType == "textarea") {
                            formHtml += `<div class="mb-3">
                             
                                        <label for="" class="form-label">${elem.label+star}</label>
                                        <textarea name="${elem.name+`[${elem.id}]`}" id="${elem.name}" cols="3" rows="2" class="form-control"></textarea>
                                    </div>`;
                        }

                    });

                }
                $('#formTable').append(formHtml);

            }
        }

        function category(elem) {

            let level = parseInt($(elem).attr('level'))
            currentId = elem.value;
            const url = "{{ url('/get_sub_category') }}";
            const data = {
                category_id: elem.value,
                slug: "getSubCategory",
                level: level,
            }
            // console.log(data);
            objForm.post(url, data);
        }




        $('#save').click((e) => {

            validate.is_validate = false; //set false default

            Object.entries(validate.star).forEach(([key, value]) => {
                // console.log(value,validate.is_validate);  
                //check box and radio handle later
                validate.required(value);
            });
            // Object.entries(validate.type).forEach(([key, value]) => {
            //     if(value=="email")
            //     {
            //         validate.email(value);
            //     }
            // });


            console.log(validate.is_validate);
            //  if validate condition not pass return true

            if (validate.is_validate === false) {
                const url = "{{ url('/store_form_data') }}";
                let formData = $('#formTable').serializeArray();
                $('.singleCheckField').each((i, elem) => {
                    formData.push({
                        name: $(elem).attr('name'),
                        value: $(elem).is(':checked') === true ? $(elem).val() : false,
                    })
                    // $(elem).is(':checked');
                    // console.log($(elem).is(':checked'),$(elem).attr('name'));
                })
                formData.push({
                    name: "slug",
                    value: "storeFormData"
                }, {
                    name: "cat_id",
                    value: currentId,
                });
                console.log(formData);
                objForm.post(url, formData)
            }

        })

        $('#get_form').click((e) => {
            e.preventDefault;
            $('#save').removeClass('d-none');
            const url = "{{ url('/get_form') }}";
            const data = {
                cat_id: currentId,
                slug: 'getForm',
            }
            objForm.post(url, data)
            console.log(currentId);

        })
    </script>

@endsection
