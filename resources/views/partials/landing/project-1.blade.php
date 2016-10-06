<div class="project-1 my-works wrap">
    <div class="bg-holder"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-7">
                <div class="my-work-block-1">
                    <a class="title-about visible-xs visible-sm" href="{{action('PortfolioController@show',['id'=>$projects[1]->id])}}">
                        {{$projects[1]->title}}
                    </a>
                    <a href="{{action('PortfolioController@show',['id'=>$projects[1]->id])}}">
                        <img class="project-img" src="/img/browser_phone.png" alt="Project preview"/>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-5">
                <div class="about-project">
                    <a class="title-about hidden-xs hidden-sm" href="{{action('PortfolioController@show',['id'=>$projects[1]->id])}}">
                        {{$projects[1]->title}}
                    </a>
                    <p>
                        {{$projects[1]->brief}}
                    </p>
                    <a href="{{action('PortfolioController@show',['id'=>$projects[1]->id])}}" class="border-btn-pro">VIEW PROJECT</a>
                </div>
            </div>
        </div>
    </div>
</div>

