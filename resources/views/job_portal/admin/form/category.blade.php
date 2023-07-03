@extends('job_portal.admin.layout.layout')
@section('title', 'category')
{{-- @section('dash', 'active') --}}
@section('layout')

    <div class="container">
        <div class="mt-3 col-12 row">
            <div class="col-3" id="clasified">
                <div class="mb-3">
                    {{-- <select class="form-select" onchange="category(this)" level="1" id="category">
                        <option class="text-muted" value="">Form Name</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select> --}}
                    <label for="">Form Title</label>
                    <input type="text" class="form-control" name="form_title">
                </div>
            </div>
            <div class="col-9">
                <form id="formTable">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">category</th>
                                <th scope="col">slug</th>
                                <th scope="col">icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <th scope="row">1</th>
                                <td class="text-center">
                                    <input type="text" class="form-control" name="category[]">
                                </td>
                                <td class="text-center">
                                    <input type="text" class="form-control" name="slugs[]">
                                </td>
                                <td></td>
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
        let arr = {};
        let currentId = null;
        let objForm = {
            insertFieldDetails: () => {
                let field_details = {
                    //  tag_type_id: formData.tag_id,
                    //  tag_label: formData.label_value,
                    //  tag_name: formData.attr_name,
                    //  is_need: formData.checked,
                    //  option: formData.option,

                }
                //  arr.push(field_details);
                arr[count] = field_details;
                console.log(count);
            },
            formHtml: (slug, count) => {
                if (slug === 'tr') {
                    return `<tr id="tr${count}">
                <th scope="row">${count}</th>
             
                <td>
                    <input type="text" class="form-control" name="category[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="slugs[]">
                </td>
                <td></td>

               
                <td>
                    <button class="btn btn-sm btn-danger" onclick=removeRow(${count})>x</button>
                </td>

            </tr>`;
                }

                return false;

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
                        console.log(response);

                        if (response.status) {
                            // alert(response.msg);
                            if (response.slug == 'getSubCategory') {
                                objForm.getSubCategory(response.data, data.level);
                            }
                            else if(response.slug=="category")
                            {
                                alert(response.msg);
                                window.location.reload();
                            }
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
        }

        function addRow() {
            count++;
            $('#tbody').append(objForm.formHtml('tr', count));
        }

        function removeRow(id) {
            $('#tr' + id).remove();
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
            const url = "{{ url('/store_category') }}";
            // let currentId = $('#category').val();
            let formData = $('#formTable').serializeArray();

            formData.push({
                name: "slug",
                value: "category"
            }, {
                name: 'parent_id',
                value: currentId,
            });

            // console.log(currentId);
            objForm.post(url, formData)
        })
    </script>

@endsection
