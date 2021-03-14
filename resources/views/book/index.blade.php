@extends('layouts.base')

@section('main')

    <div class="container mt-5">
        <div class="row">
            
            <div class="col-sm-12">
                <hr>
                <div class="d-flex justify-content-center">
                    <p class="h1 text-center mt-2 ">Book List</p>
                </div>
                <hr>

            </div>
            <div class="col-sm-12">
                <div class="d-flex justify-content-center mt-3">
                    <div class="card">
                        <h5 class="card-header d-flex justify-content-end">
                          <a href="{{ route('book.create') }}" class=" btn btn-outline-success"> 📎 Add</a>
                        </h5>
                        <div class="card-body">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col">numero de serie</th>
                                        <th scope="col">título</th>
                                        <th scope="col">autor</th>
                                        <th scope="col"> ações</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <th scope="row">{{ $book->numero_serie }}</th>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->autor }}</td>
                                            <td class=" "> 
                                              <a href="{{ route('book.edit', ['book' => $book->id]) }}"
                                                class="btn btn">📝</a>
                                                
                                            </td>
                                            <td>
                                              <form method="post"
                                                    action="{{ route('book.destroy', ['book' => $book->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn" type="submit">❌</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            {{$books->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
