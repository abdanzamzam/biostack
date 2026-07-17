<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DomainSettings extends Component
{
    public $custom_domain = "";
    public $domain_verified = false;

    public function mount()
    {
        $user = auth()->user();
        $this->custom_domain = $user->custom_domain ?? "";
        $this->domain_verified = $user->custom_domain_verified_at !== null;
    }

    public function saveDomain()
    {
        $this->validate([
            "custom_domain" => "nullable|regex:/^([a-zA-Z0-9]([a-zA-Z0-9-]*[a-zA-Z0-9])?\\\\.)+[a-zA-Z]{2,}$/|max:255",
        ]);

        $user = auth()->user();
        $user->update([
            "custom_domain" => $this->custom_domain ?: null,
        ]);

        $this->dispatch("domainSaved");
    }

    public function removeDomain()
    {
        auth()->user()->update([
            "custom_domain" => null,
            "custom_domain_verified_at" => null,
        ]);

        $this->custom_domain = "";
        $this->domain_verified = false;
        $this->dispatch("domainRemoved");
    }

    public function render()
    {
        return view("livewire.dashboard.domain-settings");
    }
}
