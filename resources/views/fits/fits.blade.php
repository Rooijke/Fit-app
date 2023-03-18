<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h1 class="text-gray-100">Your outfits</h1>
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-new-fit')">Configure a fit</x-primary-button>

                        <x-modal name="create-new-fit" :show="$errors->userDeletion->isNotEmpty()" focusable>

                            <form method="post" action="{{ route('fits.create') }}" class="p-6">
                                @csrf
                                <div class="flex flex-col">
                                    <h2 class="text-gray-100">Compose a fit</h2>
                                    <p class="pt-1 text-gray-400">Configure here an outfit with clothes from your collection :)</p>
                                    <input placeholder="Name" type="text" name="name" id="name" class="fit-app-blue rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </form>

                        </x-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
