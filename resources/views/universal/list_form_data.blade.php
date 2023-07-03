@extends('universal.layout')
@section('title', 'list')
{{-- @section('dash', 'active') --}}
@section('layout')

    <div class="container">
        <form onsubmit="return showList(event,this)" method="get" class="my-3">
            @csrf
            <div class="mb-3 d-flex">
                <div class="d-flex" id="clasified">
                    <div class="me-3">
                        <select class="form-select" onchange="category(this)" level="1">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="search" class="form-control w-50" name="search_keys" placeholder="search...">
            </div>
            <div class="mb-3 d-flex row">
                {{-- @if (count($result) > 0) --}}

                @foreach ($th as $item)
                    @php
                        $flag = false;
                        $exp = explode(' ', $item->type);
                        $tagName = $exp[0];
                        $tagType = isset($exp[1]) == true ? $exp[1] : '';
                        if ($tagType == 'radio' || $tagType == 'checkbox') {
                            // $flag = true;
                        }
                        if ($tagName == 'dropdown') {
                            $flag = true;
                        }
                    @endphp

                    @if ($flag === true)
                        <div class="col-xs-12 me-1 col-md-3 mb-3">
                            <select class="form-select" name="{{ $item->name }}[]" id="form_input{{ $item->id }}">
                                <option value="">{{ $item->label }}</option>
                                @foreach ($options as $option)
                                    @if ($item->id === $option->tmp_tbl_form_field_id)
                                        <option value="{{ $option->option }}">{{ $option->option }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endif
                @endforeach
                {{-- @endif --}}
                <div class="col-xs-12 me-1 col-md-3 mb-3">
                    <input type="submit" class="btn btn-sm btn-success" value="show list">
                </div>
            </div>
        </form>
        @if (count($result) > 0)
            <table class="table border table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        @foreach ($th as $key => $item)
                            <th scope="col">{{ $item->label }}</th>
                        @endforeach

                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $count = 0;
                        $num = 1;
                        for ($i = 0; $i < count($result); $i++) {
                            if ($count === 0) {
                                echo '<tr>';
                                echo "<td scope='col'>$num</td>";
                            }
                            echo "<td scope='col'>" . $result[$i]->input_data . '</td>';
                        
                            $count++;
                            if (count($th) === $count) {
                                echo '</tr>';
                                $count = 0;
                                $num++;
                            }
                        }
                    @endphp --}}
                    {{-- @foreach ($result as $key => $input)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            @foreach ($th as $item)
                                @php
                                    
                                    $n = $item->name;
                                @endphp
                                <td>{{ $input->$n }}</td>
                            @endforeach

                        </tr>
                    @endforeach --}}
                    @foreach ($result as $key => $input)
                        @php
                            $json = json_decode($input->json_data);
                            echo '<tr>';
                            echo "<td>".($key+1)."</td>";
                            foreach ($th as $item) {
                                $n = $item->name;
                                $data = $json->$n;
                                if (is_array($data)) {
                                    $conct = implode(',', $data);
                                    echo "<td>$conct</td>";
                                } else {
                                    echo "<td>$data</td>";
                                }
                            }
                            
                            echo '</tr>';
                        @endphp
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="mt-3">
                <h3 class="text-center">not data</h3>
            </div>
        @endif

    </div>
    <script>
        function showList(e, form) {
            // e.preventDefault();

            $(form).attr('action', `{{ url('/list_form_data/${currentId}') }}`);
            console.log(currentId);
        }
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
                            } else if (res.slug == "formUpdate") {
                                alert(res.msg);
                                // window.location.reload();
                            } else if (res.slug == 'showForm') {
                                objForm.showForm(res.data, res.options);
                            } else if (res.slug == 'deleteRow') {
                                alert(res.msg);
                            } else if (res.slug == 'deleteOption') {
                                alert(res.msg);
                            }

                        }

                    },
                    error: (err) => console.log(err),
                });
            },
            getSubCategory: (res, level) => {
                if (res.length > 0) {
                    let option = `<option value="">--</option>`;
                    res.forEach((elem, index) => {
                        option += `<option value="${elem.id}">${elem.name}</option>`;
                    })
                    const html = `<div class="me-3">
                            <select class="form-select" onchange="category(this)" level="${++level}">
                                ${option}
                                </select>
                                </div>`;
                    $('#clasified').append(html);
                }
            },
        }

        function category(elem) {
            currentId = elem.value;
            let level = parseInt($(elem).attr('level'))
            $('#clasified [level]').each((i, e) => {
                if (parseInt($(e).attr('level')) > level) {
                    $(e).parent().remove();
                }

            })
            const url = "{{ url('/get_sub_category') }}";
            const data = {
                category_id: elem.value,
                slug: "getSubCategory",
                level: level,
            }
            // console.log(level);
            objForm.post(url, data);
        }
    </script>
@endsection
