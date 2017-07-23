@extends('backend.master.layout')

@section('title') Elenco Utenti @endsection

@section('breadcrumb') Utenti > Elenco @endsection

@section('content')

@include ('layouts.successmessage')
    <p>Di seguito, l'elenco degli utenti abilitati attualmente.</p>

    <table class="table table-striped">
        <thead>
            <td><b>Nome</b></td>
            <td><b>Cognome</b></td>
            <td><b>Email</b></td>
            <td><b>Data di Aggiunta</b></td>
            <td><b>Operazioni</b></td>
        </thead>

    @foreach($users as $user)

        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ date('d/m/Y H:i', strtotime($user->created_at)) }}</td>

            <td>

                <form action="indexuser/delete/{{ $user->id }}" method="GET">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if (  Auth::user()->id == $user->id  )

                         <div class="form-group">
                            <button type="submit" class="btn btn-danger disabled">Delete</button>
                         </div>

                    @else

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>

                    @endif
                </form>

            </td>
        </tr>

    @endforeach

    </table>

    {{ $users->render() }}

@endsection