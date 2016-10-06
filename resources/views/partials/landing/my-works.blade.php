<div id="works">
<section class="my-works wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="title">MY WORKS</h2>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h2 class="see">WANT TO SEE MORE?</h2>
            </div>
            <div class="col-xs-12 col-sm-6">
                <a href="/portfolio/" class="see view-blocks">VIEW ALL WORKS</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-7 col-md-push-5">
                <div class="my-work-block-1">
                    <a class="title-about visible-xs visible-sm" href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                        {{$projects[0]->title}}
                    </a>
                    <a href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                        <img class="project-img" src="/img/project-photo.png" alt="Project preview"/>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-md-pull-7">
                <div class="about-project">
                    <a class="title-about hidden-xs hidden-sm" href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}">
                        {{$projects[0]->title}}
                    </a>
                    <p>
                        {{$projects[0]->brief}}
                    </p>
                    <a href="{{action('PortfolioController@show',['id'=>$projects[0]->id])}}" class="border-btn-pro">VIEW PROJECT</a>
                </div>
            </div>
        </div>
    </div>
</section>
</div>