@extends(layout())

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.clients.index')}}" class="btn btn-default" title="Listar cliente"><i class="fas fa-list"></i> Listar clientes</a>
        </div>
        <hr />
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de Clintes</div>

                <div class="panel-body">
                    @include('alerts._errors_forms')
                    {!! Form::model($client, ['route' => ['admin.clients.update', $client->id], 'method' => 'PUT']) !!}
                    @include('admin.clients._form_client')
                    {!! Form::submit('Salvar cliente', ['class' => 'btn btn-success btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
