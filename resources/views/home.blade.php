@extends('layouts.base')

@section('main')
<div class="container">
    <div class="card" style="margin-top: 2rem">
        <div class="card-header">
            book List
        </div>
        <div class="card-body">
            <h5 class="card-title"> acesse sua lista de livros <a href="{{route('book.index')}}" class="btn btn-primary">aqui</a></h5>
        </div>
    </div>
</div>
@endsection
