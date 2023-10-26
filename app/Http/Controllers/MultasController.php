<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MultasController extends Controller
{
    
    public function index() 
    {
        $total_multas = null; 

        $datos['prestamos'] = Prestamo::paginate(10);
        $datos['multa'] = $total_multas;
        return view('multas.index', $datos); 
    }

    public function filtrar(Request $request){   
        $prestamos = Prestamo::where('fecha_inicio', '>=', $request->fecha_inicio) 
            ->where('fecha_fin', '<=', $request->fecha_fin)
            ->get();   

        foreach ($prestamos as $prestamo) {  
            $prestamo->multa = $this->calcularMulta($prestamo);  
           
        }

      
        $datos['prestamos'] = $prestamos; 
       
        return view('multas.index', $datos); 
    }

    public function calcularMulta($prestamos){
        $multa_inicio = 0;
        $penalidad_por_dia = 5;
        
            $estado = $prestamos->estado;  

           
            $fecha_fin = Carbon::parse($prestamos->fecha_fin);
            $fecha_entrega = Carbon::parse($prestamos->fecha_fentrega);
            $fecha_actual = Carbon::now();

            if($estado == 'Prestado'){
                if($fecha_actual > $fecha_fin){
                    $diferencia = $fecha_actual->diffInDays($fecha_fin);
                    $multa_a_pagar = $multa_inicio + ($diferencia * $penalidad_por_dia);
                   
                }else{   
                    $multa_a_pagar = $multa_inicio + 0;
                    
                }
            }
            
            if($estado == 'Devuelto'){  
                if($fecha_entrega > $fecha_fin){
                    $diferencia = $fecha_entrega->diffInDays($fecha_fin);
                    $multa_a_pagar = $multa_inicio + ($diferencia * $penalidad_por_dia);
                    
                }else{   
                    $multa_a_pagar = $multa_inicio + 0;
                  
                }
            }
        return $multa_a_pagar;
    }

}
