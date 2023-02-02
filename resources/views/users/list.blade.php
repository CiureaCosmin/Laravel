@extends('layouts.nav')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista produselor
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Nr.</th>
                    <th>Nume</th>
                    <th>Email</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($users) > 0)
                    @foreach ($users as $key => $task)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->email }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('users.show',$task->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{route('users.edit',$task->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' =>
                               ['users.destroy', $task->id],'style'=>'display:inline']) }}
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
            {{$users->render()}}
        </div>
    </div>
@endsection
