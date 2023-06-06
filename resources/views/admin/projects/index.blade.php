@extends('layouts.admin')

@section('content')
<div class="container">

    @if (session('message'))
    <div class="alert alert-primary" role="alert">
        <strong>{{session('message')}}</strong>
    </div>

    @endif

    <h1>MY PROJECTS</h1>


    <a class="btn btn-primary my-3" href="{{route('admin.projects.create')}}" role="button">Create new Project</a>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">SLUG</th>
                    <th scope="col">DESCRIPTION</th>
                    <th class="col-2" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($projects as $project)
                <tr>
                    <td scope="row">{{$project->id}}</td>
                    <td>
                        <img width="100" class="img-fluid" src="{{$project->image}}" alt="{{$project->title}}">
                    </td>

                    <td>{{$project->title}}</td>
                    <td>{{$project->slug}}</td>
                    <td>{{$project->text}}</td>
                    <td>
                        <div class="row row-cols-3">

                            <div class="icon d-inline">
                                <a name="" id="" class="bg-violet-500 btn btn-primary w-1rem" href="{{route('admin.projects.show', $project)}}" role="button"><i class="fas fa-eye fa-sm fa-fw"></i></a>
                            </div>

                            <div class="icon d-inline">
                                <a name="" id="" class="bg-violet-500 btn btn-primary w-1rem" href="{{ route('admin.projects.edit', $project) }}" role="button"><i class="fas fa-pencil fa-sm fa-fw"></i></a>
                            </div>
                            <div class="icon d-inline">
                                <form action="{{route('admin.projects.destroy', $project)}}" method="project">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-sm fa-fw w-50"></i>
                                    </button>
                                </form>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="modal-{{$project->id}}">
                                    <i class="fas fa-trash fa-sm fa-fw w-50"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modal-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$project->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{$project->id}}">Delit this project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Body
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Optional: Place to the bottom of scripts -->
                                <script>
                                    const myModal = new bootstrap.Modal(document.getElementById('modal-{{$project->id}}'), options)

                                </script>
                            </div>

                    </td>

                </tr>

                @empty
                <tr class="">
                    <td>No results</td>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>

</div>



@endsection
