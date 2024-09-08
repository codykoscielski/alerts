<?php

    use Livewire\Volt\Component;
    use App\Models\Alert;

    new class extends Component {

        public Alert $alert;

        public function mount(): void {
            $this->alert = Alert::where('active', 1)->get()->first();
        }

        public function delete(){
            $this->alert->update(['active' => 0]);

            return $this->redirect(route('dashboard'));
        }

    }; ?>


<div class="p-6 text-gray-900">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Field
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Details
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Headline
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $alert->headline }}
            </td>
        </tr>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Description
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $alert->description }}
            </td>
        </tr>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Severity
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $alert->severity }}
            </td>
        </tr>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Author
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $alert->author }}
            </td>
        </tr>
        @if($alert->url)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    URL
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{ $alert->url }}" class="underline text-blue-500">{{ $alert->url_title }}</a>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    <x-danger-button wire:click="delete" class="mt-3">{{ __('Remove Alert') }}</x-danger-button>
</div>
