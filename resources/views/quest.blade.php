@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-md-auto">
            <div class="card">
                {{--<div class="card-header"></div>--}}
                <div class="card-body">
                    @forelse ($quest as $data)
                        <aside>
                            <div class="container">
                                <div class="row">
                                <div class="col-xs-12">
                                    <div class="progres-bar">
                                    <a href="index.html" class="btn btn-success btn-md">1</a>
                                    <a href="youth-day2.html" class="btn btn-success btn-md">2</a>
                                    <a href="youth-day3.html" class="btn btn-success btn-md">3</a>
                                    <a href="youth-day4.html" class="btn btn-success btn-md">4</a>
                                    <a href="youth-day5.html" class="btn btn-success btn-md">5</a>
                                    <a href="youth-day6.html" class="btn btn-success btn-md">6</a>
                                    <a href="youth-day7.html" class="btn btn-primary btn-md">7</a>
                                    <a href="" class="btn btn-danger btn-md">8</a>
                                    <a href="" class="btn btn-danger btn-md">9</a>
                                    <a href="" class="btn btn-danger btn-md">10</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </aside>
                        <p>
                            <h2 class='text-center'>{{ $data->name }}</h2>
                            <p class='lead text-center'>{!! $data->description !!}</p>
                            <a href='{{ route('question.id', ['id' => $question_id]) }}' class='btn btn-outline-success btn-lg btn-block'>Start quest!</a>
                        </p>
                    @empty
                        <p>
                            <h2 class='text-center'>Вибачте, квест не знайдено(</h2>
                            <p class='lead'><a href='{{ route('quests') }}' class='btn btn-outline-info btn-block'>Знайти нові квести</a></p>
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
