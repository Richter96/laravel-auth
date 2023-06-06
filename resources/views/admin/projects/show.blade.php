@extends('layouts.admin')

@section('content')
<div class="container-md my-5">
    <div class="row py-5 shadow">
        <div class="col-6">
            <img src="{{$project->image}}" class="card-img-top pe-5" alt="{{$project->title}}">
        </div>
        <div class="col px-5 me-5">
            <div class="card-body">
                <h2 class="card-title p-4">{{$project->title}}</h2>
                <p class="card-text p-2">{{$project->text}}</p>
            </div>
        </div>
    </div>
</div>

<a class="btn btn-primary my-3" href="{{route('admin.projects.index')}}" role="button">Return</a>

@endsection
