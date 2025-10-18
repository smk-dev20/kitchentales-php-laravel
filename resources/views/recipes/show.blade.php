<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->title }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow space-y-6">

                <!-- Image -->
                @if($recipe->image)
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' . $recipe->image) }}" 
                             alt="{{ $recipe->title }}" 
                             class="rounded-lg shadow-md max-h-96 object-cover">
                    </div>
                @endif

                <!-- Description -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $recipe->description }}</p>
                </div>

                <!-- Ingredients -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Ingredients</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-1">
                        @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                            <li>{{ trim($ingredient) }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Instructions -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Instructions</h3>
                    <div class="prose max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $recipe->instructions }}
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-between items-center mt-8">
                    <a href="{{ route('dashboard') }}" 
                       class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                        ← Back to Dashboard
                    </a>

                    <div class="flex space-x-3">
                        <a href="{{ route('recipes.edit', $recipe->id) }}" 
                           class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-400 transition">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500 transition">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
