<!-- user-form.blade.php -->
<form wire:submit.prevent="saveUser">
    <div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
            <input type="text" id="name" wire:model="name" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700 ">
            <p class="text-red-500">@error('name') {{ $message }} @enderror</p>

        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Domain</label>
            <input type="email" id="email" wire:model="email" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700 ">
            <p class="text-red-500">@error('email') {{ $message }} @enderror</p>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white">Password</label>
            <input type="password" id="password" wire:model="password" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700 ">
            <p class="text-red-500">@error('password') {{ $message }} @enderror</p>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500  hover:bg-blue-600 text-white  font-bold py-2 px-4 rounded">
                Save User
            </button>
        </div>
    </div>
</form>
