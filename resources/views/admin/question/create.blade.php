<x-app-layout>
    <x-slot name="header">Create Question for "{{$quiz->title}}"</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('questions.store',$quiz->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Question</label>
                    <textarea name="question" class="form-control" rows="4">{{old('question')}}</textarea>
                </div>
                <div style="margin: 10px 0px 10px 0px;" class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Answer</label>
                            <textarea name="answer1" class="form-control" rows="2">{{old('answer1')}}</textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Answer</label>
                            <textarea name="answer2" class="form-control" rows="2">{{old('answer2')}}</textarea>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Answer</label>
                            <textarea name="answer3" class="form-control" rows="2">{{old('answer3')}}</textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. Answer</label>
                            <textarea name="answer4" class="form-control" rows="2">{{old('answer4')}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Correct Answer</label>
                    <select name="correct_answer" class="form-control">
                        <option @if(old('correct_answer')==='answer1' ) selected @endif value="answer1">1.Answer</option>
                        <option @if(old('correct_answer')==='answer2' ) selected @endif value="answer2">2.Answer</option>
                        <option @if(old('correct_answer')==='answer3' ) selected @endif value="answer3">3.Answer</option>
                        <option @if(old('correct_answer')==='answer4' ) selected @endif value="answer4">4.Answer</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" style="margin: 15px 0px 5px 0px;" class="btn btn-success btn-sm btn-block">Create</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>