@extends(layout())

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"><a href="{{route('admin.clients.create', ['client_type' => \App\Client::TYPE_INDIVIDUAL])}}" class="btn btn-default" title="Adicionar cliente"><i class="fa fa-user-plus"></i></a></div>
        <hr />
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Clintes</div>

                <div class="panel-body">
                    @include('alerts._success')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF/CNPJ</th>
                                <th>Data Nasc</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Sexo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tboby>

                            @foreach($clients as $client)
                                <tr>
                                    <td style="vertical-align: middle">{{$client->id}}</td>
                                    <td style="vertical-align: middle">{{$client->name}}</td>
                                    <td style="vertical-align: middle">{{$client->document_number_formatted}}</td>
                                    <td style="vertical-align: middle">{{$client->date_birth_formatted}}</td>
                                    <td style="vertical-align: middle">{{$client->email}}</td>
                                    <td style="vertical-align: middle">{{$client->phone}}</td>
                                    <td style="vertical-align: middle">{{$client->sex_formatted}}</td>
                                    <td style="vertical-align: middle">
                                        <a href="{{route('admin.clients.show', $client->id)}}" class="btn btn-info" title="Visualizar"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.clients.edit', $client->id)}}" class="btn btn-success" title="Editar"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="{{ route('admin.clients.destroy',['client' => $client->id]) }}"
                                           onclick="event.preventDefault();if(confirm('Deseja excluir {{$client->name}}? ')){document.getElementById('form-delete-{{$client->id}}').submit();}"><i class="fa fa-trash"></i></a>
                                        <form id="form-delete-{{$client->id}}" style="display: none" action="{{ route('admin.clients.destroy',['client' => $client->id]) }}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tboby>
                    </table>
                    {{$clients->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
