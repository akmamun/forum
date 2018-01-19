@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Forum Thread</div>

                    <div class="panel-body">
                     @foreach($threads as $thread)
                         <article>
                          <a href="{{$thread->path()}}">  <h4>{{$thread->title}}</h4> </a>
                            <hr>
                             <div class="body">
                                 {{$thread->body}}
                             </div>
                         </article>

                     @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <h4>Archives</h4>
                <ol class="list-unstyled">
                    @foreach($archives as $stats)
                        <li>
                            <a href="{{$thread->path()}}/?month={{$stats['month']}}&year={{$stats['year']}}">
                                {{$stats['month'] . '' . $stats['year']}}
                            </a>
                        </li>
                        @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
