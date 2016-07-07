<section class="project-1 wrap">
    <div class="bg-holder"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1 col-xs-10 col-xs-offset-1">
                <div class="img-wrapper">
                    <img src="{{$projects->get(1)->image}}" alt="phone"/>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-0 col-xs-10 col-xs-offset-1 text-wrapper">
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

