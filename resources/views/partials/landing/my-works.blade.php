<div id="works">
<section class="my-works wrap">
    <div class="container">
        <div class="row">
            <h1 class="title"><a href="/portfolio/">PORTFOLIO</a></h1>
        </div>
        <div class="row">
            <div class="col-md-5 col-md-offset-1 col-md-push-5 col-xs-10 col-xs-offset-1">
                <div class="img-wrapper">
                    <img src="{{$projects->get(0)->image}}" alt="preview"/>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-0 col-md-pull-5 col-xs-10 col-xs-offset-1 text-wrapper">
                <h3>{{$projects->get(0)->title}}</h3>
                <p>
                {{$projects->get(0)->brief}}
                </p>
                <form action="{{action('PortfolioController@show',['id'=>$projects->get(0)->id])}}">
                <button class="border-btn">VIEW PROJECT</button>
                </form>
            </div>
        </div>
    </div>
</section>
</div>