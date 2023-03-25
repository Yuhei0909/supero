<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('詳細') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">タイトル</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="tweet">
                {{$tweet->tweet}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">内容</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="description">
                {{$tweet->description}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">ニックネーム</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="nickname">
                {{$tweet->user->nickname}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">日時</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="created_at">
                {{$tweet->created_at}}
              </p>
            </div>
                  <div class="flex">
                    <!-- favorite 状態で条件分岐 -->
                    @if($tweet->users()->where('user_id', Auth::id())->exists())
                    <!-- unfavorite ボタン -->
                    <form action="{{ route('unfavorites',$tweet) }}" method="POST" class="text-left">
                      @csrf
                      <x-primary-button class="ml-3">
                        <svg class="h-6 w-6 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        {{ $tweet->users()->count() }}
                      </x-primary-button>
                    </form>
                    @else
                    <!-- favorite ボタン -->
                    <form action="{{ route('favorites',$tweet) }}" method="POST" class="text-left">
                      @csrf
                      <x-primary-button class="ml-3">
                        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="gray">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        {{ $tweet->users()->count() }}
                      </x-primary-button>
                    </form>
                    @endif
                    <!-- 条件分岐でログインしているユーザが投稿したtweetのみ編集ボタンと削除ボタンが表示される -->
                    @if ($tweet->user_id === Auth::user()->id)
                    <!-- 更新ボタン -->
                    <form action="{{ route('tweet.edit',$tweet->id) }}" method="GET" class="text-left">
                      @csrf
                      <x-primary-button class="ml-3">
                        <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="gray">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                      </x-primary-button>
                    </form>
                    <!-- 削除ボタン -->
                    <form action="{{ route('tweet.destroy',$tweet->id) }}" method="POST" class="text-left">
                      @method('delete')
                      @csrf
                      <x-primary-button class="ml-3">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="gray">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </x-primary-button>
                    </form>
                    @endif
                  </div>
                  
<section class="bg-gray-100 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-xl font-bold mb-4">コメント一覧</h2>
        <!-- コメントを投稿するフォーム -->
        <form action="{{ route('comment.store', $tweet) }}" method="post" class="mt-8">
            @csrf
            <div class="mb-4">
                <label for="text" class="block text-sm font-semibold mb-2">コメント</label>
                <textarea name="text" id="text" rows="3" class="w-full p-2 border rounded-lg focus:outline-none focus:border-blue-500">{{ old('text') }}</textarea>
                @error('text')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-gray px-4 py-2 rounded-lg hover:bg-blue-600">コメントする</button>
            </div>
        </form>
        <!-- コメントを表示するセクション -->
        @forelse($comments as $comment)
        <div class="bg-white rounded-lg shadow mb-4 p-4">
            <div class="flex items-center mb-2">
                <div class="bg-gray-200 rounded-full w-8 h-8 mr-2"></div>
                <div class="text-sm font-semibold">{{ $comment->user->nickname }}</div>
            </div>
            <div class="text-sm">{{ $comment->text }}</div>
            <div class="text-sm">{{ $comment->created_at }}</div>
        </div>
        @empty
        <p>コメントはありません。</p>
        @endforelse
    </div>
</section>

            <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('戻る') }}
              </x-primary-button>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
