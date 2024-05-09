
<table class="table-auto w-full divide-y divide-gray-200">
    <thead class="bg-gray-50 dark:bg-gray-800">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-100 dark:text-gray-100 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-100 dark:text-gray-100 uppercase tracking-wider">
                Email
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-100 dark:text-gray-100 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
        @foreach ($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 dark:text-gray-100">{{ $user->name }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 dark:text-gray-100">{{ $user->email }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <a href="#" class="text-red-600 hover:text-red-900 ml-2">Delete</a>
                <form action="{{ route('users.token', $user->id) }}" method="POST">
                @csrf()
                <button type="submit" class="text-green-600 hover:text-green-900 ml-2">Token</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
