<x-app-layout>

  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="border-b border-gray-200 bg-white p-6 dark:bg-gray-900 dark:text-gray-400">
          <h2 class="mb-4 text-2xl font-semibold">
            {{ __('message.user.show.title') }}</h2>
          <p class="group relative dark:text-gray-600">
            <strong>{{ __('message.user.username') }}:</strong>
            {{ $user->username }}
            <span
              class="absolute -bottom-12 hidden rounded bg-slate-400 p-2 before:absolute before:-top-1 before:right-2 before:block before:h-4 before:w-4 before:rotate-45 before:bg-slate-400 group-hover:block">
              {{ __('Create At') }}
              {{ formatDate($user->created_at) }}
            </span>
          </p>
          <p class="dark:text-gray-600"><strong>Email:</strong>
            {{ $user->email }}</p>
          <div class="mt-4 flex justify-end pb-4">
            <a href="{{ route('articles.createWithId', $user->id) }} "
              class="mr-2 block rounded bg-green-500 px-4 py-2 font-bold text-white hover:bg-green-700">
              {{ __('Create New Article') }}
            </a>
            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
              class="mr-2 block rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
              {{ __('Edit') }}
            </a>
            <form method="POST"
              action="{{ route('users.destroy', $user->id) }}"class="block mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
              @csrf
              @method('DELETE')
              <button type="submit"
                data-confirm="{{ __('Confirm Delete') }}">{{ __('Delete') }}</button>
            </form>
          </div>
          <h2 class="mb-4 mt-8 text-2xl font-semibold">
            {{ __('message.user.show.article.title') }}</h2>
          @if ($user->articles->count() > 0)
            <ul class="divide-y divide-gray-200">
              @foreach ($user->articles as $article)
                <li class="py-4">
                  <h3 class="text-xl font-semibold"><a
                      href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                  </h3>
                  <p class="text-gray-600 dark:text-gray-400">
                    {{ $article->description }}
                  </p>
                </li>
              @endforeach
            </ul>
          @else
            <p class="text-gray-600 dark:text-gray-400">
              {{ __('message.user.show.article.empty') }}</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
