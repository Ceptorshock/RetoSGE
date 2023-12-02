<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">    
                        <div class="col-md-8 me-auto">
                            <a href="{{$type}}/{{$generic->id}}"><h3>{{$generic->name}}</h3></a>    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('incidents.index_template',['incidents'=>$generic->incidents->take(5),'user'=>$user])
                </div>  
            </div>
        </div>
    </div>
</div>
<p></p>