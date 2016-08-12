<div class="first-bg"></div>
<div class="main-screen-bg"></div>
<section class="post wrap">
    <div class="container">
        <div class="row block-center">
            <div class="col-sm-8 col-sm-offset-1 position-content">
                
                <div class="top-block">
                    <img src="{{'/'.$post->preview}}">
                </div>
                <div class="bot-block">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>{{$post->title}}</h1>
                            <h4>{{$post->created_at}}</h4>
                            <p>
                            {!! $post->content !!}
                            </p><hr/>
                            <div class="col-xs-12 col-sm-4 share-block">
                                <div class="share">
                                    <h3>SHARE:</h3>
                                </div>
                                <div class="left-btn">
                                    <button class="btn btn-default share-btn">
                                        <img src="/img/fb.png">
                                    </button>
                                    <button class="btn btn-default share-btn">
                                        <img src="/img/tw.png">
                                    </button>
                                    <button class="btn btn-default share-btn">
                                        <img src="/img/vk.png">
                                    </button>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 right-block">
                                <div class='tags'>
                                    <h3>TAGS:</h3>
                                </div>
                                 <div class="right-btn">
                                    @foreach ($post->tags as $tag)
                                    <a href="{{action('TagController@find', ['tags' => $tag->id])}}">
                                    <button class="btn btn-primary small-button">{{$tag->tag_name}}</button>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <hr/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="comments" id="comments">
                        <h1>COMMENTS</h1>
                        
                        @if (count($post->comments)>0)
                        @foreach($post->comments as $comment)
                        <hr/>
                        <div class="row">
                            <div class="col-sm-3 col-md-2 avatar">
                                <img src="/img/avatar.png">
                            </div>
                            <div class="col-sm-7 col-md-8">
                                <div class="date">
                                    {{$comment->created_at}}
                                </div>
                                <div class="name">
                                    <h3>{{$comment->name}}</h3>
                                </div>
                                <div class="content">
                                    {{$comment->comment}}
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <a href="#leave-comment">
                                <button class="btn btn-primary small-button">REPLY</button>
                                </a>
                                @if (Auth::check())
                                @if (Auth::User()->is('root'))
                                <form method="POST" action="{{action('CommentController@destroy', ['comments'=>$comment->id])}}">
                                <input type="hidden" name="_method" value="delete"/>
                                {{csrf_field()}}
                                <input type="submit" class='btn btn-primary small-button' value="DELETE">
                                </form>
                                @endif
                                @endif
                            </div>

                        </div>
                        
                        @endforeach
                        @else
                        <div class="row no-comments">
                        No comments yet. You can be the first!
                        </div>
                        @endif
                    </div>
                    <hr/>
                    <div class="leave-comment" id="leave-comment">
                        <h1>LEAVE A COMMENT</h1>
                        {!! Form::open(array(
                            'action' => 'CommentController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Your name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <input name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <input name="email" type="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('comment', 'Comment', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <textarea name="comment"  class="form-control" required>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Add comment', ['class' => 'btn center-button']) !!}
                            </div>
                        </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        {!! Form::close() !!}

                    </div>
                </div>
                
            </div>
            <div class="col-sm-3 position-block">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 side-block">
                    <h3>Tags</h3>
                    @foreach ($tags->all() as $tag) 
                    <a href="{{action('TagController@find', ['tags' => $tag->id])}}">
                    <button class="btn btn-primary t-button">{{$tag->tag_name}}</button>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 side-block">
                    <h3>Categories</h3>
                    @foreach ($categories->all() as $category)
                    <a href="{{action('CatPageController@find', ['categories' => $category->id])}}">
                    <button class="btn btn-primary t-button">{{$category->title}}</button>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</section>