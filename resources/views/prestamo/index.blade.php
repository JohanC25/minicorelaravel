@extends('layouts.app')

@section('template_title')
    Prestamo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="card border-dark mb-3">
                    <div class="card-header border-dark">
                        REGISTRO DE PRÉSTAMOS
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
                                        
                                        <th>Equipo Id</th>
										<th>Usuario</th>
										<th>Estado de Préstamo</th>
										<th>Fecha Inicio</th>
										<th>Fecha Final</th>
										<th>Fecha Real de Entrega</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestamos as $prestamo)
                                        <tr>
                                            <td class="table-success">{{ ++$i }}</td>
                                            
											<td class="table-success">{{ $prestamo->equipo_id }}</td>
											<td class="table-success">{{ $prestamo->usuario }}</td>
											<td class="table-warning">{{ $prestamo->estado }}</td>
											<td class="table-danger">{{ $prestamo->fecha_inicio }}</td>
											<td class="table-danger">{{ $prestamo->fecha_fin }}</td>
											<td class="table-danger">{{ $prestamo->fecha_fentrega }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $prestamos->links() !!}
            </div>
        </div>
    </div>
@endsection
