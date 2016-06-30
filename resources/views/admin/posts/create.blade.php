@extends('layouts.admin')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

     
  
  <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Make a new post</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(array(
                            'action' => 'PostController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Post name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Post content', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
                            </div>
                        </div>
                         <div class="form-group"><label class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="category">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Create post', ['class' => 'btn btn-sm']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

@section('js')
<script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
              height:300,
            });
        });
</script>
<!--<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    jQuery(document).ready(function() {
        jQuery('#summernote').summernote({
            height: 250,
            callbacks: {
                onImageUpload: function(files, editor, $editable) {
                    alert('evoked');
                    sendFile(files[0],editor,$editable);
                }
            }
        });
        function sendFile(file,editor,welEditable) {
            data = new FormData();
            data.append("file", file);
            jQuery.ajax({
                url: "{{ URL::to('upload/image') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(s){
                    jQuery('#summernote').summernote("insertImage", s);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus+" "+errorThrown);
                }
            });
        }
    });
</script>-->

@endsection
