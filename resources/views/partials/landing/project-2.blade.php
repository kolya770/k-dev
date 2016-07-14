<section class="project-2 wrap">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-5 col-xs-10 col-xs-offset-1 text-wrapper">
                <h3>{{$projects[2]->title}}</h3>
                <p>
                    {{$projects[2]->brief}}
                </p>
                <form action="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                <button class="border-btn">VIEW PROJECT</button>
                </form>
            </div>
            <div class="col-sm-5 col-xs-10 col-xs-offset-1">
                    <img style="width:100%;" src="{{$projects[2]->images[0]->path}}" alt="browser"/>
                   
                
            </div>
        </div>
    </div>
</section>
