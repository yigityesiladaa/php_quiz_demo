<x-app-layout>
    <x-slot name="header">Create Quiz</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.store')}}">
                @csrf
                <div class="form-group">
                    <label>Quiz Title</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label>Quiz Description</label>
                    <textarea name="description" @if(old('description')) @endif class="form-control" rows="4" value="{{old('description')}}"></textarea>
                </div>
                <div style="margin: 15px 0px 15px 0px;" class="form-group">
                    <input id="isFinished" type="checkbox">
                    <label>Select Finished Date</label>
                </div>
                <div id="finishedInput" @if(!old('finished_at')) style="display: none; margin: 15px 0px 15px 0px;" @endif class="form-group" value="{{old('finished_at')}}">
                    <label>Finished Date</label>
                    <input type="datetime-local" name="finished_at" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Create</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="js">
        <script>
            $('#isFinished').change(function() {
                if ($("#isFinished").is(':checked')) {
                    $("#finishedInput").show();
                } else {
                    $("#finishedInput").hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>