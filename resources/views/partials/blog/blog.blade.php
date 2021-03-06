<div class="first-bg"></div>
<div class="main-screen-bg"></div>
<section class="blog wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-1">
                <div class="row">
                    @if(count($posts) > 0)
                    @foreach($posts as $post)
                    <div class = "col-xs-12">
                        <div class="block-center">
                            <div class="top-block">
                                <img src="{{'/'.$post->preview}}" class="img-responsive" alt="">
                            </div>
                            <div class="bot-block">
                                <h1>{{$post->title}}</h1>
                                {{--<h4>{{$post->created_at}}</h4>--}}
                                <p>{!!$post->content!!}</p>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="share">
                                            <h3>SHARE:</h3>
                                        </div>
                                        <div class="left-btn">
                                            <button class="btn btn-default share-btn"><img src="/img/fb.png" alt=""></button>
                                            <button class="btn btn-default share-btn"><img src="/img/tw.png" alt=""></button>
                                            <button class="btn btn-default share-btn"><img src="/img/vk.png" alt=""></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="right-btn">
                                            <form action="{{action('HomeController@show', ['id' => $post->id])}}">
                                                <button class="btn btn-primary read-more">READ MORE</button>
                                            </form>
                                        </div>
                                    </div>
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
            </div>

            <div class="col-sm-3 position-block">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 side-block">
                        <h3>Tags</h3>
                        @foreach ($tags->all() as $tag)
                            <a href="{{action('TagController@find', ['tags' => $tag->id])}}" class="t-button">{{$tag->tag_name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 side-block">
                        <h3>Categories</h3>
                        @foreach ($categories->all() as $category)
                            <a href="{{action('CatPageController@find', ['categories' => $category->id])}}" class="t-button">{{$category->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-10 col-sm-offset-1 col-sm-11 search">
                {!! with(new App\Models\Pagination($posts))->render() !!}
            </div>
        </div>
    </div>
</section>