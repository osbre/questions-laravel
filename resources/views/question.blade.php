@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-md-auto">
            <div class="card">
                {{--<div class="card-header"></div>--}}
                <div class="card-body">
                    @forelse ($question as $data)
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 id='text_answer' class='text-xs-center' style="text-align: center;">
                                    <!--<strong>Запитання 1 з {{ $count_answers }}.</strong>-->
                                    {{ $data->title }}
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($answers_data as $answer)
                                @if($answer->id == $correct_answer)
                                    @if($isEndQuestion)
                                        <answer @click.native="final(
                                                        '{{ $final_text }}',
                                                        '{{$next_questions_url}}'
                                                              )" text='{{ $answer->text }}'></answer>
                                    @else
                                        <answer @click.native="correct_question('','{{$next_questions_url}}')" text='{{ $answer->text }}'></answer>
                                    @endif
                                @else
                                    <answer @click.native="wrong_question('{{ $data->title}}')" text='{{ $answer->text }}'></answer>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @empty
                        <p>
                            <h2 class='text-center'>Вибачте, питання не знайдено</h2>
                            <p class='lead'><a href='{{ route('quests') }}' class='btn btn-outline-info btn-block'>Знайти нові квести</a></p>
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection