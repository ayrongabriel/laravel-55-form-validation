<div class="row">
    {!! Form::hidden('client_type', $clientType) !!}
    <div class="col-md-4">
        {!! Form::label('name','Nome') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('document_number','CPF/CNPJ') !!}
        {!! Form::text('document_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-2">
        {!! Form::label('phone','Telefone') !!}
        {!! Form::text('phone',null,['class'=>'form-control']) !!}
    </div>
    @if($clientType == \App\Client::TYPE_INDIVIDUAL)
    <div class="col-md-2">
        {!! Form::label('marital_status','Estado Civil') !!}
        {!! Form::select('marital_status', array_merge([0=>'Selecione'],\App\Client::MARITAL_STATUS),null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('date_birth','Data Nascimento') !!}
        {!! Form::date('date_birth',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('physical_disability','Deficiente') !!}
        {!! Form::text('physical_disability',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-1">
        <div class="radio">
            <label>
                {{Form::radio('sex', 'm', true)}} Masculino
            </label>
            <label>
                {{Form::radio('sex', 'f', false)}} Feminino
            </label>
        </div>
    </div>
        @else
        <div class="col-md-4">
            {!! Form::label('company_name','Empresa') !!}
            {!! Form::text('company_name',null,['class'=>'form-control']) !!}
        </div>
    @endif
    <div class="col-md-1">
        <div class="radio">
            <label>
                {{Form::checkbox('defaulter', 'defaulter')}} Inadiplente?
            </label>
        </div>
    </div>
</div>
<hr />