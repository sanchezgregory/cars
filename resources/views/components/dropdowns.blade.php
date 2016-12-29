@extends('layout')

@section('content')

    <h1>Select Dependientes </h1>

    {!! Form::open(['class' => 'form']) !!}
        {!! Field::select('make_id', Cars\Models\Make::pluck('name','id')->toArray()) !!}
        {!! Field::select('makeyear_id', \Cars\Models\MakeYear::pluck('year','id')->toArray()) !!}
        {!! Field::select('model_id', Cars\Models\Model::pluck('name', 'id')->toArray()) !!}
    {!! Form::close() !!}

@endsection