

@extends('dashboard.master')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-outline-primary mt-3 mb-3" href="{{route('tag.create')}}">Crear nuevo tag</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Título</td>
                            <td>Creado</td>
                            <td>Actualizado</td>
                            <td>Aciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{Str::limit($tag->title, 15)}}</td>
                                <td>{{$tag->created_at->format('d/m/Y')}}</td>
                                <td>{{$tag->updated_at->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{route('tag.show', $tag->id)}}" class="btn btn-light btn-sm mr-2">
                                        <span class="material-icons md-48">preview</span>
                                    </a>
                                    <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-success btn-sm mr-2">
                                        <span class="material-icons md-48">create</span>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$tag->id}}">
                                        <span class="material-icons md-48">delete_forever</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            {{$tags->links()}}
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que desea borrar este tag?
                    <div class="modal-footer d-flex">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <form id="form-delete" action="{{route('tag.destroy', 0)}}" data-action="{{route('tag.destroy', 0)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = () => {
            let deleteModal = document.querySelector('#deleteModal');
            deleteModal.addEventListener('show.bs.modal', (event) => {
                let button = event.relatedTarget;
                let id = button.getAttribute('data-id');
                let form = document.querySelector('#form-delete');
                let action = document.querySelector('#form-delete').getAttribute('data-action').slice(0, -1);
                action += id;
                form.setAttribute('action', action);
                let modalTitle = deleteModal.querySelector('.modal-title');
                let modalBodyInput = deleteModal.querySelector('.modal-body input');
                modalTitle.textContent = `Vas a borrar el Tag con ID ${id}`
            });
        };
    </script>
@endsection
