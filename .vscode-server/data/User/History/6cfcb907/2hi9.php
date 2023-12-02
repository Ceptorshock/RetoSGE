<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


/**
* @OA\Info(title="API", version="1.0"),
* @OA\SecurityScheme(
*   in="header",
*   scheme="bearer",
*   bearerFormat="JWT",
*   securityScheme="bearerAuth",
*   type="http",
* ),
*/



class IncidentController extends Controller
{

/**
* @OA\Get(
*   path="/api/incidents",
* summary="Show incidents",
* @OA\Response(
* response=200,
* description="Mostrar todos los posts."
* ),
* @OA\Response(
* response="default",
* description="Ha ocurrido un error."
* )
* )
*/
    public function index()
    {
        $incidents = Incident::orderBy('created_at','desc')->get();
        if(!is_null($incidents)) {
            return response()->json(['incidents'=>$incidents])->setStatusCode(Response::HTTP_OK);
        } else {
            return response()->json(['incidents'=>$incidents])->setStatusCode(Response::HTTP_NO_CONTENT);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->incident['title']);
        $incident = new Incident();
        $incident->title = $request->incident['title'];
        $incident->text = $request->incident['text'];
        $incident->estimated_time = $request->incident['estimated_time'];
        $incident->category_id = $request->incident['category_id'];
        $incident->priority_id = $request->incident['priority_id'];
        $incident->status_id = $request->incident['status_id'];

        $incident->user_id = $request->user()->id;
        $incident->department_id = $request->user()->department_id;

        $saved = $incident->save();
        if($saved) {
            return response()->json(['incident'=>$incident])->setStatusCode(Response::HTTP_CREATED);
        } else {
            return response()->json(['incident'=>$incident])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        if (!empty($incident)) {
            return response()->json(['incident'=>$incident])->setStatusCode(Response::HTTP_OK);
        } else {
            return response()->setStatusCode(Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        if ($incident->user->id == $request->user()->id) {
            $incident->title = $request->incident['title'];
            $incident->text = $request->incident['text'];
            $incident->estimated_time = $request->incident['estimated_time'];
            $incident->category_id = $request->incident['category_id'];
            $incident->priority_id = $request->incident['priority_id'];
            $incident->status_id = $request->incident['status_id'];

            $saved = $incident->save();
            if($saved) {
                return response()->json(['incident'=>$incident])->setStatusCode(Response::HTTP_CREATED);
            } else {
                return response()->json(['incident'=>$incident])->setStatusCode(Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(['incident'=>$request->incident])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Incident $incident)
    {
        if ($request->user()->id == $incident->user_id) {
            $deleted = $incident->delete();
            if ($deleted) {
                return response()->json(['incident'=>$incident])->setStatusCode(Response::HTTP_NO_CONTENT);
            } else {
                return response()->json(['incident'=>$incident])->setStatusCode(Response::HTTP_BAD_REQUEST);
            }
            
        } else {
            return response()->json(['incident'=>$incident])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }
}