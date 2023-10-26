@extends('layouts.app')

@section('template_title')
    Prestamo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card border-dark mb-3">
                    <div class="card-body">  
                        <form action="{{ route('multas.index') }}" method="POST">
                            @csrf
                            <div class="col mt-6" style = "margin: 8px;">
                                <label for="fechaInicio" class="form-label">Seleccione la fecha inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" style = "background-color: #d63384;">
                            </div>
    
                            <div class="col mt-6" style = "margin: 8px;">
                                <label for="fechaFin" class="form-label">Seleccione la fecha final</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" style = "background-color: #d63384;">
                            </div>
                            
                            <div class="d-grid gap-2 col-6 mx-auto" style = "margin: 50px;">
                                <button type="submit" class="btn btn-dark"> Aplicar filtro </button>
                            </div>
                                
                        </form>       
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark table-hover">
                                <thead class="thead">
                                    <tr class="table-dark">
                                            
                                        <th>Equipo Id</th>
                                        <th>Usuario</th>
                                        <th>Multa</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestamos as $prestamo)
                                    @if ($prestamo->multa > 0)
                                            
                                    <tr>  

                                        <td class="table-success">{{ $prestamo->equipo_id }}</td>
                                        <td class="table-success">{{ $prestamo->usuario }}</td>
                                        <td class="table-danger">{{ $prestamo->multa }}</td>  

                                    </tr>
                                            
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>         
                    </div>
                </div>
            </div>
        </div> 
    </div>

@endsection