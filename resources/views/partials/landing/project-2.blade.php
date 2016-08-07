<section class="project-2 wrap">
    <div class="container">
        <div class="row hidden-xs">
            
            <div class="col-sm-5 col-xs-10 col-xs-offset-1 text-wrapper">
            <a href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                <h3>{{$projects[2]->title}}</h3>
            </a>
                <p>
                    {{$projects[2]->brief}}
                </p>
                <a href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                <button class="border-btn-pro">VIEW PROJECT</button>
                </a>
            </div>
            <div class="col-sm-5 col-xs-10 col-xs-offset-1">
            <a href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                    <img style="width:100%;" src="/img/browser_phone.png" alt="browser"/>
            </a>
                
            </div>
        </div>
        <div class="row visible-xs">
            
            <div class="col-xs-10 col-xs-offset-1 text-wrapper">
                <div class="row">
                    <a href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                        <h3>{{$projects[2]->title}}</h3>
                    </a>
                </div>
                <div class="row">
                    <a href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                            <img style="width:100%;" src="/img/browser_phone.png" alt="browser"/>
                    </a>
                </div>
                <div class="row">
                    <p>
                        {{$projects[2]->brief}}
                    </p>
                </div>
                <div class="row" style="text-align:center;">
                   
                        <a href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                        <button class="border-btn-pro">VIEW PROJECT</button>
                        </a>
                  
                </div>
            </div>
            
        </div>
    </div>
</section>
