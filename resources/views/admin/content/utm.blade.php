@extends('layouts.admin')
@section ('css')
    <style type="text/css">
        .btn-default {
            color: #333 !important;
            background-color: #fff !important;
            border-color: #ccc !important;
        }
    </style>
@endsection
@section ('title')
    UTM marks
@endsection
@section('content')
    @inject ('blocks', 'App\Models\Block')
    @inject ('marks', 'App\Models\UTM')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>UTM</h5>
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
            {{-- TABLE --}}
            <table class = "table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>UTM name</th>
                    <th>UTM value</th>
                    <th>UTM content</th>
                    <th>Block UTM is tied to</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($marks->all() as $mark)
                    <tr>
                        <td>{{ $mark->id }}</td>
                        <td>{{ $mark->utm_name }}</td>
                        <td>{{ $mark->utm_value }}</td>
                        <td>{{ $mark->content->value }}</td>
                        <td>{{ $mark->block->name }}</td>
                        <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{ 'showmark' . $mark->id }}">Show</button></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="{{ "#editmark".$mark->id }}">Edit</button></td>

                        <td><form method="post" action="{{ action('UTMController@destroy', ['mark'=>$mark->id]) }}">
                                <input type="hidden" name="_method" value="delete"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form></td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            {{-- EDIT mark --}}
            @foreach ($marks->all() as $mark)
                <div class="modal inmodal" id="{{ "editmark".$mark->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <h4 class="modal-title">Edit mark</h4>

                            </div>

                            <div class="modal-body">
                                {!! Form::open(array(
                                       'method' => 'PATCH',
                                       'action' => array('UTMController@update', $mark->id),
                                       'class' => 'form-horizontal',
                                       'enctype' => 'multipart/form-data'
                                   )) !!}
                                <div class="form-group">
                                    {!! Form::label('utm_name', 'Mark name', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::text('utm_name', $mark->utm_name, ['class' => 'form-control', 'required' => '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {!! Form::submit('Update mark', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SHOW MARK --}}
                <div class="modal inmodal" id="{{ "showmark".$mark->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <h4 class="modal-title">{{ $mark->utm_name.'='.$mark->utm_value }}</h4>
                            </div>
                            <div class="modal-body">
                                @if ($mark->content->type == 'image')
                                    <center>
                                        <img src="{{ '/'.$mark->content->value }}">
                                    </center>
                                @else
                                    {!! $mark->content->value !!}
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{-- ADD BUTTON --}}
            <div class="row">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#addmark">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>

            {{-- SAVE MODAL --}}
            <div class="modal inmodal" id="addmark" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                            <h4 class="modal-title">Add new mark</h4>

                        </div>
                        <div class="modal-body">
                            {!! Form::open(array(
                              'action' => 'UTMController@store',
                              'class' => 'form-horizontal',
                              'enctype' => 'multipart/form-data'
                            )) !!}
                            <div class="form-group">
                                {!! Form::label('utm_name', 'Mark name', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::text('utm_name', null, ['class' => 'form-control', 'required' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('utm_value', 'Mark value', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::text('utm_value', null, ['class' => 'form-control', 'required' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Content type</label>
                                <div class="col-lg-10">
                                    <select class="form-control m-b" name="type" id="type">
                                        <option value="image">image</option>
                                        <option value="input">input</option>
                                        <option value="textarea">textarea</option>
                                        <option value="code">code</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', 'Content', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10" id="content">

                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Block to tie to</label>
                                <div class="col-lg-10">
                                    <select class="form-control m-b" name="block">
                                        @foreach($blocks->all() as $block)
                                            <option value="{{ $block->id }}">{{ $block->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Save mark', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            @if (Session::has('message'))
                <input class="hidden" value="{{ Session::get('message') }}" id="message">
            @endif
            @if (Session::has('alert'))
                <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
            @endif
        </div>
    </div>

@endsection
@section ('js')
    {!! Html::script('admin/js/plugins/toastr/toastr.min.js') !!}
    {!! Html::script('js/summernote.min.js') !!}
    {!! Html::script('js/codemirror.js') !!}
    {!! Html::script('admin/js/plugins/codemirror/mode/javascript/javascript.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "10000",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            if (document.getElementById('message')) {
                toastr["success"](document.getElementById('message').value, 'Message')
            }
            if (document.getElementById('alert')) {
                toastr["error"](document.getElementById('alert').value, 'Error')
            }

            /*
             * Script for adding fields depending on how user selects the type.
             */
            var i = 0;
            var form = document.getElementById('content');
            var select = document.getElementById("type");
            if (select.value == 'input') {
                while (form.firstChild) {
                    form.removeChild(form.firstChild);
                }
                form.appendChild(document.createElement('div')).innerHTML = "<input type=\"text\" required class=\"form-control\" name='content'>";
            } else if (select.value == 'textarea') {
                while (form.firstChild) {
                    form.removeChild(form.firstChild);
                }
                form.appendChild(document.createElement('div')).innerHTML = "<textarea type=\"text\" required class=\"form-control\" name='content' id='summernote'></textarea>";
                $('#summernote').summernote({
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote
                });
            } else if (select.value == 'image') {
                while (form.firstChild) {
                    form.removeChild(form.firstChild);
                }
                form.appendChild(document.createElement('div')).innerHTML = "<label class='btn btn-success btn-file'>Browse image <input type='file' name='content' style='display: none;' ></label>";
            } else if (select.value == 'code') {
                while (form.firstChild) {
                    form.removeChild(form.firstChild);
                }
                form.appendChild(document.createElement('div')).innerHTML = "<textarea type=\"text\" required class=\"form-control\" name='content' id='codearea'></textarea>";
                var editor= CodeMirror.fromTextArea(document.getElementById("codearea"), {
                    lineNumbers: true,
                    matchBrackets: true,
                    styleActiveLine: true,
                    theme:"ambiance"
                });
            }
            //var selected_value = e.options[e.selectedIndex].value;
            select.addEventListener("change", function() {
                if (select.value == 'input') {
                    while (form.firstChild) {
                        form.removeChild(form.firstChild);
                    }
                    form.appendChild(document.createElement('div')).innerHTML = "<input type=\"text\" required class=\"form-control\" name='content'>";
                } else if (select.value == 'textarea') {
                    while (form.firstChild) {
                        form.removeChild(form.firstChild);
                    }
                    form.appendChild(document.createElement('div')).innerHTML = "<textarea type=\"text\" required class=\"form-control\" name='content' id='summernote'></textarea>";
                    $('#summernote').summernote({
                        height: 300,                 // set editor height
                        minHeight: null,             // set minimum height of editor
                        maxHeight: null,             // set maximum height of editor
                        focus: true                  // set focus to editable area after initializing summernote
                    });
                } else if (select.value == 'image') {
                    while (form.firstChild) {
                        form.removeChild(form.firstChild);
                    }
                    form.appendChild(document.createElement('div')).innerHTML = "<label class='btn btn-success btn-file'>Browse image <input type='file' name='content' style='display: none;' ></label>";
                } else if (select.value == 'code') {
                    while (form.firstChild) {
                        form.removeChild(form.firstChild);
                    }
                    form.appendChild(document.createElement('div')).innerHTML = "<textarea type=\"text\" required class=\"form-control\" name='content' id='codearea'></textarea>";
                    var editor= CodeMirror.fromTextArea(document.getElementById("codearea"), {
                        lineNumbers: true,
                        matchBrackets: true,
                        styleActiveLine: true,
                        theme:"ambiance"
                    });
                }
            });

            $('#editsummernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });
        });
    </script>
@endsection