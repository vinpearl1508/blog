<div class="replay-box">
    <div class="row">
        <div class="col-sm-12">
            <h2>Leave a replay</h2>
            {{-- <form action="{{route('postMessage')}}" method="post">
                @csrf
                <div class="blank-arrow">
                    <label for="fname">Title</label>
                </div>
                <span>*</span>
                <input type="text" id="title" name="title" placeholder="Your Title..">
                <div class="blank-arrow">
                    <label for="subject">Content</label>
                </div>
                <span>*</span>
                <textarea type="tetx" id="content" name="content" placeholder="Write something.." rows="11"></textarea>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form> --}}
            <form method="post" action="{{ route('postComment') }}">
                @csrf
                <div class="blank-arrow">
                    <label for="subject">Content</label>
                </div>
                <span>*</span>
                <textarea type="text" id="content" name="body" placeholder="Write something..." rows="5"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                <input class="btn btn-primary" type="submit" value="Submit">
                {{-- @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add Comment" />
                </div> --}}
            </form>
        </div>
    </div>
</div>
<!--/Repaly Box--> 