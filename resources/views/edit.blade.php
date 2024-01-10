@extends('layouts.layout')

@section('title','Edit Task')
@section('page-name','Edit Task')

@section('content')
<form action="{{route('tasks.update',['task'=>$task])}}" method="post">
@csrf
@method('put')
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
<input type="text" class="form-control" name="title" placeholder="Naslov" value="{{$task->title}}" ><br>
@error('title')
<p class="text-danger">{{$message}}</p>
@enderror
<input type="text" class="form-control" name="description" placeholder="Opis" value="{{$task->description}}" ><br>
@error('description')
<p class="text-danger">{{$message}}</p>
@enderror
<textarea class="form-control" name="long_description" placeholder="Detaljan Opis" name="" id="" cols="30" rows="5">{{$task->long_description}}</textarea><br>
@error('long_description')
<p class="text-danger">{{$message}}</p>
@enderror
<button type="submit" class="btn btn-info offset-3">Prepravi  Zadatak</button>
        </div>
    </div>
</div>
</form>
@endsection
