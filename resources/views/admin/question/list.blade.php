<x-app-layout>
    <x-slot name="header">Questions of "{{$quiz-> title}}"</x-slot>
    <div class="card">
        <div class="card-body">

            <h5 class="card-title" style="float:right; margin: 5px 0px 15px 0px">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create Question</a>
            </h5>
            <h5 class="card-title" style="margin: 5px 0px 15px 0px">
                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Back to Quizzes</a>
            </h5>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">Question</th>
                        <th style="text-align: center;" scope="col">Image</th>
                        <th style="text-align: center;" scope="col">Answer 1</th>
                        <th style="text-align: center;" scope="col">Answer 2</th>
                        <th style="text-align: center;" scope="col">Answer 3</th>
                        <th style="text-align: center;" scope="col">Answer 4</th>
                        <th style="text-align: center;" scope="col">Correct Answer</th>
                        <th style="text-align: center;" scope="col" style="width:75px">Processes</th>
                    </tr>

                    @foreach($quiz->questions as $question)
                    <tr>
                        <td style="text-align: center;">{{$question -> question}}</td>
                        <td style="text-align: center;">
                            @if($question->image)
                            <a href="{{asset($question->image)}}" target="_blank" class="btn btn-sm btn-light">Show Image</a>
                            @endif
                        </td>
                        <td style="text-align: center;">{{$question -> answer1}}</td>
                        <td style="text-align: center;">{{$question -> answer2}}</td>
                        <td style="text-align: center;">{{$question -> answer3}}</td>
                        <td style="text-align: center;">{{$question -> answer4}}</td>
                        <td style="text-align: center;" class="text-success">{{substr($question -> correct_answer,-1)}}. Answer</td>
                        <td style="text-align: center;">
                            <a href="{{route('questions.edit',[$quiz->id , $question->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('questions.destroy',[$quiz->id , $question->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>