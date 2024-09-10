<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;
use App\Models\Alert;

new class extends Component {

    #[Validate('required', 'string', 'max:255')]
    public string $headline = '';
    #[Validate('required', 'string')]
    public string $description = '';
    #[Validate('required', 'string')]
    public string $severity = 'info';
    #[Validate('string', 'max:255')]
    public string $url_title = '';
    #[Validate('string', 'max:255')]
    public string $url = '';
    public string $author = '';

    public function store() {

        $validated = $this->validate();

        $validated['author'] = auth()->user()->name;
        // Create a new alert
        Alert::create($validated);

        // Clear the form
        $this->headline = '';
        $this->description = '';
        $this->severity = '';
        $this->url_title = '';
        $this->url = '';

        return redirect(route('dashboard'));
    }

}; ?>

<div class="p-6">
    <h2>Create a new alert</h2>
    <form wire:submit="store">
        <div>
            <x-input-label for="headline" :value="__('Headline')" />
            <x-text-input wire:model="headline" id="headline" class="block mt-1 w-1/4" type="text" name="headline" required autofocus/>
            <x-input-error :messages="$errors->get('headline')" class="mt-2" />
        </div>
        <div class="mt-3">
            <textarea
                wire:model="description"
                placeholder="{{ __('Alert description') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                required
            ></textarea>
        </div>
        <div class="mt-3">
            <x-input-label for="severity" :value="__('Severity')" />
            <select wire:model="severity" name="severity" id="severity" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="info">Info</option>
                <option value="warning">Warning</option>
                <option value="danger">Danger</option>
                <option value="test">Test</option>
            </select>
            <x-input-error :messages="$errors->get('severity')" class="mt-2" />
        </div>
        <div class="mt-3">
            <x-input-label for="url_title" :value="__('URL Title')" />
            <x-text-input wire:model="url_title" id="url_title" class="block mt-1 w-1/4" type="text" name="url_title" autofocus/>
            <x-input-error :messages="$errors->get('url_title')" class="mt-2" />
        </div >
        <div class="mt-3">
            <x-input-label for="url" :value="__('URL')" />
            <x-text-input wire:model="url" id="url" class="block mt-1 w-1/4" type="text" name="url" autofocus/>
            <x-input-error :messages="$errors->get('url')" class="mt-2" />
        </div>
        <x-primary-button class="mt-3">{{ __('Save Alert') }}</x-primary-button>
    </form>
</div>
