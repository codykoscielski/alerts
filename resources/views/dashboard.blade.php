<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('The Laravel Alert System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($alert)
                    <h3 class="p-6">There is currently an alert</h3>
                    <livewire:alerts.list />
                @else
                    <div class="p-6 text-gray-900">
                        {{ __("There are currently no alerts") }}
                    </div>
                    <livewire:alerts.create />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
