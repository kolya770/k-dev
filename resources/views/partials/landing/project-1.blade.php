<section class="project-1 wrap">
    <div class="bg-holder"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-xs-10 col-xs-offset-1">
                
                    <img src="{{$projects->get(1)->images[0]->path}}" alt="phone"/>
                    
               
            </div>
            <div class="col-sm-5 col-xs-10 col-xs-offset-1 text-wrapper">
                <h3>{{$projects->get(1)->title}}</h3>
                <p>
                    {{$projects->get(1)->brief}}
                </p>
                <form action="{{action('PortfolioController@show',['id'=>$projects->get(1)->id])}}">
                <button class="border-btn">VIEW PROJECT</button>
                </form>
            </div>
        </div>
    </div>
</section>

