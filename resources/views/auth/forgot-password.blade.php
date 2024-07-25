<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __("¿Ha olvidado su contraseña? No se preocupe. Sólo tienes que indicarnos tu dirección de correo electrónico y te enviaremos un enlace para restablecer la contraseña que te permitirá elegir una nueva.") }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-input-error :messages="session('status_error')" class="mb-4" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Restablecer contraseña') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
