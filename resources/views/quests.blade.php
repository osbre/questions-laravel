@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card card-default">
                <div class="card-header">Quests list!</div>

                <div class="card-body">
                    <ul class="list-group">
                    @foreach($quests as $quest)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">
                                    <h4>{{ $quest->name }}</h4>
                                </div>
                                <div class="col-sm lead">
                                    {{ $quest->description }}
                                </div>
                                <div class="col-sm">
                                    <a href='{{ route('quest.name',['name' => 'test']) }}' class='btn btn-info btn-lg'>Start quest!</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                    {!! $quests->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
