<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            KitchenTales
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Logo -->
                <div class="flex justify-center mb-10">
                    <img src="{{ asset('images/logo.JPG') }}" alt="KitchenTales Logo" class="h-96 w-auto">
                </div>

                <!-- App description -->
                <div class="text-center mb-8">
                    <p class="text-gray-600 dark:text-gray-300">
                        Every family has recipes that are handed down through generations, each carrying 
                        nuances that reflect their unique culture and traditions. Your mom's cake is different 
                        from your friend’s mom's cake, even if they both call it a sponge cake. 
                        <br><br>
                        <strong>KitchenTales</strong> lets you store your recipes with your own special twist, 
                        so you can preserve, and easily look up your family’s culinary stories for generations to come.
                    </p>
                </div>

                <!-- Back to Dashboard button -->
                <div class="flex justify-center">
                    <a href="{{ route('dashboard') }}" 
                       class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                       Back to Dashboard
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
