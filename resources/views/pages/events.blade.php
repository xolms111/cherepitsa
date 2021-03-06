@extends('layouts.index')
@section('meta')
    <title>{{$meta->title}}</title>
    <meta name="description" content="{{$meta->description}}">
    <meta name="keywords" content="{{$meta->keywords}}">
@endsection
@section('content')
    <section class="bloghome">
        <div class="container">
            <div class="row">
                @if(count($events) > 0)
                    <h1 class="home-title">Акции</h1>
                @else
                    <h1 class="home-title">На данный момент акции не проводятся</h1>
                @endif
                @foreach($events as $item)
                    <div class="col-sm-4" style="margin-bottom: 30px;">
                        <div class="inner">
                            <figure class="w-thumb">
                                <img src="{{$item->img}}" alt="{{$item->title}}">
                            </figure>
                            <div class="entry-header">
                                <h2 class="post-title entry-title">
                                    {{$item->title}}
                                </h2>
                            </div><!-- end entry-header -->
                            <div class="entry-content">
                                <p>
                                    {!! $item->text !!}
                                </p>
                                <p>
                                    <strong>Дата окончания: {{$item->date_end}}</strong>
                                </p>

                            </div><!-- entry-content -->
                        </div><!-- end inner -->
                    </div><!-- end column -->
                @endforeach

            </div><!-- end row -->
        </div>
    </section><!-- end blog -->

@endsection