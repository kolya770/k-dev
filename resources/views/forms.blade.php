<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kiev-dev admin</title>

    {!! Html::style('admin/css/all.css') !!}

</head>
    <body>
@inject ('forms', 'App\Models\Form')
 <div id="page-wrapper" class="gray-bg">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>
                        Forms
                    </h2>
                    
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
@foreach ($forms->all() as $form)
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Basic form <small>Answer our form!</small></h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-12 b-r">
                <h3 class="m-t-none m-b"> {!! $form->title !!}</h3>
               
                {!! Form::open(array(
                    'action' => 'FormAnswerController@store',
                    'class' => 'form-basic',
                    'enctype' => 'multipart/form-data'

                    )) !!}
                    @foreach ($form->fields as $field)
                    <div class="form-group">
                        <label>{!! $field->question !!}</label>
                        {!! Form::textarea('field' . $field->id, null, ['class' => 'form-control', 'rows'=>'3']) !!}
                        
                    </div>
                    @endforeach
                    {!! Form::text('size', $form->size, ['class' => 'hidden']) !!}
                     {!! Form::text('title', $form->title, ['class' => 'hidden']) !!}
                     {!! Form::text('form_id', $form->id, ['class' => 'hidden']) !!}
                    <div class="form-group">
                        <div class="col-lg-offset-10 col-lg-2">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-lg']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div> 
        </div>
    </div>
</div>

@endforeach
</div>
</div>
<div class="footer">
    <div>
        <strong>Copyright</strong> Kievdev &copy; 2016
    </div>
</div>
</div>

<!-- Mainly scripts -->
{!! HTML::script('admin/js/jquery-2.1.1.js') !!}
{!! HTML::script('admin/js/bootstrap.min.js') !!}
{!! HTML::script('admin/js/plugins/metisMenu/jquery.metisMenu.js') !!}
{!! HTML::script('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}
    <!-- Custom and plugin javascript -->
{!! HTML::script('admin/js/inspinia.js') !!}
{!! HTML::script('admin/js/plugins/pace/pace.min.js') !!}

</body>

</html>