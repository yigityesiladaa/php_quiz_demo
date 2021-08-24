<x-app-layout>
    <x-slot name="header">Update</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.update',$quiz->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label style="margin: 10px 0px 10px 0px;">Quiz Title</label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}">
                </div>
                <div class="form-group">
                    <label style="margin: 10px 0px 10px 0px;">Quiz Description</label>
                    <textarea name="description" class="form-control" rows="4">{{$quiz->description}}</textarea>
                </div>

                <div class="form-group">
                    <label style="margin: 10px 0px 10px 0px;">Quiz Status</label>
                    <select name="status" class="form-control">
                        <option @if($quiz->questions_count<4) disabled @endif @if($quiz->status==='publish') selected @endif value="published">
                                Published
                        </option>
                        <option @if($quiz->status==='passive') selected @endif value="passive">Passive</option>
                        <option @if($quiz->status==='draft') selected @endif value="draft">Draft</option>
                    </select>
                </div>

                <div style="margin: 15px 0px 15px 0px;" class="form-group">
                    <input id="isFinished" @if($quiz->finished_at) checked @endif type="checkbox">
                    <label>Select Finished Date</label>
                </div>
                <div id="finishedInput" @if(!$quiz->finished_at) style="display: none" @endif style="margin: 15px 0px 15px 0px;" class="form-group" value="{{old('finished_at')}}">
                    <label>Finished Date</label>
                    <input type="datetime-local" name="finished_at" class="form-control" @if($quiz->finished_at) value="{{date('Y-m-d\TH:i',strtotime($quiz->finished_at))}}" @endif>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Update</button>
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