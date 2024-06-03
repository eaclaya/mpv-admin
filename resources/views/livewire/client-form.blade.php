<!-- client-form.blade.php -->
<form wire:submit.prevent="saveClient">
    <div>
        <!-- Form fields (name, domain, due_date) here -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
            <input type="text" id="name" wire:model="name" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700 ">
        </div>

        <div class="mb-4">
            <label for="domain" class="block text-sm font-medium text-gray-700 dark:text-white">Domain</label>
            <input type="text" id="domain" wire:model="domain" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700 ">
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-white">Due Date</label>
            <input type="date" id="due_date" wire:model="dueDate" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700 ">
        </div>

        <div class="mb-4">
            <label for="contact" class="block text-sm font-medium text-gray-700 dark:text-white">Contact</label>
            <input type="text" id="contact" wire:model="contact" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700 ">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
            <input type="email" id="email" wire:model="email" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700 ">
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500  hover:bg-blue-600 text-white  font-bold py-2 px-4 rounded">
                Save Client
            </button>
        </div>
    </div>
</form>
