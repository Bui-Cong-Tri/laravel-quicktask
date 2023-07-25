<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-900 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-700 dark:text-gray-500">{{ $article->title }}</h2>
                    <p class="text-gray-600 dark:text-gray-600 italic text-sm mb-8">{{ $article->description }}</p>
                    @foreach (json_decode($article->body) as $paragraph)
                        <p class="text-gray-600 dark:text-gray-400 indent-3 mb-2">{{ $paragraph }}</p>
                    @endforeach
                </div>
                <div class="flex justify-end mt-4 pb-4">
                    <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
                        class="block mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Edit') }}
                    </a>
                    <a href="{{ route('articles.destroy', ['article' => $article->id]) }}"
                        class="block mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Delete') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
