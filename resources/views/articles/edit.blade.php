<x-app-layout>
  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="border-b border-gray-200 bg-white p-6 dark:bg-gray-900">
          <h2 class="mb-4 text-2xl font-semibold">
            {{ __('message.article.edit.title') }}</h2>
          <form action="{{ route('articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
              <label for="title"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('message.article.title') }}
              </label>
              <input type="text" name="title" id="title" value="{{ $article->title }}"
                class="form-input mt-1 block w-full rounded-md dark:border-gray-600 dark:bg-gray-700">
            </div>
            <div class="mb-4">
              <label for="description"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('message.article.description') }}
              </label>
              <input type="text" name="description" id="description"
                value="{{ $article->description }}"
                class="form-input mt-1 block w-full rounded-md dark:border-gray-600 dark:bg-gray-700">
            </div>
            <div class="mb-4">
              <label for="body"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('message.article.body') }}
              </label>
              <textarea name="body" id="body" rows="5"
                class="form-textarea mt-1 block w-full rounded-md dark:border-gray-600 dark:bg-gray-700">{{ $article->body }}</textarea>
            </div>
            <div>
              <button type="submit"
                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                {{ __('Update') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
