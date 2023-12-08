@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scropt="col">#</th>
                    <th scropt="col">Nome</th>
                    <th scropt="col">Participantes</th>
                    <th scropt="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <th scropt="row">{{ $loop->index + 1 }}</th>
                        <td><a href="/events/{{$event->id}}">{{ $event->title }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td>
                            <a href="/events/edit/{{ $event->id }}" class="btn btn-info btn-edit"><ion-icon name="create-outline"></ion-icon>Editar</a>
                            <form action="/events/{{ $event->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
        @else
        <p>Você ainda não tem eventos, <a href="/events/create">Criar evento</a></p>            
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Eventos em que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($eventsasparticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scropt="col">#</th>
                    <th scropt="col">Nome</th>
                    <th scropt="col">Participantes</th>
                    <th scropt="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventsasparticipant as $event)
                    <tr>
                        <th scropt="row">{{ $loop->index + 1 }}</th>
                        <td><a href="/events/{{$event->id}}">{{ $event->title }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td>
                            <form action="/events/leave/{{ $event->id }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash-outline"></ion-icon> Sair do evento
                                </button>
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
        @else
         <p>Você ainda não esta participando de nenhum evento, <a href="/">veja todos os eventos</a></p>   
        @endif
    </div>

@endsection
    


