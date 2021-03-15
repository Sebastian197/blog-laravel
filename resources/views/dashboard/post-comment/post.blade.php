@extends('dashboard.master')

@section('content')

<div class="col-6 mb-3">
    <form action="{{route('post-comment.post', $post->id)}}" id="filterForm">
        <div class="form-row">
            <div class="col-10">
                <select id="filterPost" class="form-control">
                    @foreach ($posts as $p)
                        <option
                            value="{{ $p->id }}"
                            {{$post->id === $p->id ? 'selected' : ''}}
                        >
                            {{Str::limit($p->title, 15)}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Buscar
                </button>
            </div>
        </div>
    </form>
</div>

@if (count($postComments) > 0)
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Título</td>
                            <td>Aprovado</td>
                            <td>Usuario</td>
                            <td>Actualizado</td>
                            <td>Aciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postComments as $postComment)
                            <tr>
                                <td>{{$postComment->id}}</td>
                                <td>{{$postComment->title}}</td>
                                <td>{{$postComment->approved}}</td>
                                <td>{{$postComment->user->name}}</td>
                                <td>{{$postComment->created_at->format('d/m/Y')}}</td>
                                <td>{{$postComment->updated_at->format('d/m/Y')}}</td>
                                <td class="d-flex">
                                    {{--<a href="{{route('post-comment.show', $postComment->id)}}" class="btn btn-light btn-sm mr-2">Ver</a>--}}
                                    <button
                                        type="button"
                                        class="btn btn-light btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showModal"
                                        data-id="{{$postComment->id}}"
                                        >
                                        Ver
                                    </button>
                                    <form action="{{route("post-comment.proccess", $postComment->id)}}" method="POST">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="approved mr-2 btn {{$postComment->approved == 1 ? "btn-success" : "btn-outline-danger"}} btn-sm"
                                        >
                                            {{$postComment->approved == 1 ? "Aprovado" : "Rechazado"}}
                                        </button>
                                    </form>

                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm mr-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-id="{{$postComment->id}}"
                                        >
                                        Borrar
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
            {{$postComments->links()}}
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
                    ¿Seguro que desea borrar este comentario?
                    <div class="modal-footer d-flex">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <form id="form-delete" action="{{route('post-comment.destroy', 0)}}" data-action="{{route('post-comment.destroy', 0)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title-comment" id="ModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <p class="message"></p>
                    <div class="modal-footer d-flex">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let showModal = document.querySelector('#showModal')
        showModal.addEventListener('show.bs.modal', (event) => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-id')
            let modalTitle = document.querySelector('.title-comment')
            let modalMessage = document.querySelector('.message')

            fetch("{{URL::to('/')}}/dashboard/post-comment/j-show/" + id)
                .then(resp => resp.json())
                .then(comment => {
                    modalTitle.textContent = comment.title
                    modalMessage.textContent = comment.message
                })
        })

        window.onload = () => {
            let deleteModal = document.querySelector('#deleteModal')
            deleteModal.addEventListener('show.bs.modal', (event) => {
                let button = event.relatedTarget
                let id = button.getAttribute('data-id')
                let form = document.querySelector('#form-delete')
                let action = document.querySelector('#form-delete').getAttribute('data-action').slice(0, -1)
                action += id
                form.setAttribute('action', action)
                let modalTitle = deleteModal.querySelector('.modal-title')
                let modalBodyInput = deleteModal.querySelector('.modal-body input')
                modalTitle.textContent = `Vas a borrar el postComment con ID ${id}`
            })
        }
    </script>
@else
    <h1>No hay comentarios para le post selecionado</h1>
@endif

@endsection
