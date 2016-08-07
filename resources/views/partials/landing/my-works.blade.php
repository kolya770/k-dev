<div id="works">
<section class="my-works wrap">
    <div class="container">
        <div class="row">
            <h5 class="title">MY WORKS</h1>
        </div>
        <div class="row see-more">
            <h3>
                <div class="see col-sm-offset-3 col-sm-3">
                WANT TO SEE MORE?   
                </div>
                <div class="col-sm-3">
                    <a href="/portfolio/">VIEW ALL WORKS</a>
                </div>
            </h3>
        </div>
        <div class="row hidden-xs">
        <div class="col-sm-5 col-xs-10 col-xs-offset-1 text-wrapper">
                <a href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                    <h3>{{$projects[0]->title}}</h3>
                </a>
                <p>
                {{$projects[0]->brief}}
                </p>
                <a href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                <button class="border-btn-pro">VIEW PROJECT</button>
                </a>
            </div>
            <div class="hidden-xs col-sm-5 col-xs-10 col-xs-offset-1">
                <a href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                    <img style="width:100%;" src="/img/browser_phone.png" alt="Project preview"/>
                </a>
            </div>
            
        </div>
        <div class="row visible-xs">
            <div class="col-xs-10 col-xs-offset-1 text-wrapper">
                <div class="row">
                        <a href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                            <h3>{{$projects[0]->title}}</h3>
                        </a>
                </div>
                <div class="row">
                        <a class="visible-xs" href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                            <img style="width:100%;" src="/img/browser_phone.png" alt="Project preview"/>
                        </a>
                </div>
                <div class="row">
                        <p>
                        {{$projects[0]->brief}}
                        </p>
                </div>
                <div class="row" style="text-align:center;">
                
                        <a href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                        <button class="border-btn-pro">VIEW PROJECT</button>
                        </a>
            
                </div>
            </div>
        </div>
    </div>
</section>
</div>