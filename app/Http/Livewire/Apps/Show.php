<?php

namespace App\Http\Livewire\Apps;

use App\App;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;

    /** @var \App\App */
    public $app;

    /**
     * @param \App\App $app
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return void
     */
    public function mount(App $app)
    {
        $this->authorize('view', $app);

        $this->app = $app;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function render()
    {
        View::share([
            'title' => "{$this->app->name} | Apps",
        ]);

        return view('apps.show');
    }
}