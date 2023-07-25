<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-900 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">{{ __('message.user.edit.title') }}</h2>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tên
                                {{ __('message.user.username') }}
                            </label>
                            <input type="text" name="name" id="name" value="{{ $user->username }}"
                                class="form-input mt-1 block w-full rounded-md dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}"
                                class="form-input mt-1 block w-full rounded-md dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
