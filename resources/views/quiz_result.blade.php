<x-app-layout>
    <x-slot name="header">Result of {{$quiz->title}} Quiz
    </x-slot>

    <div class="card">
        <div class="card-body">

            <h3 class="text-success" style="margin: 5px 0px 15px 0px;">Your Score: <strong>{{$quiz->my_result->point}}</strong></h3>
            <div class="alert bg-light">
                <i class="fa fa-circle text-danger"> Your Selection</i><br>
                <i class="fa fa-check text-success"> Correct Answer </i>
            </div>


            <p class="card-text">
                @csrf
                @foreach($quiz->questions as $question)


                @if($question->correct_answer ==$question->my_answer->answer)
                <i class="fa fa-check text-success"></i>
                @else
                <i class="fa fa-times text-danger"></i>
                @endif
                <strong>#{{$loop->iteration}}.
                </strong>{{$question->question}}
                @if($question->image)
                <img src="{{asset($question->image)}}" style="margin: 10px 0px 10px 0px;width:50%" class="img-responsive">
                @endif
            <div class="form-check" style="margin: 10px 0px 0px 0px;">
                @if('answer1' == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
                @elseif('answer1' ==
                $question->my_answer->answer)
                <i class="fa fa-circle text-danger"></i>
                @endif
                <input class="form-check-input" disabled type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="answer1" required>
                <label class="form-check-label" for="quiz{{$question->id}}1">
                    {{$question->answer1}}
                </label>
            </div>
            <div class="form-check">
                @if('answer2' == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
                @elseif('answer2' ==
                $question->my_answer->answer)
                <i class="fa fa-circle text-danger"></i>
                @endif
                <input class="form-check-input" disabled type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="answer2" required>
                <label class="form-check-label" for="quiz{{$question->id}}2">
                    {{$question->answer2}}
                </label>
            </div>
            <div class="form-check">
                @if('answer3' == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
                @elseif('answer3' ==
                $question->my_answer->answer)
                <i class="fa fa-circle text-danger"></i>
                @endif
                <input class="form-check-input" disabled type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="answer3" required>
                <label class="form-check-label" for="quiz{{$question->id}}3">
                    {{$question->answer3}}
                </label>
            </div>
            <div class="form-check">
                @if('answer4' == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
                @elseif('answer4' ==
                $question->my_answer->answer)
                <i class="fa fa-circle text-danger"></i>
                @endif
                <input class="form-check-input" disabled type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="answer4" required>
                <label class="form-check-label" for="quiz{{$question->id}}4">
                    {{$question->answer4}}
                </label>
            </div>
            <small>This question was answered correctly <strong>% {{$question->true_percent}}</strong> of the time.</small>

            @if(!$loop->last)
            <hr>
            @endif

            @endforeach

            </p>

        </div>
    </div>
</x-app-layout>