<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-900 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4 dark:text-gray-400">{{ __('message.article.index.title') }}
                    </h2>
                    <ul class="divide-y divide-gray-200">
                        @foreach ($articles as $article)
                            <li class="py-4">
                                <h3 class="text-xl font-semibold dark:text-gray-400"><a
                                        href="{{ route('articles.show', ['article' => $article->id]) }}">{{ $article->title }}</a>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400">{{ $article->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
