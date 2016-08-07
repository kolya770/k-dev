<section class="project-1 wrap">
    <div class="bg-holder"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-xs-10 col-xs-offset-1">
                <a href="{{action('PortfolioController@show',['id'=>$projects[1]->id])}}">
                    <img src="/img/browser_phone.png" alt="phone"/>
                </a>   
               
            </div>
            <div class="col-sm-5 col-xs-10 col-xs-offset-1 text-wrapper">
            <a href="{{action('PortfolioController@show',['id'=>$projects[1]->id])}}">
                <h3>{{$projects[1]->title}}</h3>
            </a>
                <p>
                    {{$projects[1]->brief}}
                </p>
                <a href="{{action('PortfolioController@show',['id'=>$projects[1]->id])}}">
                <button class="border-btn">VIEW PROJECT</button>
                </a>
            </div>
        </div>
    </div>
</section>

