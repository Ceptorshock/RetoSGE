<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        @if ($type === "incidents")
                            <div class="col-md-4 me-auto"><h1>{{ __('Incidencias') }}</h1></div>
                            <div class="col-md-2 ms-auto">
                                <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}" role="button">Crear Incidencia</a>
                            </div>
                        @else
                            <div class="col-md-8 me-auto">
                                <a href="{{$type}}/{{$generic->id}}"><h3>{{$generic->name}}</h3></a>    
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if ($type === "incidents")
                        @include('incidents.index_template',['incidents'=>$generic,'user'=>$user])
                    @else
                        @include('incidents.index_template',['incidents'=>$generic->incidents->take(5),'user'=>$user])
                    @endif
                    
                </div>  
            </div>
        </div>
    </div>
</div>
<p></p>