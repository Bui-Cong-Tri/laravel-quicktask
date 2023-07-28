<x-app-layout>
  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-slate-800 sm:rounded-lg">
        <div class="border-b border-gray-200 bg-white p-6 dark:bg-slate-800">
          <div class="flex items-center justify-between">
            <h2 class="mb-4 text-2xl font-semibold dark:text-gray-400">
              {{ __('message.user.index.title') }}
            </h2>
            <a href="{{ route('users.create') }} "
              class="mr-2 h-fit rounded bg-green-500 px-4 py-2 font-bold text-white hover:bg-green-700">
              {{ __('Create New User') }}
            </a>
          </div>
          <div class="mt-4">
            {{ $users->links('components.pagination') }}
          </div>
          <table class="w-full table-auto dark:text-gray-400">
            <thead>
              <tr>
                <th class="w-1/12 px-4 py-2">
                  {{ __('message.user.index.table.id') }}</th>
                <th class="px-4 py-2">
                  {{ __('message.user.index.table.username') }}
                </th>
                <th class="px-4 py-2">Email</th>
                <th class="w-1/4 px-4 py-2">
                  {{ __('Create At') }}</th>
                <th class="w-1/4 px-4 py-2">
                  {{ __('message.user.index.table.actions') }}
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td class="border px-4 py-2">
                    {{ $user->id }}</td>
                  <td class="border px-4 py-2">
                    {{ $user->username }}</td>
                  <td class="border px-4 py-2">
                    {{ $user->email }}</td>
                  <td class="border px-4 py-2">
                    {{ formatDate($user->created_at) }}
                  </td>
                  <td class="flex justify-evenly border px-4 py-2">
                    <a href="{{ route('users.show', $user->id) }}"
                      class="block rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                      {{ __('View') }}
                    </a>
                    <a href="{{ route('users.edit', $user->id) }}"
                      class="block rounded bg-green-500 px-4 py-2 font-bold text-white hover:bg-green-700">
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
          <div class="mt-4">
            {{ $users->links('components.pagination') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
