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
*   summary="Show incidents",
*   @OA\Response(
*       response=200,
*       description="Shows all incidents."
* ),
* @OA\Response(
*   response="default",
*   description="Error has ocurred."
*   )
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
* @OA\Post(
*   path="/api/posts",
*   summary="Create an incident",
*   @OA\Parameter(
*       name="Title",
*       in="query",
*       description="The title of the incident",
*       required=true,
*       @OA\Schema(
*           type="string"
*       )
*   ),
*   @OA\Parameter(
*       name="Text",
*       in="query",
*       description="The body of the incident",
*       required=true,
*       @OA\Schema(
*           type="string"
*       )
*   ),
*   @OA\Parameter(
*       name="Estimated Time",
*       in="query",
*       description="Estimated time of the incident",
*       required=true,
*       @OA\Schema(
*           type="string"
*       )
*   ),
*   @OA\Parameter(
*       name="Category",
*       in="query",
*       description="Category of the incident",
*       required=true,
*       @OA\Schema(
*           type="integer"
*       )
*   ),*   @OA\Parameter(
*       name="Priority",
*       in="query",
*       description="Priority of the incident",
*       required=true,
*       @OA\Schema(
*           type="integer"
*       )
*   ),
*   @OA\Parameter(
*       name="Status",
*       in="query",
*       description="Status of the incident",
*       required=true,
*       @OA\Schema(
*           type="integer"
*       )
*   ),
*   @OA\Response(
*       response=200,
*       description="successful operation",
*       @OA\JsonContent(
*           type="string"
*       ),
*   ),
*   @OA\Response(
*       response=401,
*       description="Unauthenticated"
*   ),
*   security={
*       {"bearerAuth": {}}
*   }
* )
*/

    public function store(Request $request)
    {
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
* @OA\Get(
*   path="/api/posts/{id}",
*   summary="Shows one incident",
*   @OA\Parameter(
*       name="id",
*       description="Incident id",
*       required=true,
*       in="path",
*       @OA\Schema(
*           type="integer"
*       )
*   ),
*   @OA\Response(
*       response=200,
*       description="Shows Incident."
*   ),
*   @OA\Response(
*       response="default",
*       description="Ha ocurrido un error."
*   )
* )
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
* @OA\Put(
*   path="/api/posts/{id}",
*   summary="Mostrar un post concreto",
*   @OA\Parameter(
*       name="id",
*       description="Project id",
*       required=true,
*       in="path",
*       @OA\Schema(
*           type="integer"
*       )
*   ),
*   @OA\Response(
*       response=200,
*       description="Mostrar el post especificado."
*   ),
*   @OA\Response(
*       response="default",
*       description="Ha ocurrido un error."
*   )
* )
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
