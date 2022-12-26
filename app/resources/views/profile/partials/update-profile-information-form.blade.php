<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="type" :value="__('ユーザータイプ')" />
            <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type', $user->type)" required autofocus autocomplete="type" disabled />
            <x-input-error class="mt-2" :messages="$errors->get('type')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="kana" :value="__('フリガナ')" />
            <x-text-input id="kana" name="kana" type="text" class="mt-1 block w-full" :value="old('kana', $user->kana)" required autofocus autocomplete="kana" />
            <x-input-error class="mt-2" :messages="$errors->get('kana')" />
        </div>

        <div>
            <x-input-label for="tel" :value="__('電話番号')" />
            <x-text-input id="tel" name="tel" type="text" class="mt-1 block w-full" :value="old('tel', $user->tel)" required autofocus autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('tel')" />
        </div>

        <div>
            <x-input-label for="belongs" :value="__('所属')" />
            <x-text-input id="belongs" name="belongs" type="text" class="mt-1 block w-full" :value="old('belongs', $user->belongs)" required autofocus autocomplete="belongs" />
            <x-input-error class="mt-2" :messages="$errors->get('belongs')" />
        </div>

        <div>
            <x-input-label for="occupation" :value="__('職種')" />
            <x-text-input id="occupation" name="occupation" type="text" class="mt-1 block w-full" :value="old('occupation', $user->occupation)" required autofocus autocomplete="occupation" />
            <x-input-error class="mt-2" :messages="$errors->get('occupation')" />
        </div>

        <div>
            <x-input-label for="clinical_department" :value="__('診療科目')" />
            <x-text-input id="clinical_department" name="clinical_department" type="text" class="mt-1 block w-full" :value="old('clinical_department', $user->clinical_department)" required autofocus autocomplete="clinical_department" />
            <x-input-error class="mt-2" :messages="$errors->get('clinical_department')" />
        </div>

        <div>
            <x-input-label for="license_number" :value="__('資格番号')" />
            <x-text-input id="license_number" name="license_number" type="text" class="mt-1 block w-full" :value="old('license_number', $user->license_number)" required autofocus autocomplete="license_number" />
            <x-input-error class="mt-2" :messages="$errors->get('license_number')" />
        </div>

        <div>
            <x-input-label for="zip" :value="__('郵便番号')" />
            <x-text-input id="zip" name="zip" type="text" class="mt-1 block w-full" :value="old('zip', $user->zip)" required autofocus autocomplete="zip" />
            <x-input-error class="mt-2" :messages="$errors->get('zip')" />
        </div>

        <div>
            <x-input-label for="address1" :value="__('住所（都道府県）')" />
            <x-text-input id="address1" name="address1" type="text" class="mt-1 block w-full" :value="old('address1', $user->address1)" required autofocus autocomplete="address1" />
            <x-input-error class="mt-2" :messages="$errors->get('address1')" />
        </div>

        <div>
            <x-input-label for="address2" :value="__('住所（市区町村）')" />
            <x-text-input id="address2" name="address2" type="text" class="mt-1 block w-full" :value="old('address2', $user->address2)" required autofocus autocomplete="address2" />
            <x-input-error class="mt-2" :messages="$errors->get('address2')" />
        </div>

        <div>
            <x-input-label for="address3" :value="__('住所（以降）')" />
            <x-text-input id="address3" name="address3" type="text" class="mt-1 block w-full" :value="old('address3', $user->address3)" required autofocus autocomplete="address3" />
            <x-input-error class="mt-2" :messages="$errors->get('address3')" />
        </div>

        <div>
            <x-input-label for="insurance_card1" :value="__('保険証表')" />
            <x-text-input id="insurance_card1" name="insurance_card1" type="text" class="mt-1 block w-full" :value="old('insurance_card1', $user->insurance_card1)" required autofocus autocomplete="insurance_card1" />
            <x-input-error class="mt-2" :messages="$errors->get('insurance_card1')" />
        </div>

        <div>
            <x-input-label for="insurance_card2" :value="__('保険証裏')" />
            <x-text-input id="insurance_card2" name="insurance_card2" type="text" class="mt-1 block w-full" :value="old('insurance_card2', $user->insurance_card2)" required autofocus autocomplete="insurance_card2" />
            <x-input-error class="mt-2" :messages="$errors->get('insurance_card2')" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
