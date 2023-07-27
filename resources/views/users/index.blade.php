<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-slate-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-slate-800">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold mb-4 dark:text-gray-400">{{ __('message.user.index.title') }}
                        </h2>
                        <a href="{{ route('users.create') }} "
                            class="mr-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded h-fit">
                            {{ __('Create New User') }}
                        </a>
                    </div>
                    <table class="w-full table-auto dark:text-gray-400">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 w-1/12">{{ __('message.user.index.table.id') }}</th>
                                <th class="px-4 py-2">{{ __('message.user.index.table.username') }}</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2 w-1/4">{{ __('Create At') }}</th>
                                <th class="px-4 py-2 w-1/4">{{ __('message.user.index.table.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->username }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">{{ formatDate($user->created_at) }}</td>
                                    <td class="border px-4 py-2 flex justify-evenly">
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __('View') }}
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __('Edit') }}
                                        </a>
                                        <form method="POST"
                                            action="{{ route('users.destroy', $user->id) }}"class="block mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                data-confirm="{{ __('Confirm Delete') }}">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
