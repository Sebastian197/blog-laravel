@extends('dashboard.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Email</td>
                            <td>Actualizado</td>
                            <td>Aciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->surname}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->created_at->format('d/m/Y')}}</td>
                                <td>{{$contact->updated_at->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{route('contact.show', $contact->id)}}" class="btn btn-light btn-sm mr-2">Ver</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$contact->id}}">Borrar</button>
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
            {{$contacts->links()}}
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
                    ¿Seguro que desea borrar este contact?
                    <div class="modal-footer d-flex">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <form id="form-delete" action="{{route('contact.destroy', 0)}}" data-action="{{route('contact.destroy', 0)}}" method="POST">
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
                modalTitle.textContent = `Vas a borrar el contact con ID ${id}`
            });
        };
    </script>
@endsection
