<x-app-layout>

  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="border-b border-gray-200 bg-white p-6 dark:bg-gray-900">
          <h2 class="mb-4 text-2xl font-semibold">
            {{ __('message.user.edit.title') }}</h2>
          <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
              <label for="username"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('message.user.username') }}</label>
              <input type="text" name="username" id="username" value="{{ $user->username }}"
                class="form-input mt-1 block w-full rounded-md dark:border-gray-600 dark:bg-gray-700">
            </div>
            <div class="mb-4">
              <label for="fullname"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('message.user.fullName') }}</label>
              <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}"
                class="form-input mt-1 block w-full rounded-md dark:border-gray-600 dark:bg-gray-700">
            </div>
            <div class="mb-4">
              <label for="email"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
              <input type="email" name="email" id="email" value="{{ $user->email }}"
                class="form-input mt-1 block w-full rounded-md dark:border-gray-600 dark:bg-gray-700">
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
