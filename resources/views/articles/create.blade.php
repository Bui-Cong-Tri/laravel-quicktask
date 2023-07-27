<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-900 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">{{ __('message.article.create.title') }}</h2>
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf

                        <input
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline"
                            name="author_id" value="{{ $id }}" type="text">

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('message.article.title') }}
                            </label>
                            <input type="text" name="title" id="title"
                                class="form-input mt-1 block w-full rounded-md dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('message.article.description') }}
                            </label>
                            <input type="text" name="description" id="description"
                                class="form-input mt-1 block w-full rounded-md dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="mb-4">
                            <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('message.article.body') }}
                            </label>
                            <textarea name="body" id="body" rows="5"
                                class="form-textarea mt-1 block w-full rounded-md dark:bg-gray-700 dark:border-gray-600"></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Create New Article') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>