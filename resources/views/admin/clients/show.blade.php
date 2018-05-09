@extends(layout())

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.clients.index')}}" class="btn btn-default" title="Listar cliente"><i class="fa fa-list"></i> Lista de clientes</a>
            <a class="btn btn-danger" href="{{ route('admin.clients.destroy',['client' => $client->id]) }}"
               onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"><i class="fa fa-trash"></i> Excluir</a>
            <form id="form-delete"style="display: none" action="{{ route('admin.clients.destroy',['client' => $client->id]) }}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
            </form>
        </div>
        <hr />
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de Clintes</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tboby>
                            <tr>
                                <th scope="row">ID</th>
                                <td>{{$client->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nome</th>
                                <td>{{$client->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">CPF/CNPJ</th>
                                <td>{{$client->document_number}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{$client->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Telefone</th>
                                <td>{{$client->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Estado Cirvil</th>
                                <td>{{$client->marital_status}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Data Nasc.</th>
                                <td>{{$client->date_birth}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Sexo</th>
                                <td>{{$client->sex}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Deficiência Fiśica</th>
                                <td>{{$client->physical_disability}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Inadimplente</th>
                                <td>{{$client->defaulter}}</td>
                            </tr>
                        </tboby>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
