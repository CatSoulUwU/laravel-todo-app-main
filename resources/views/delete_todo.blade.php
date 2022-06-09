@extends('layouts.app')

@section('content')
<div class="container">

                <div class="card-header">
                    Edit {{ $todo->title }}
                </div>
                <h5 class="card-header">
                    <a href="{{ route('todo.index') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-arrow-left"></i> Вернуться</a>
                </h5>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('todo.update', $todo->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <h3>
                                    Вы уверены, что хотите удалить {{ $todo->title }}?
                                </h3>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    Да
                                </button>
                                <a href="{{ route('todo.index') }}" class="btn btn-info">Нет</a>
                            </div>
                        </div>
                    </form>

                </div>

</div>
@endsection
