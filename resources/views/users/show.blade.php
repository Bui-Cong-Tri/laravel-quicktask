<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-900 border-b border-gray-200 dark:text-gray-400">
                    <h2 class="text-2xl font-semibold mb-4">{{ __('message.user.show.title') }}</h2>
                    <p class="dark:text-gray-600"><strong>{{ __('message.user.username') }}:</strong>
                        {{ $user->username }}</p>
                    <p class="dark:text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
                    <div class="flex justify-end mt-4 pb-4">
                        <a href="{{ route('articles.create') }} "
                            class="block mr-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Create New Article') }}
                        </a>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                            class="block mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
                    <h2 class="text-2xl
                                font-semibold mt-8 mb-4">
                        {{ __('message.user.show.article.title') }}</h2>
                    @if ($user->articles->count() > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach ($user->articles as $article)
                                <li class="py-4">
                                    <h3 class="text-xl font-semibold"><a
                                            href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $article->description }}
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
