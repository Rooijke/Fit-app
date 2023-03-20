<x-app-layout>
    <div class="mt-12 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h1 class="text-gray-100" >Your collection</h1>
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-new-piece')">Add a piece</x-primary-button>

                        <x-modal name="create-new-piece" :show="$errors->userDeletion->isNotEmpty()" focusable>

                            <form method="post" action="{{ route('pieces.store') }}" enctype='multipart/form-data' class="p-6">
                                @csrf
                                @method('POST')

                                <div class="flex flex-col">
                                    <h1 class="text-gray-100 font-bold">Create a piece</h1>
                                    <p class="pt-1 text-gray-400">Upload a new piece to your collection!</p>

                                    <p><span class="pr-4">Piece image:</span><input type="file" name="image" id="image" class="mt-6 text-gray-400 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-none focus:ring focus:ring-none focus:ring-opacity-50"></p>

                                    <input placeholder="Name" type="text" name="name" id="name" class="mt-3 fit-app-blue rounded-md border-gray-300 dark:border-gray-700 shadow-sm">

                                    <input placeholder="Brand name" type="text" name="brand_name" id="brand_name" class="mt-3 fit-app-blue rounded-md border-gray-300 dark:border-gray-700 shadow-sm">

                                    <select name="type" id="type" class="mt-3 fit-app-blue rounded-md border-gray-300 dark:border-gray-700 shadow-sm">
                                        <option>Clothing type</option>
                                        <option value="headwear">headwear</option>
                                        <option value="tops">Tops</option>
                                        <option value="bottoms">Bottoms</option>
                                        <option value="shoes">Shoes</option>
                                        <option value="accessoires">Accessoires</option>
                                    </select>

                                    <textarea placeholder="Description" type="text" name="description" id="description" class="mt-3 fit-app-blue rounded-md border-gray-300 dark:border-gray-700 shadow-sm"></textarea>

                                    <x-primary-button type="submit" class="mt-6 fit-content">Confirm</x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto pt-6 grid grid-cols-3 gap-5">
                @foreach($pieces as $piece)
                    <div class="bg-white w-full rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('storage/images/' . $piece->image) }}" alt="{{$piece->image}}" />
                        </a>
                        <div class="p-5 ">
                            <h2 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-white">{{$piece->name}}</h2>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$piece->brand_name}}</p>
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Edit piece
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>
