<div class="first-bg"></div>
<div class="main-screen-bg"></div>
<section class="blog wrap">
    <div class="container">
        @foreach($posts as $post)
        <div class="row block-center">
            <div class="col-xs-10 col-xs-offset-1 position-content">
                <div class="top-block">
                    <img src="{{$post->preview}}" class="img-responsive">
                </div>
                <div class="bot-block">
                    <h1>{{$post->title}}</h1>
                    <h4>{{$post->created_at}}</h4>
                    <p>{!!$post->content!!}</p>
                    <div class="share">
                        <h3>SHARE:</h3>
                    </div>
                    <div class="left-btn">
                        <button class="btn btn-default share-btn"><img src="/img/fb.png"></button>
                        <button class="btn btn-default share-btn"><img src="/img/tw.png"></button>
                        <button class="btn btn-default share-btn"><img src="/img/vk.png"></button>
                    </div>
                    <div class="right-btn">
                        <form action="{{action('HomeController@show', ['id' => $post->id])}}">
                            <button class="btn btn-primary read-more">READ MORE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-10 col-sm-offset-1 col-sm-11 search">
            <div class="btn-toolbar" role="toolbar" aria-label="...">
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn"><</button>
                </div>
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn middle-left">1</button>
                </div>
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn middle">2</button>
                </div>
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn middle">3</button>
                </div>
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn middle">4</button>
                </div>
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn middle">5</button>
                </div>
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn middle">...</button>
                </div>
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn middle-right">23</button>
                </div>
                <div class="btn-group ps-search" role="group" aria-label="">
                    <button type="button" class="btn btn-default search-btn">></button>
                </div>
            </div>
        </div>
    </div>
</section>