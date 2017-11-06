@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-md-auto">
            <div class="card">
                <div class="card-header">You quests</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse ($user_quests as $quest)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>{{ $quest->name }}</h4>
                                </div>
                                <div class="col-sm-5 lead">
                                    {{ $quest->description }}
                                </div>
                                <div class="col-lg-3">
                                    <a href='{{ route('quest.id',['id' => 4]) }}' class='btn btn-success btn-lg btn-block '>
                                        Again start quest!
                                    </a>
                                </div>
                            </div>
                        </li>
                    @empty
                        <p>
                            <h2 class='text-center'>You don't have passed quests :)</h2>
                            <p class='lead'><a href='{{ route('quests') }}' class='btn btn-outline-info btn-block'>Find new quests to go</a></p>
                        </p>
                    @endforelse
                    {{ $user_quests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
