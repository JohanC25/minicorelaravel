@extends('layouts.app')

@section('template_title')
    Equipo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card border-dark mb-3">
                    <div class="card-header border-dark">
                        EQUIPOS
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark table-hover">
                                <thead class="thead">
                                    <tr class="table-dark">
                                        <th>No</th>
                                        
										<th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $equipo)
                                        <tr>
                                            <td class="table-success">{{ ++$i }}</td>
                                            
											<td class="table-success">{{ $equipo->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $equipos->links() !!}
            </div>
        </div>
    </div>
@endsection
