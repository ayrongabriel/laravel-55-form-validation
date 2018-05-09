{!! Form::open(['route' => ['admin.clients.destroy', $client->id], 'method' => 'DELETE']) !!}
<a href="{{route('admin.clients.show', $client->id)}}" class="btn btn-info" title="Visualizar"><i class="fa fa-eye"></i></a>
<a href="{{route('admin.clients.edit', $client->id)}}" class="btn btn-success" title="Editar"><i class="fa fa-edit"></i></a>
<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
{!! Form::close() !!}