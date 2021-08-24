<x-app-layout>
    <x-slot name="header">Quizzes</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="float:right">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create Quiz</a>
            </h5>
            <form method="GET" action="">
                <div class="form-row">
                    <div style="margin: 10px 0px 10px 0px" class="col-md-6">
                        <input type="text" value="{{request()->get('title')}}" placeholder="Quiz Name" name="title" class="form-control">
                    </div>
                    <div style="margin: 10px 0px 10px 0px" class="col-md-2">
                        <select class="form-control" onchange="this.form.submit()" name="status">
                            <option ) value="">Select Status</option>
                            <option @if(request()->get('published')) selected @endif value="published">Published</option>
                            <option @if(request()->get('passive')) selected @endif value="passive">Passive</option>
                            <option @if(request()->get('draft')) selected @endif value="draft">Draft</option>
                        </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                    <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                        <a href="{{route('quizzes.index')}}" class="btn btn-secondary">Clear</a>
                    </div>
                    @endif

                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">Quiz</th>
                        <th style="text-align: center;" scope="col">Question Count</th>
                        <th style="text-align: center;" scope="col">Status</th>
                        <th style="text-align: center;" scope="col">Finished Date</th>
                        <th style="text-align: center;" scope="col">Processes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                    <tr>
                        <td style="text-align: center;">{{$quiz -> title}}</td>
                        <td style="text-align: center;">{{$quiz -> questions_count}}</td>
                        <td>
                            @switch($quiz->status)
                            @case('published')
                            @if(!$quiz->finished_at)
                            <p class="text-success" style="text-align: center;">Published</p>
                            @elseif($quiz->finished_at > now())
                            <p class="text-success" style="text-align: center;">Published</p>
                            @else
                            <p class="text-secondary" style="text-align: center;">Expired</p>
                            @endif
                            @break
                            @case('passive')
                            <p class="text-danger" style="text-align: center;">Passive</p>
                            @break
                            @case('draft')
                            <p class="text-warning" style="text-align: center;">Draft</p>
                            @break
                            @endswitch
                        </td>
                        <td style="text-align: center;">
                            <span title="{{$quiz->finished_at}}">
                                {{$quiz->finished_at ? $quiz -> finished_at->diffForHumans() : '-'}}
                            </span>
                        </td>
                        <td style="text-align: center;">
                            @if(auth()->user()->type=='admin')
                            <a href="{{route('quizzes.details',$quiz->id)}}" class="btn btn-sm btn-secondary">
                                <i class="fa fa-info-circle"></i>
                            </a>
                            @endif
                            <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                            <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>