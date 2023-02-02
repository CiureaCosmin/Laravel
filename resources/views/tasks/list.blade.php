@extends('layouts.nav')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista produselor
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/produse/create" class="btn btn-default">Adaugare Produs Nou</a>
                </div>
            </div>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Nr.</th>
                    <th>Titlu</th>
                    <th>Descriere</th>
                    <th>Pret</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->price }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('produse.show',$task->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{route('produse.edit',$task->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' =>
                               ['produse.destroy', $task->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btndanger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu exista sarcini!</td>
                    </tr>
                @endif
            </table>
            <!-- Introduce nr pagina -->
            {{$tasks->render()}}
        </div>
    </div>
@endsection
