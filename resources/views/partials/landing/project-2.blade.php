<div class="project-2 my-works wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-7 col-md-push-5">
                <div class="my-work-block-1">
                    <a class="title-about visible-xs visible-sm" href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                        {{$projects[2]->title}}
                    </a>
                    <a href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                        <img class="project-img" src="/img/project-photo.png" alt="Project preview"/>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-md-pull-7">
                <div class="about-project">
                    <a class="title-about hidden-xs hidden-sm" href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}">
                        {{$projects[2]->title}}
                    </a>
                    <p>
                        {{$projects[2]->brief}}
                    </p>
                    <a href="{{action('PortfolioController@show',['id'=>$projects[2]->id])}}" class="border-btn-pro">VIEW PROJECT</a>
                </div>
            </div>
        </div>
    </div>
</div>
