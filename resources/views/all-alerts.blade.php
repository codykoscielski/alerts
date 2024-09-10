<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('The Laravel Alert System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Past Alerts") }}
                    @foreach($alerts as $alert)
                        <div class="my-3 border p-6">
                            <p>{{ $alert->created_at}}</p>
                            <strong>{{ $alert->headline }}</strong>
                            <p>{{ $alert->description }}</p>
                            <p>{{ $alert->author }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
