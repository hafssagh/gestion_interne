<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="nom" value="{{ __('Nom') }}" />
                <x-jet-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required  />
            </div>

            <div class="mt-4">
                <x-jet-label for="cin" value="{{ __('CIN') }}" />
                <x-jet-input id="cin" class="block mt-1 w-full" type="cin" name="cin" :value="old('cin')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="matricule" value="{{ __('Matricule') }}" />
                <x-jet-input id="matricule" class="block mt-1 w-full" type="matricule" name="matricule" :value="old('matricule')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="fonction" value="{{ __('Fonction') }}" />
                <x-jet-input id="fonction" class="block mt-1 w-full" type="fonction" name="fonction" :value="old('fonction')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="echelle" value="{{ __('Echelle') }}" />
                <x-jet-input id="echelle" class="block mt-1 w-full" type="echelle" name="echelle" :value="old('echelle')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="grade" value="{{ __('Grade') }}" />
                <x-jet-input id="grade" class="block mt-1 w-full" type="grade" name="grade" :value="old('grade')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="service" value="{{ __('Service') }}" />
                <x-jet-input id="service" class="block mt-1 w-full" type="service" name="service" :value="old('service')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
