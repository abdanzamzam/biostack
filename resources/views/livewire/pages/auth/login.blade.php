<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout("layouts.guest")] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route("dashboard", absolute: false), navigate: true);
    }
}; ?>

<div>
    <x-auth-session-status class="mb-4" :status="session("status")" />

    <form wire:submit="login" class="space-y-5">
        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__("Email")" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1.5 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get("form.email")" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__("Password")" />
            <x-text-input wire:model="form.password" id="password" class="block mt-1.5 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get("form.password")" class="mt-2" />
        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between">
            <label for="remember" class="inline-flex items-center gap-2 cursor-pointer">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded bg-white/10 border-white/20 text-teal-500 focus:ring-teal-500/30">
                <span class="text-sm text-white/60">{{ __("Remember me") }}</span>
            </label>

            @if (Route::has("password.request"))
                <a class="text-sm text-white/50 hover:text-teal-400 transition-colors" href="{{ route("password.request") }}" wire:navigate>
                    {{ __("Forgot password?") }}
                </a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center mt-2">
            {{ __("Log in") }}
        </x-primary-button>

        <p class="text-center text-sm text-white/40">
            Don't have an account?
            <a href="{{ route("register") }}" wire:navigate class="text-teal-400 hover:text-teal-300 font-medium">Sign up</a>
        </p>
    </form>
</div>
