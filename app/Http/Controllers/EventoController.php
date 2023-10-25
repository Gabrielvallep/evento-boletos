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
            return datatables()->of(DB::select("SELECT DISTINCT
            e.id,
            e.evento,
            f.nombre AS formato,
            DATE(e.fecha) AS fecha,
            e.ruta_imagen,
            f.id as id_formato,
            f.nombre
        FROM evento e
        INNER JOIN formato f on e.id_formato = f.id"))
            ->addColumn('action', function($row){
                $button = '<button type="button" name="edit" onclick="editarEvento('.$row->id.', \''.$row->evento.'\', \''.$row->fecha.'\', \''.$row->id_formato.'\')"  class="edit btn btn-primary" title="Editar"><i class="mdi mdi-pencil"></i></button>';
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
            $evento->id_formato = $request->formato;
            $evento->save();

            $idInsertado = $evento->id;//Obtener el id generado del registro insertado

            //Guardar las zonas que tendra el evento
            foreach ($datos_zonas as $zona){
                $evento_zona = new EventoZona;
                $evento_zona->id_evento = $idInsertado;
                $evento_zona->id_zona = $zona->id_zona;
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
            $evento->id_formato = $request->formato;

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
                    $evento_zona->id_zona = $zona->id_zona;
                    $evento_zona->precio = $zona->precio;
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
            z.id as idz,
            z.nombre,
            #ez.precio,
            (select precio from evento_zona where id_evento=$idEvento and id_zona = z.id) as precio
            #ez.id as id_evento_zona
        from zonas z
        left join zona_formato zf on z.id = zf.id_zona
        where zf.id_formato=$idFormato"));
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
