@extends('layouts.admin')
@section ('title')
Form answers
@endsection
@section('content')

@foreach ($formAnswers as $answer)
<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{!! $answer->title !!} 
                        
                        <small> User: {!! $answer->user->name !!}</small>

                        </h5>
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
                       @foreach ($answer->fields as $field)
                           <p>
                              <h5><b>{!! $field->field->question !!}</b></h5>
                           </p>
                           <p>
                              {!! $field->answer !!}
                           </p>
                        @endforeach   
                    </div>
                </div>
@endforeach
@endsection