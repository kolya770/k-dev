<div class="first-bg"></div>
<div class="main-screen-bg"></div>
<section class="portfolio wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class>PORTFOLIO</h1>
            </div>
        </div>
        <div class="block-center">
            @foreach (array_chunk($projects->get()->all(), 3) as $row)
                <div class="row">
                    @foreach ($row as $project)
                    <div class="col-sm-4 position-portfolio">
                        <a href="{{action('PortfolioController@show',['id'=>$project->id])}}">
                            <div class="top-block">
                                 <img src="{{ $mainImages[$project->id] }}" alt="">
                            </div>
                            <div class="bot-block">
                                <h1>{{$project->title}}</h1>
                                <p>{{$project->brief}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>