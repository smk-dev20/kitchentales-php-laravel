<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Recipes') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Add New Recipe Button -->
            <div class="mb-6 flex justify-end">
                <a href="{{ route('recipes.create') }}" 
                   class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-500 transition">
                    ➕ Add New Recipe
                </a>
            </div>

            <!-- Recipe List -->
            @if($recipes->isEmpty())
                <div class="text-center text-gray-500">
                    <p>You haven’t added any recipes yet.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($recipes as $recipe)
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            @if($recipe->image)
                                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                                @else
                                <div class="w-full h-40 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500">
                                    No Image
                                </div>
                            @endif
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $recipe->title }}</h3>
                                <p class="text-gray-600 text-sm mt-2 line-clamp-3">{{ $recipe->description }}</p>

                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('recipes.show', $recipe->id) }}" 
                                       class="text-indigo-600 hover:underline">View</a>
                                    <div class="flex space-x-3">
                                        <a href="{{ route('recipes.edit', $recipe->id) }}" 
                                           class="text-yellow-500 hover:underline">Edit</a>
                                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Delete this recipe?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
