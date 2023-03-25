@php
    $comments = $comments->sortByDesc('created_at');
@endphp

@if($comments->count() > 0)
    @foreach($comments as $comment)
        <div class="bg-white rounded-lg shadow mb-4 p-4">
            <div class="flex items-center mb-2">
                <div class="bg-gray-200 rounded-full w-8 h-8 mr-2"></div>
                <div class="text-sm font-semibold">{{ $comment->user->nickname }}</div>
            </div>
            <div class="text-sm">{{ $comment->text }}</div>
            <div class="text-sm">{{ $comment->created_at }}</div>
            @if ($comment->children)
                <div class="ml-8 mt-2">
                    @each('comments.comment', $comment->children, 'comment')
                </div>
            @endif
        </div>
    @endforeach
@else
    <p>コメントはありません。</p>
@endif
