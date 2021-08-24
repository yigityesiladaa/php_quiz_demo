<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">

                <div class="col-md-4">
                    <ul class="list-group">

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
                    {{$quiz->description}}

                    <table class="table table-bordered mt-3" style="text-align: center">
                        <thead>
                            <tr>
                                <th scope="col">Name Surname</th>
                                <th scope="col" class="text-warning">Score</th>
                                <th scope="col" class="text-success">Correct Anwers</th>
                                <th scope="col" class="text-danger">Wrong Anwers</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quiz->results as $result)
                            <tr>
                                <td>{{$result->user->name}}</td>
                                <td>{{$result->point}}</td>
                                <td>{{$result->correct}}</td>
                                <td>{{$result->wrong}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

            </div>
            <h5 class="card-title" style="margin: 25px 0px 0px 0px">
                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Back to Quizzes</a>
            </h5>
        </div>
        </p>

    </div>
</x-app-layout>