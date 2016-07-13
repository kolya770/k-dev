<section class="project-2 wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1 col-md-push-5 col-xs-10 col-xs-offset-1">
                <div class="img-wrapper">
                    <img src="{{$projects->get(2)->images[0]->path}}" alt="browser"/>
                   
                </div>
            </div>
            <div class="col-md-5 col-md-offset-0 col-md-pull-5 col-xs-10 col-xs-offset-1 text-wrapper">
                <h3>{{$projects->get(2)->title}}</h3>
                <p>
                    {{$projects->get(2)->brief}}
                </p>
                <form action="{{action('PortfolioController@show',['id'=>$projects->get(2)->id])}}">
                <button class="border-btn">VIEW PROJECT</button>
                </form>
            </div>
        </div>
    </div>
</section>
