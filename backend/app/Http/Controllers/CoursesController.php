<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Validator;


class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request , $id)
    {

        //CREAR EL CURSO
        $curso = new Course();
        $curso->title = $request->title;
        $curso->description = $request->description;
        $curso->weeks = $request->weeks;
        $curso->enroll_cost = $request->enroll_cost;
        $curso->minimum_skill = $request->minimum_skill;
        $curso->bootcamp_id = $id;
        $curso->save();

        //ENVIAR RESPONSE
        return response()->json([
            "seccess" => true,
            "data" => $curso
        ] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // 1. SELECCIONAR EL CURSO POR ID
        $curso = Course::find($id);

        // 2. ACTUALIZARLO
        $curso->update(
            $request->all()
        );

        // 3. HACER EL RESPONSE RESPECTIVO
        return response()->json(["success" => true , 
                                "data" => $curso
                                ] ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // 1. SELECCIONAS EL CURSO
         $curso = Course::find($id);
        
         // 2. ELIMINAR ESE CURSO
         $curso->delete();
 
         // 3. RESPONSE:
         return response()->json( [  "success" => true,
                                     "messege" => "Course eliminado",
                                     "data" => $curso->id
                                 ], 200 );
    }
}
