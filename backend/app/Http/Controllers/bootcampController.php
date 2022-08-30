<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;

class bootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "aqui se va a mostrar todos los bootcamp";
        //return Bootcamp::all();
        return response()->json([   "seccess"=> true,
                                    "data" => Bootcamp::all()
                                ] , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //REGISTRAR EL BOOTCAMP A PARTIR
        //DEL PAILOAD

        $b = Bootcamp::create([
            "name" => $request->name,
            "description" => $request->description,
            "website" => $request->website,
            "phone" => $request->phone,
            "user_id" => $request->user_id
        ]);

        return response(["success" => true ,
                        "data" => $b] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo "mostrar un bootcamp cuyo id es: $id";
        return response()->json([ "seccess" => true,
                                    "data" => Bootcamp::find($id)],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 1. SELECCIONAR EL BOOTCAMP POR ID
        $bootcamp = Bootcamp::find($id);

        // 2. ACTUALIZARLO
        $bootcamp->update(
            $request->all()
        );

        // 3. HACER EL RESPONSE RESPECTIVO
        return response()->json(["success" => true , 
                                "data" => $bootcamp] ,200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 1. SELECCIONAS EL BOOTCAMP
        $bootcamp = Bootcamp::find($id);
        
        // 2. ELIMINAR ESE BOOTCAMP
        $bootcamp->delete();

        // 3. RESPONSE:
        return response()->json( [  "success" => true,
                                    "messege" => "Bootcamp eliminado",
                                    "data" => $bootcamp->id],200 );

    }
}
