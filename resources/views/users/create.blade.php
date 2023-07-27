<x-app-layout>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-4">{{ __('message.user.create.title') }}</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2"
                    for="username">{{ __('message.user.username') }}</label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" name="username" type="text">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2"
                    for="fullname">{{ __('message.user.fullName') }}:</label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline"
                    id="fullname" name="fullname" type="text">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2"
                    for="email">Email:</label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" name="email" type="email">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2"
                    for="password">{{ __('message.user.password') }}:</label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" name="password" type="password">
            </div>

            <!-- Add more input fields here -->

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ __('Create') }} </button>
        </form>
    </div>
</x-app-layout>
