<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Recipe') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                
                <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" rows="3" required
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Ingredients -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Ingredients</label>
                        <textarea name="ingredients" rows="5" required
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('ingredients') }}</textarea>
                        <p class="text-sm text-gray-500 mt-1">Tip: List each ingredient on a new line.</p>
                        @error('ingredients')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Instructions -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Instructions</label>
                        <textarea name="instructions" rows="6" required
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('instructions') }}</textarea>
                        <p class="text-sm text-gray-500 mt-1">Describe the steps clearly for best results.</p>
                        @error('instructions')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Recipe Image</label>
                        <input type="file" name="image" accept="image/*"
                               class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <a href="{{ route('dashboard') }}" 
                           class="mr-4 inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-500 transition">
                            Save Recipe
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
