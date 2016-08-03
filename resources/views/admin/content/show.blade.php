@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}

@endsection
@section ('title')
{{ $group->name  }}
@endsection
@section('content')
@inject ('Blocks', 'App\Models\Block')
@inject ('groups', 'App\Models\Group')
@foreach($group->blocks as $block)
<div class="ibox float-e-margins">
  <div class="ibox-title">
  <h5>{{ $block->name }}</h5>
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
@if ($block->content->type == 'image')
<center>
  <img src="{!! '/'.$block->content->value !!}">
</center>
@else
  {!! $block->content->value !!}
@endif
  </div>
</div>
@endforeach

     @if (Session::has('message')) 
        <input class="hidden" value="{{ Session::get('message') }}" id="message">
     @endif
     @if (Session::has('alert')) 
        <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
     @endif


@endsection

@section ('js')

 <!-- Toastr script -->
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
          "hideDuration": "1000",
          "timeOut": "7000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
   }
   if (document.getElementById('message')) {
        toastr["success"](document.getElementById('message').value, 'Message')
   }
   if (document.getElementById('alert')) {
        toastr["error"](document.getElementById('alert').value, 'Error')
   }
});
</script>


@endsection