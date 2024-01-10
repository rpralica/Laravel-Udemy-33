@extends('layouts.layout')
@section('title','Tasks')
@section('page-name','Tasks')
@section('content')

    <div>
      @forelse ($tasks as $task )
     <div class="container offset-1">
      <li class="list-group-item"> <a href="{{route('tasks.show',['task'=>$task])}}"><strong>{{$task->title}}</strong></a></li>
    </div>

    @empty
    <div class="container"> Nema zadataka</div>
      @endforelse
    </div>

    <br><br>

<button class="btn btn-info offset-5 "><a class="text-white " href="{{route('tasks.create')}}" >New Task</a></button>
@endsection


