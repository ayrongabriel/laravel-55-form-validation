@extends(layout())

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.clients.create', ['client_type' => \App\Client::TYPE_INDIVIDUAL])}}" class="btn btn-default" title="Adicionar cliente"><i class="far fa-user"></i> Pessoa Fisíca</a>
            <a href="{{route('admin.clients.create', ['client_type' => \App\Client::TYPE_LEGAL])}}" class="btn btn-default" title="Adicionar cliente"><i class="fas fa-user"></i> Pessoa Jurídica</a>
        </div>
        <hr />
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de {{$clientType == \App\Client::TYPE_INDIVIDUAL ? 'Pessoa Física' : 'Pessoa Jurídica'}}</div>

                <div class="panel-body">
                    @include('alerts._errors_forms')
                    {!! Form::open(['route' => 'admin.clients.store', 'method' => 'POST']) !!}
                    @include('admin.clients._form_client')
                    {!! Form::submit('Cadastrar cliente', ['class' => 'btn btn-success btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
