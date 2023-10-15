<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use App\Models\Formato;
use App\Models\EventoZona;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use function Laravel\Prompts\select;

class EventoController extends Controller

{
    public function index(Request $request)
    {
        if($request->ajax()){
            return datatables()->of(DB::select("SELECT DISTINCT e.id, e.evento, f.nombre AS formato,e.fecha,e.ruta_imagen,f.id as id_formato,e.estado FROM evento e LEFT JOIN evento_zona ez ON e.id = ez.id_evento LEFT JOIN zona_formato zf ON ez.id_zona_formato = zf.id LEFT JOIN zonas z ON zf.id_zona = z.id LEFT JOIN  formato f ON zf.id_formato = f.id WHERE e.estado = 1"))
            ->addColumn('action', function($row){
                $button = '<button type="button" name="edit" onclick="editarEvento('.$row->id.', \''.$row->evento.'\', \''.$row->fecha.'\', \''.$row->id_formato.'\', \''.$row->estado.'\')"  class="edit btn btn-primary" title="Editar"><i class="mdi mdi-pencil"></i></button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" onclick=deshabilitarEvento("'.$row->id.'") class="delete btn btn-danger" title="Deshabilitar"><i class="mdi mdi-toggle-switch-off"></i></button>';
                return $button;
            })
            ->rawColumns(['action'])->addIndexColumn()->make(true);
        }
    }

    public function agregarFormatos(Request $request){
        $formatos = Formato::all();
        return response()->json($formatos);
    }

    public function store(Request $request){

        $evento = new Evento;

        if($request->operacion == 'agregar'){
            $datos_zonas = json_decode($request->zonas);
            //exit("Si es para guardar");
            $evento->evento = $request->evento;
            $evento->fecha = $request->fecha;
            $evento->estado = $request->estado;
            $evento->save();

            $idInsertado = $evento->id;//Obtener el id generado del registro insertado

            //Guardar las zonas que tendra el evento
            foreach ($datos_zonas as $zona){
                $evento_zona = new EventoZona;
                $evento_zona->id_evento = $idInsertado;
                $evento_zona->id_zona_formato = $zona->id_zona_formato;
                $evento_zona->precio = $zona->precio;
                $evento_zona->save();
            }

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                //Asignar nombre unico a la imagen con la fecha y hora en la que se inserto
                $nombreImagen = $idInsertado . '_' . date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
                // Mover la imagen a la ruta especificada
                $imagen->move(public_path('storage/img_eventos'), $nombreImagen);
                Evento::where('id', $idInsertado)->update(['ruta_imagen' => $nombreImagen]);
            }
        }else{
            //$evento->id = $request->id;
            $evento = Evento::find($request->id);
            $evento->evento = $request->evento;
            $evento->fecha = $request->fecha;
            $evento->estado = $request->estado;

            //Validar si han insertado una imagen nueva
            if ($request->hasFile('imagen')) {
                $evento_existente = Evento::find($request->id);
                $rutaImagen = public_path('storage/img_eventos/' . $evento_existente->ruta_imagen);
                // Eliminar la imagen
                if (file_exists($rutaImagen) && !is_null($evento_existente->ruta_imagen)) {
                    unlink($rutaImagen);
                }

                $imagen = $request->file('imagen');
                $nombreImagen = $request->id . '_' . date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
                $imagen->move(public_path('storage/img_eventos'), $nombreImagen);
                $evento->ruta_imagen = $nombreImagen;
            }

            //Guardar las zonas que tendra el evento
            if($request->has('zonas')){
                $datos_zonas = json_decode($request->zonas);
                foreach ($datos_zonas as $zona){
                    $evento_zona = new EventoZona;
                    $evento_zona->id_evento = $request->id;
                    $evento_zona->id_zona_formato = $zona->id_zona_formato;
                    $evento_zona->precio = $zona->precio;
                    //exit($evento_zona->id_zona_formato);
                    $evento_zona->save();
                }
            }
            $evento->save();
        }
        return response()->json($evento);
    }


    public function mostrarZonasFormatos(Request $request){
        $idFormato = $request->id_formato;
        return response()->json(DB::select("select z.id as idz,z.nombre,zf.id as idzf from formato
            inner join zona_formato zf on formato.id = zf.id_formato
            inner join zonas z on zf.id_zona = z.id
            where formato.id = $idFormato"));
    }

    public function mostrarZonasFormatosAgregadas(Request $request){
        $idFormato = $request->id_formato;
        $idEvento = $request->id_evento;
        return response()->json(DB::select("select
            zonas.id as idz,
            zonas.nombre,
            zf.id as idzf,
            IFNULL((select ez.precio from evento_zona ez where ez.id_zona_formato = zf.id and ez.id_evento=$idEvento),0) as precio,
            IFNULL((select ez.id from evento_zona ez where ez.id_zona_formato = zf.id and ez.id_evento=$idEvento),0) as id_evento_zona
        from zonas
        inner join zona_formato zf on zonas.id = zf.id_zona
        inner join formato f on zf.id_formato = f.id
        where f.id=$idFormato"));
    }

    public function eliminarEventoZona(Request $request){
        $id = $request->id_evento_zona;
        EventoZona::where('id', $id)->delete();
        return response()->json($id);
    }

    public function deshabilitarEvento(Request $request){
        $id = $request->id_evento;
        Evento::where('id', $id)->update(['estado' => 0]);
        return response()->json($id);
    }
}
