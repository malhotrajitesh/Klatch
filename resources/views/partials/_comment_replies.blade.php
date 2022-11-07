

<style>
    .display-comment .display-comment {
        ;
        margin-left: 40px;
    }
    .drepa{
        margin-top: -10px;
    }
</style>

@foreach($comments as $comment)
    <div class="display-comment">
        <div class="jon" style="background-color: #f0f3f5; border-radius: 15px;" >
        <strong style="margin-left: 10px">{{ $comment->user->name }}</strong>
        <p style="margin-left: 10px">{{ $comment->body }}</p>
    </div>
        <a href="javascript:void(0)"  class="drepa" data-mycheckbox="{{ $comment->id }}">Reply</a>
         <div id="replyua{{ $comment->id }}" style="display: none">
        <form method="post" action="{{ route('admin.reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" />
                <input type="hidden" name="follow_id" value="{{ $follow_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"
       tabindex="-1" />
            </div>
        </form>
</div>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach
