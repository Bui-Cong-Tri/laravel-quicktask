<x-app-layout>
  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="border-b border-gray-200 bg-white p-6 dark:bg-gray-900">
          <h2 class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-500">
            {{ $article->title }}
            <span class="ml-4 text-sm font-thin">(
              {{ __('Create At') }}
              {{ formatDate($article->created_at) }})
            </span>
          </h2>
          <p class="mb-8 text-sm italic text-gray-600 dark:text-gray-600">
            {{ $article->description }}</p>
          @foreach (json_decode($article->body) as $paragraph)
            <p class="mb-2 indent-3 text-gray-600 dark:text-gray-400">
              {{ $paragraph }}</p>
          @endforeach
        </div>
        @auth
          @if(Auth::id() === $article->author_id || Auth::user()->is_admin)
          <div class="mt-4 flex justify-end pb-4">
            <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
              class="mr-2 block rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
              {{ __('Edit') }}
            </a>
            <form method="POST"
              action="{{ route('articles.destroy', $article->id) }}"class="block mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
              @csrf
              @method('DELETE')
              <button type="submit" data-confirm="{{ __('Confirm Delete') }}">{{ __('Delete') }}</button>
            </form>
          </div>
          @endif
        @endauth
      </div>
    </div>
  </div>
</x-app-layout>
