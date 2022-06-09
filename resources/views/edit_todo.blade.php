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
                        @method('PUT')

                        <div class="form-group row">
                            <label for="title" class="col-form-label text-md-right">Краткое описание</label>

                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $todo->title }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-form-label text-md-right">Подробности</label>

                                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('password') is-invalid @enderror" autocomplete="description" value="{{ $todo->description }}">{{ $todo->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="due_date" class="col-form-label text-md-right">Due date</label>

                                <input id="due_date" type="datetime-local" class="form-control @error('due_date') is-invalid @enderror" autocomplete="due_date" name="due_date" value="{{ $todo->due_date }}" required>
                        </div>

                        <div class="form-group row">
                            <div class="">
                                <div class="form-check">
                                    @if ($todo->completed)
                                        <input class="form-check-input" type="checkbox" name="completed" id="completed" value="{{ $todo->completed }}" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="completed" id="completed" value="{{ $todo->completed }}">
                                    @endif

                                    <label class="form-check-label" for="completed">
                                        Сделано?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Исправить
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

</div>
@endsection
