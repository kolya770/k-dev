<div class="first-bg"></div>
<div class="main-screen-bg"></div>
<section class="blog wrap">
    <div class="container">
        <div class="row">
        <div class = "col-sm-8 col-sm-offset-1">
        @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="row block-center">

            <div class="position-content">
                <div class="top-block">
                    <img src="{{'/'.$post->preview}}" class="img-responsive">
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
            @else
            <div class="block-center">
            <div class="position-content">
            <div class="no-posts">
            <h3>Unfortunately, no posts yet!</h3>
            </div>
            </div>
            </div>
            @endif
        </div>

        <div class="col-sm-3 position-block">
            <div class="row">
                <div class="side-block">
                    <h3>Tags</h3>
                    @foreach ($tags as $tag) 
                    <a href="{{action('TagController@find', ['tags' => $tag->id])}}">
                    <button class="btn btn-primary t-button">{{$tag->tag_name}}</button>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="side-block">
                    <h3>Categories</h3>
                    @foreach ($categories as $category)
                    <a href="{{action('CatPageController@find', ['categories' => $category->id])}}">
                    <button class="btn btn-primary t-button">{{$category->title}}</button>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
        
         

        <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-10 col-sm-offset-1 col-sm-11 search">
            {!! with(new App\Models\Pagination($posts))->render() !!} 
        </div>
    </div>
</section>