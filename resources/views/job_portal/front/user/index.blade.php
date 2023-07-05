@extends('job_portal.front.layout.layout')
@section('title', 'Job Portal')
{{-- @section('dash', 'active') --}}
@section('layout')

    <div class="container">

        <div class="my-3 d-flex col-8 offset-2">
            <input type="search" class="form-control me-1" name="" id="">
            <input type="button" class="btn btn-success" value="Seacrh">
        </div>
        <div class="d-flex">
            <div class="col-3">
                filter
            </div>
            <div class="mb-3 col-6">
                <div class="mb-3">
                    {{-- @foreach ($result as $key=> $item)
                    @php
                        $item = json_decode($item->json_data);

                    @endphp
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{implode(',')}}}</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    @endforeach --}}
                  
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-3">

            </div>
        </div>

    </div>

@endsection
