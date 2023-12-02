<?php

use App\Models\Incident;

class IncidentController extends Controller{
    public function index(){
        $incidents = Incident::orderBy('created_at');
        return view('incidents.index',['incidents' => $incidents]);
    }
}