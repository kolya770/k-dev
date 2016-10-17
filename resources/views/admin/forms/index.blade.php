@extends('layouts.admin')
@section ('title')
    All forms
@endsection
@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Forms</h5>
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
            <table class = "table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Form title</th>
                        <th>Size</th>
                        <th>Answers number</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                    <tr>
                        <td>{{ $form->id }}</td>
                        <td>{{ $form->title }}</td>
                        <td>{{ $form->size }}</td>
                        <td>{{ count($form->answers) }}
                        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{ 'modal' . $form->id }}">Show</button></td>
                        <td><a href="{{ action('FormController@edit', ['forms' => $form->id]) }}"><button class="btn btn-primary">Edit</button></a></td>
                        <td>
                            <form method="POST" action="{{ action('FormController@destroy', ['forms' => $form->id]) }}">
                                <input type="hidden" name="_method" value="delete"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                <input type="submit" id = 'delete' class="btn btn-danger" value="Delete"/>
                            </form>
                        </td>
                    </tr>
                    <div class="modal inmodal" id="{{ 'modal' . $form->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">{{ $form->title }}</h4>
                                </div>
                                <div class="modal-body">
                                    @foreach ($form->fields as $field)
                                        <p>{{ $field->question }}</p>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <input class="hidden alert" value="{{ $error }}">
        @endforeach
    @endif
    @if (Session::has('message'))
        <input class="hidden" value="{{ Session::get('message') }}" id="message">
    @endif
    @if (Session::has('alert'))
        <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
    @endif
@endsection
@section('js')
    {!! Html::script('admin/js/plugins/toastr/toastr.min.js') !!}
    <script type="text/javascript">
        $(function () {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "10000",
                "hideDuration": "10000",
                "timeOut": "70000",
                "extendedTimeOut": "10000",
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
            if (document.getElementsByClassName('alert')) {
                var x = document.getElementsByClassName('alert');
                var i;
                for (i = 0; i < x.length; i++) {
                    toastr["error"](x[i].value, 'Error');
                }
            }
        });
    </script>
@endsection