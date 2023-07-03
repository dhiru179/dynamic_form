@extends('job_portal.admin.layout.layout')
@section('title', 'Custom Form')
{{-- @section('dash', 'active') --}}
@section('layout')

    <div class="container">

        <div class="mt-3 col-12 row">
            <div class="col-3" id="clasified">
                <div class="mb-3">

                    <label for="">Form Title</label>
                    <input type="text" class="form-control" id="form_title" name="form_title">
                </div>
            </div>
            <div class="col-9">
                <form id="formTable">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th width="50" scope="col">#</th>
                                <th width="200" scope="col">type</th>
                                <th width="200" scope="col">label</th>
                                <th width="300" scope="col">name</th>
                                <th width="80" scope="col">mandetory</th>
                                <th width="80">Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td scope="row">1</td>
                                <td class="text-center">
                                    <select class="form-select form-select-sm" id="tag1" name="tagType[]"
                                        onchange="tagType(this,1)">
                                        <option selected value="">--</option>
                                        @foreach ($type as $item)
                                            <option value="{{ $item->id }}">{{ $item->type }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center">
                                    <input type="text" class="form-control form-control-sm"
                                        onkeyup="modifyLabel(event,this,1)" name="label[]" id="label1">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" name="attr[]"
                                        id="attr1">
                                    <div id="multi_option1"></div>
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                        <input type="checkbox" class="form-check-input" name="star[]" id="star1">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                        <input type="checkbox" class="form-check-input" name="active[]" id="active"
                                            checked>
                                    </div>
                                </td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </form>
                <div class="d-flex">
                    <button class="btn btn-success mx-3" onclick="addRow()">Add</button>
                    <button class="btn btn-info mx-3" id="save">save</button>
                </div>


            </div>
        </div>
    </div>
    <script>
        let count = 1;
        let optionCount = 0;
        let input = "";
        let currentId = "";
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

            formHtml: (slug, count) => {
                if (slug === 'tr') {
                    return `<tr id="tr${count}">
                            <td scope="row">${count}</td>
                            <td>
                                <select class="form-select form-select-sm" name="tagType[]" id="tag${count}" onchange="tagType(this,${count})">
                                    <option selected value="">--</option>
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" name="label[]" onkeyup="modifyLabel(event,this,${count})" id="label${count}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" name="attr[]"  id="attr${count}">
                                <div id="multi_option${count}"></div>
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                        <input type="checkbox" class="form-check-input" name="star[]"  id="star${count}" >
                                        </div>
                                        </td>
                                        <td>
                                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                        <input type="checkbox" class="form-check-input" name="active[]" id="active" checked>
                                    </div>
                                </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" onclick=removeRow(${count})>x</button>
                                            </td>
                                            
                                            </tr>`;
                } else if (slug === 'multiOption') {
                    return `  <div class="dropdown mt-2">
                                     <div class="input-group mb-1">
                                            <input type="text" class="form-control form-control-sm" id="option_value${count}" />
                                            <input type="button" class="btn btn-sm btn-dark" value="Add" onclick="addOption(${count})"/>
                                    </div>               
                                            <div id="dropdown${count}" class="d-flex"></div>
                                           
                                 </div>`;

                } else {
                    return false;
                }

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
                    success: function(res) {
                        console.log(res);

                        if (res.status) {
                            // alert(response.msg);
                            if (res.slug == "formData") {
                                alert(res.msg);
                                window.location.reload();
                            }

                        }

                    },
                    error: (err) => console.log(err),
                });
            },

        }

        function addRow() {
            input = "";
            validate.is_validate = false; //set false default
            validate.required('tag' + count);
            // validate.required('label' + count);
            // validate.required('attr' + count);
            if (validate.is_validate === false) {
                count++;
                $('#tbody').append(objForm.formHtml('tr', count));
            }


        }

        function removeRow(id) {
            $('#tr' + id).remove();

        }



        function tagType(elem, currentCount) {
            const tag = (elem.options[elem.selectedIndex].text).trim().split(' ');
            const tagName = tag[0];
            const tagType = typeof(tag[1]) != "undefined" ? tag[1] : '';

            $('#multi_option' + currentCount).html('');
            if (tagName == 'dropdown' || tagType == 'radio' || tagType == "checkbox") {

                $('#multi_option' + currentCount).append(objForm.formHtml('multiOption', currentCount));
            }
        };


        function modifyLabel(event, elem, count) {

            // switch (event.key) {
            //     case "Enter":
            //         break;
            //         case "Shift":
            //         break;

            //     case "Backspace":
            //         input = input.slice(0, -1);
            //         break;
            //     case " ":
            //         input = input.trim() + "_";
            //         break;
            //     default:
            //         input += event.key;
            //         break;
            // }
            if (event.keyCode === 32) {
                input = input.trim() + "_";
            } else if (event.keyCode >= 48 && event.keyCode <= 90) {
                input += event.key;
            } else if (event.keyCode >= 96 && event.keyCode <= 106) {
                input += event.key;
            } else if (event.keyCode === 8) {
                input = input.slice(0, -1);
            } else if (event.keyCode === 189) {
                input += event.key;
            }

            $('#attr' + count).val(input.toLowerCase());
            // console.log(event.key,event.keyCode)

            return false;
        }



        function addOption(count) {

            const value = $('#option_value' + count).val();

            if (value.length > 0) {

                let html = ` <h6 class="border border-1 p-1" onmouseleave="$(this.children[2]).addClass('d-none'),$(this.children[0]).removeClass('text-danger')" onmouseover="$(this.children[2]).removeClass('d-none'),$(this.children[0]).addClass('text-danger')" class="m-1">
                    <span class="optionValue" ondblclick="$(this).attr('contenteditable',true)">${value}</span>
                    <span>,</span>
                    <span onclick="removeOption(this)" class="badge bg-danger bi bi-trash-fill d-none" style="cursor:pointer">&nbsp;</span></h6>
                         `;
                $('#dropdown' + count).append(html);

                $('#option_value' + count).val("");
                optionCount++;
            }


        }

        const removeOption = (elem) => {
            $(elem.parentNode).remove();

            return false;
        }

        function changeOptionField(event, elem) {

            if (event.key == "Enter") {
                $(elem).attr('readonly', true);

                $('#dropdown' + count).removeClass('show');
                //    console.log(event);
            }
            return false;
        }


        $('#save').click((e) => {

            const url = "{{ route('admin.store-field-info') }}";
            let formData = [];
            validate.is_validate = false; //set false default
            function validation(tr) {
                validate.required('form_title');
                let tdArr = $(tr).find('td')
                let orderby = parseInt($(tdArr[0]).text().trim());
                validate.required('tag' + orderby);
                // validate.required('label' + orderby);
                // validate.required('attr' + orderby);
                return validate.is_validate;
            }

            $('#tbody tr').each((i, tr) => {
                if (validation(tr) === true) return;
                let tdArr = $(tr).find('td')
                let orderby = parseInt($(tdArr[0]).text().trim());
                let tagId = $(tr).find('select').val();
                let field_type = $(tr).find(`select option[value=${tagId}]`).text();
                let label_name = $(tdArr[2]).find('input').val();
                let is_need = $(tdArr[4]).find('input').is(':checked');
                let is_active = $(tdArr[5]).find('input').is(':checked');
                let newData = {

                    "tag_id": parseInt(tagId),
                    "tag_label": label_name,
                    "is_need": is_need,
                    "is_active": is_active,
                    "orderby": orderby
                }
                // console.log(field_type)
                if (field_type == 'dropdown' || field_type == 'input checkbox' || field_type ==
                    "input radio") {
                    // console.log('hit')
                    newData.options = [];
                    $(tdArr[3]).find('.optionValue').each((i, li) => {
                        // $(li).find('input').val()
                        newData.options.push({

                            data: $(li).text().trim(),
                        })
                        newData.tag_name = $('#attr' + orderby).val();
                        // console.log($(tdArr[3]).find('ul').closest('input[type=text]'));
                    })
                } else {
                    newData.tag_name = $(tdArr[3]).find('input').val()
                }

                formData.push(newData);

            })

            let data = {
                slug: "formData",
                form_field: formData,
                form_title: $('#form_title').val(),

            }

            console.log(data);
            objForm.post(url, data)
        })
    </script>
@endsection
