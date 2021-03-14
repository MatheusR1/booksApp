@extends('layouts.base')

@section('main')

    <div class="container mt-5">
        <div class="row">
            <div class="container ">
                <div class="d-flex justify-content-center text-white ">
                    <img id=logo src="{{ asset('img/bookLogo.png') }}" alt="">
                </div>

            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <form action="{{ route('book.search') }}" method="post">
                        @csrf

                        <div class="input-group ">
                            <input type="text" name="filter" class="form-control" placeholder="pesquise seu livro"
                                aria-label="Example text with button addon" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary ml-1" type="submit" id="button-addon2"><img
                                    src="{{ asset('img/search.svg') }}" alt=""></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    @if (isset($querys))
        <hr>
        <div class="container" ">
            <div class="row">
                <div class=" col-sm-12 d-flex justify-content-center mt-3">
                    
                    <ul style="list-style:none;">
                        @foreach ($querys as $query)
                            <li>
                                <a href={{ route('book.index', [$query->id]) }}>  {{ $query->autor , $query->title}} </a>
                            </li>
                        @endforeach

                    </ul>
                   
                </div>

            </div>
        </div>
        <hr>
        {{$querys->links('pagination::bootstrap-4')}}
    @endif

@endsection


