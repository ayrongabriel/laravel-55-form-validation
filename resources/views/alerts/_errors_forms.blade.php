@if($errors->any())
    <ul class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @foreach($errors->all() as $erro)
            <li class="list-unstyled">{{$erro}}</li>
        @endforeach
    </ul>
@endif