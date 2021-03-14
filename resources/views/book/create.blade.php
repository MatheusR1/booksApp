
@extends('layouts.base')

@section('main')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <button class="close" data-dismiss='alert'> &times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<form method="POST" action="{{route('book.store')}}"  >
    @csrf
    <div class="form-group">
      <label for="title">título</label>
      <input name="title" type="text" class="form-control"  placeholder="informe titulo" required>
    </div>

    <div class="form-group">
      <label for="autor">Autor</label>
      <input  name="autor" type="text" class="form-control" placeholder=" informe autor" required>
    </div>

    <div class="form-group">
        <label for="numero_serie">Numero de serie</label>
        <input name="numero_serie" type="number" class="form-control" placeholder=" informe numero de serie" required>
      </div>
      
      <div class="form-group">
        <label for="user_id">ID</label>
        <input name="user_id" type="number" class="form-control" placeholder=" informe o seu id de usuário" required>
      </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

@endsection