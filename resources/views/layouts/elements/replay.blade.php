<div class="replay-box">
    <div class="row">
        <div class="col-sm-12">
            <h2>Leave a replay</h2>
            <form action="{{route('postMessage')}}" method="post">
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
            </form>
        </div>
    </div>
</div>
<!--/Repaly Box--> 