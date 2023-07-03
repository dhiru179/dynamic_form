@extends('job_portal.front.layout.layout')
@section('title', 'employer login')
{{-- @section('dash', 'active') --}}
@section('layout')

    <div class="container col-4 offset-4">
        <form class="row mt-5" id="form">
            <h3 class="text-center">Employer login</h3>
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
                    <div class="mb-3">
                        <label for="form_input{{ $item->id }}">{{ $item->label }}</label>
                        <input type="{{ $tagType }}" name="{{ $item->name }}" class="form-control"
                            id="form_input{{ $item->id }}">

                    </div>
                @elseif($tagName == 'dropdown')
                    <div class="mb-3 dynamic">
                        <label for="form_input">{{ $item->label }}</label>

                        <select name="{{ $item->name }}" class="form-select" id="form_input">{{ $item->id }}>
                            <option value="">--</option>

                            @if (count(json_decode($item->option)) > 0)
                                @foreach (json_decode($item->option) as $value)
                                    <option value='{{ $value }}'>{{ $value }}</option>
                                @endforeach
                            @endif

                        </select>

                    </div>
                @elseif($tagName == 'textarea')
                    <div class="mb-3 dynamic">
                        <label for="form_input">{{ $item->id }}</label>
                        <textarea name="{{ $item->name }}" class="form-select" id="form_input{{ $item->id }}" cols="3"
                            rows="2"></textarea>

                    </div>
                @endif
            @endforeach
            <div class="mb-3">
                <input type="button" class="btn btn-success" value="sign up">
            </div>
        </form>
    </div>

@endsection
