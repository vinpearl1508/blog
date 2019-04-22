<div class="response-area">
    <ul class="media-list">
        @foreach ($comments as $comment)
        <li class="media" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
            <div class="media-body">
                <ul class="sinlge-post-meta">
                    <li><i class="fa fa-user"></i>{{ $comment->user->name }}</li>
                    <li><i class="fa fa-aclock-o"></i>{{ $comment->created_at->format('H:i:s') }}</li>
                    <li><i class="fa fa-calendar"></i>{{ $comment->created_at->format('d.m.Y') }}</li>
                </ul>
                <p>{{ $comment->body }}</p>
                <!-- @if ($comment->parent_id==null)
                @endif -->
                <form method="post" action="{{ route('postComment') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="body" class="form-control" />
                        <input type="hidden" name="post_id" value="{{ $post_id }}" />
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Reply" />
                    </div>
                </form>
                
                @include('layouts.elements.response', ['comments' => $comment->replies])
            </div>
        </li>
        @endforeach
    </ul>
</div>
<!--/Response-area-->