<div id="works">
<section class="my-works wrap">
    <div class="container">
        <div class="row">
            <h5 class="title">MY WORKS</h1>
        </div>
        <div class="row see-more">
            <h3>
                <div class="col-sm-offset-3 col-sm-3">
                WANT TO SEE MORE?   
                </div>
                <div class="col-sm-3">
                    <a href="/portfolio/">VIEW ALL WORKS</a>
                </div>
            </h3>
        </div>
        <div class="row">
        <div class="col-sm-5 col-xs-10 col-xs-offset-1 text-wrapper">
                <h3>{{$projects[0]->title}}</h3>
                <p>
                {{$projects[0]->brief}}
                </p>
                <form action="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                <button class="border-btn">VIEW PROJECT</button>
                </form>
            </div>
            <div class="col-sm-5 col-xs-10 col-xs-offset-1">
                
                    <img style="width:100%;" src="/img/browser_phone.png" alt="Project preview"/>
              
            </div>
            
        </div>
    </div>
</section>
</div>