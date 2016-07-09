<div class="first-bg"></div>
<div class="main-screen-bg"></div>
<section class="post wrap">
    <div class="container">
        <div class="row block-center">
            <div class="col-xs-10 col-xs-offset-1 position-content">
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
                                    <button class="btn btn-primary small-button">{{$tag->tag_name}}</button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <hr/>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1>MORE POSTS</h1>
                    </div>
                    <div class="photo-img">
                        <img src="/img/post-photo.png" alt="">
                    </div>
                    <div class="show-more">
                        <h4>September 7, 2015</h4>
                        <h1>POST NAME</h1>
                        <p>Lorem ipsum dolar sit amet, conse ctetur aclipising elit.
                           Lorem ipsum dolar sit amet, conse ctetur aclipising elit
                           Lorem ipsum dolar sit amet, conse ctetur aclipising elit
                        </p><hr/>
                    </div>
                    <div class="photo-img">
                        <img src="/img/post-photo.png" alt="">
                    </div>
                    <div class="show-more">
                        <h4>September 7, 2015</h4>
                        <h1>POST NAME</h1>
                        <p>Lorem ipsum dolar sit amet, conse ctetur aclipising elit.
                            Lorem ipsum dolar sit amet, conse ctetur aclipising elit
                            Lorem ipsum dolar sit amet, conse ctetur aclipising elit
                        </p><hr/>
                    </div>
                    <div class="photo-img">
                        <img src="/img/post-photo.png" alt="">
                    </div>
                    <div class="show-more">
                        <h4>September 7, 2015</h4>
                        <h1>POST NAME</h1>
                        <p>Lorem ipsum dolar sit amet, conse ctetur aclipising elit.
                            Lorem ipsum dolar sit amet, conse ctetur aclipising elit
                            Lorem ipsum dolar sit amet, conse ctetur aclipising elit
                        </p>
                        <button class="btn center-button">SHOW MORE</button>
                        <hr/>
                    </div>
                    <div class="comments">
                        <h1>COMMENTS</h1>
                        <hr/>
                        @if (count($post->comments)>0)
                        @foreach($post->comments as $comment)
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="/img/avatar.png">
                            </div>
                            <div class="col-sm-8">
                                <div class="row date">
                                    {{$comment->created_at}}
                                </div>
                                <div class="row name">
                                    <h3>{{$comment->name}}</h3>
                                </div>
                                <div class="row content">
                                    {{$comment->comment}}
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary small-button">REPLY</button>
                            </div>

                        </div>
                        <hr/>
                        @endforeach
                        @else
                        <div class="row no-comments">
                        No comments yet. You can be the first!
                        </div>
                        @endif
                    </div>
                    <hr/>
                    <div class="leave-comment">
                        <h1>LEAVE A COMMENT</h1>
                        {!! Form::open(array(
                            'action' => 'CommentController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Your name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('comment', 'Comment', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
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
        </div>
    </div>
</section>