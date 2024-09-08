<?php

    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Livewire\Volt\Volt;
    use App\Models\Alert;


    uses(RefreshDatabase::class);

    test('Show no alerts', function () {
        loginAsUser();
        $response = $this->get('/dashboard');
        $response->assertSee('There are currently no alerts');
    });

    test('User can create a new alert', function() {
        $user = loginAsUser();

        $component = Volt::test('alerts.create')
            ->set('headline', 'Test Alert')
            ->set('description', 'This is a test alert')
            ->set('severity', 'info')
            ->set('author', $user->name)
            ->set('url_title', 'Test URL')
            ->set('url', 'https://example.com');

        $component->call('store');

        $this->assertDatabaseHas('alerts', [
            'headline' => 'Test Alert',
            'description' => 'This is a test alert',
            'severity' => 'info',
            'author' => $user->name,
            'url_title' => 'Test URL',
            'url' => 'https://example.com',
        ]);
    });

    test('User can delete an alert', function() {
        $user = loginAsUser();
        $alert = Alert::factory()->create();

        $component = Volt::test('alerts.list')
            ->set('alert', $alert);

        $component->call('delete');

        $this->assertDatabaseHas('alerts', [
            'id' => $alert->id,
            'active' => 0
        ]);
    });