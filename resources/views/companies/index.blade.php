@extends('layouts.app')

@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading"> List Company </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($companies as $item)
                        <li class="list-group-item"><a href="/company/{{ $item->id }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection