<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quiz->my_rank)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="text-success"><b>Your Rank</b></span>
                            <span class="badge bg-success text-wrap">{{$quiz->my_rank}}</span>
                        </li>
                        @endif

                        @if($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Score
                            <span class="badge bg-primary text-wrap">{{$quiz->my_result->point}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Correct / Wrong Count
                            <div class="float-right">
                                <span class="badge bg-success text-wrap">{{$quiz->my_result->correct}} Correct</span>
                                <span class="badge bg-danger text-wrap">{{$quiz->my_result->wrong}} Wrong</span>
                            </div>
                        </li>
                        @endif
                        @if($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Finished Date
                            <span title={{$quiz->finished_at}} class="badge bg-secondary text-wrap">{{$quiz->finished_at->diffForHumans()}}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Question Count
                            <span class="badge bg-secondary text-wrap">{{$quiz->questions_count}}</span>
                        </li>
                        @if($quiz->my_result)
                        @if($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Participants Count
                            <span class="badge bg-secondary text-wrap">{{$quiz->details['joinner_count']}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Avarage Score
                            <span class="badge bg-warning text-wrap">{{$quiz->details['average']}}</span>
                        </li>
                        @endif
                        @endif

                    </ul>
                    @if(count($quiz->topTen) > 0)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title" style="align-items: center;">Top 10</h5>
                            <ul class="list-group">
                                @foreach($quiz->topTen as $result)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <img class="w-10 h-10" src="{{$result->user->profile_photo_url}}">
                                    <span @if(auth()->user()->id==$result->user_id) class="text-success font-weight-bold" @endif>{{$result->user->name}}</span>
                                    <span class="badge bg-success text-wrap">{{$result->point}}</span>
                                </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-md-8">
                    {{$quiz->description}}</p>
                    @if($quiz->my_result)

                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-warning btn-block">Show Quiz</a>
                    @elseif($quiz->finished_at==null || $quiz->finished_at>now())
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block">Join</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>