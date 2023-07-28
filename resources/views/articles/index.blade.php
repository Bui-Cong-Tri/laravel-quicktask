<x-app-layout>
  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white px-8 py-6 shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="flex items-center justify-between">
          <h2 class="mb-4 text-2xl font-semibold dark:text-gray-400">
            {{ __('message.article.index.title') }}
          </h2>
          <a href="{{ route('articles.createWithId', Auth::id()) }} "
            class="mr-2 block rounded bg-green-500 px-4 py-2 font-bold text-white hover:bg-green-700">
            {{ __('Create New Article') }}
          </a>
        </div>
        <div class="mt-4">
          {{ $articles->links('components.pagination') }}
        </div>
        <ul class="divide-y divide-gray-200">
          @foreach ($articles as $article)
            <li class="py-4">
              <h3 class="text-xl font-semibold dark:text-gray-400">
                <a href="{{ route('articles.show', ['article' => $article->id]) }}">
                  {{ $article->title }}
                </a>
                <span class="ml-4 text-sm font-thin opacity-80">
                  ({{ formatDate($article->created_at) }})
                </span>
              </h3>
              <p class="text-gray-600 dark:text-gray-400">
                {{ $article->description }}</p>
            </li>
          @endforeach
        </ul>
        <div class="mt-4">
          {{ $articles->links('components.pagination') }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
