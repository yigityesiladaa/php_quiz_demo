<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <div class="row">
        <div class="col-md-8">
            <div class="list-group">
                @foreach($quizzes as $quiz)
                <a href="{{route('quiz.detail',$quiz->slug)}}" class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$quiz->title}}</h5>
                        <small>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans().' bitiyor' : 'indefinite'}}</small>
                    </div>
                    <p class="mb-1">{{Str::limit($quiz->description,110)}}</p>
                    <small>{{$quiz->questions_count}} Question</small>
                </a>
                @endforeach
                <div class="mt-2">
                    {{$quizzes->links()}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Quiz Results
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($results as $result)

                    <li class="list-group-item">
                        <strong class="text-success">{{$result->point}}</strong> -
                        <a href="{{route('quiz.detail',$result->quiz->slug)}}" style="text-decoration: none;color:black">{{$result->quiz->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>