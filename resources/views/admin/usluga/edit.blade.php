@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Обновить {{$usluga->name}}</h3>
        </div>
        {{Form::open(array('route' => array('usluga.update', $usluga->id), 'files' => true, 'method' => 'patch'))}}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('alias', 'Alias вводить можно на русском языке с пробелами должно быть уникально')}}
                {{Form::text('alias', $usluga->alias , array('placeholder' => 'Alias', 'id' => 'alias', 'class' => 'form-control', 'maxlength' => '60', 'minlength' => '6'))}}
            </div>
            <div class="form-group">
                {{Form::label('name', 'Имя услуги')}}
                {{Form::text('name', $usluga->name , array('placeholder' => 'Имя услуги', 'id' => 'name', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $usluga->title , array('placeholder' => 'Заголовок', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $usluga->description , array('placeholder' => 'Description', 'id' => 'title', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('bg', 'Изображение')}}
                {{Form::file('bg', '' , array('id' => 'bg', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('price', 'Прайс')}}
                {{Form::file('price', '' , array('id' => 'price', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('small_text', 'Текст для главной')}}
                {{Form::textarea('small_text', $usluga->small_text , array('id' => 'small_text', 'class' => 'form-control', 'rows' => '4'))}}
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Текст
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    {{Form::textarea('text', $usluga->text , array('id' => 'textarea', 'class' => 'textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'))}}
                </div>
            </div>

        </div>
        <div class="box-footer">
            {{Form::submit('Обновить услугу', array('class' => 'btn btn-primary')) }}
            {{Form::close()}}



        </div>
        <!-- /.box-body -->

        </form>
    </div>
@endsection