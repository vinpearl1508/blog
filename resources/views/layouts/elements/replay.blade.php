<div class="replay-box">
    <div class="row">
        <div class="col-sm-12">
            <h2>Leave a replay</h2>

            @if (Auth::guard()->check())
            <form method="post" action="{{ route('postComment') }}">
                @csrf
                <div class="blank-arrow">
                    <label for="subject">Content</label>
                </div>
                <span>*</span>
                <textarea type="text" id="content" name="body" placeholder="Write something..." rows="5"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
            @else
            <a class="btn btn-primary" href="/login">Login to leave a comment!</a>
            @endif
        </div>
    </div>
</div>
<!--/Repaly Box-->