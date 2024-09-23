<?php

namespace App\Livewire\Link;

use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Form extends Component
{
    use Toast;

    #[Validate('required|string|max:255|unique:links')]
    public $short_url;

    #[Validate('nullable|exists:users,id')]
    public $user_id;

    #[Validate('required|string|url')]
    public $original_url;

    #[Validate('nullable|integer')]
    public $clicks = 0;

    #[Validate('nullable|boolean')]
    public $is_active = true;

    public function save()
    {
        // Generate a 6-character slug
        $this->short_url = substr(md5($this->original_url), 0, 6);

        // Ensure the short url is unique
        while (Link::where('short_url', $this->short_url)->exists()) {
            $this->short_url = substr(md5($this->original_url . microtime()), 0, 6);
        }

        Auth::check() ?? $this->user_id = Auth::id();
        $this->clicks = 0;
        $this->is_active = true;

        $this->validate();
        $this->short_url = Link::create($this->validate());

        $this->success('Short link created.');
    }

    public function render()
    {
        return view('livewire.link.form');
    }
}
