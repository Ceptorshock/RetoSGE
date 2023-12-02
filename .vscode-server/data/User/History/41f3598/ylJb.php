<?php

use App\Models\Incident;

class IncidentController extends Controller{
    public function index(){
        $incidents = Incident::orderBy('created_at');
    }
}