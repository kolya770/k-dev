@extends('layouts.admin')
@section ('title')
    All categories
@endsection
@section('content')
    @inject ('categories', 'App\Models\Category')
    <div class="ibox float-e-margins col-lg-6">
        <div class="ibox-title">
            <h5>All categories</h5>
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
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories->all() as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td><a href="{{action('CategoriesController@edit',['categories'=>$category->id])}}"><button class="btn btn-primary">Edit</button></a></td>
                            <td>
                                <form method="POST" action="{{action('CategoriesController@destroy',['categories'=>$category->id])}}">
                                    <input type="hidden" name="_method" value="delete"/>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                            </td>
                        </tr>
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