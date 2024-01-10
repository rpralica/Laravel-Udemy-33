@extends('layouts.layout')

@section('title','Create Task')
@section('page-name','Create Task')

@section('content')
<form action="{{route('tasks.store')}}" method="post">
@csrf

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
<input type="text" class="form-control" name="title" placeholder="Naslov" value="{{old('title')}}" ><br>
@error('title')
<p class="text-danger">{{$message}}</p>
@enderror
<input type="text" class="form-control" name="description" placeholder="Opis" value="{{old('description')}}" ><br>
@error('description')
<p class="text-danger">{{$message}}</p>
@enderror
<textarea class="form-control" name="long_description" placeholder="Detaljan Opis" name="" id="" cols="30" rows="5">{{old('long_description')}}</textarea><br>
@error('long_description')
<p class="text-danger">{{$message}}</p>
@enderror
<button type="submit" class="btn btn-info offset-3">Dodaj Zadatak</button>
        </div>
    </div>
</div>
</form>
@endsection
