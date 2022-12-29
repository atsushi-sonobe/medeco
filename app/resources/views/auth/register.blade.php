<x-guest-layout>
    <form method="POST" action="/register">
        @csrf
        <input type="hidden" name="type" value="{{$user_type}}" />

        @if($user_type == 'doctor')
        <p class="h2">医師の登録</p>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- tel -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('電話番号')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" required />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('氏名')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <input type="hidden" name="kana" value="0" />
        <!-- belongs (所属) -->
        <div class="mt-4">
            <x-input-label for="belongs" :value="__('所属')" />
            <x-text-input id="belongs" class="block mt-1 w-full" type="text" name="belongs" :value="old('belongs')" required autofocus />
            <x-input-error :messages="$errors->get('belongs')" class="mt-2" />
        </div>
        <!-- occupation (職種) -->
        <div class="mt-4">
            <x-input-label for="occupation" :value="__('職種')" />
            <x-text-input id="occupation" class="block mt-1 w-full" type="text" name="occupation" :value="old('occupation')" required autofocus />
            <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
        </div>
        <!-- clinical_department (診療科) -->
        <div class="mt-4">
            <x-input-label for="clinical_department" :value="__('診療科目')" />
            <x-text-input id="clinical_department" class="block mt-1 w-full" type="text" name="clinical_department" :value="old('clinical_department')" required autofocus />
            <x-input-error :messages="$errors->get('clinical_department')" class="mt-2" />
        </div>
        <!-- license_number (資格番号) -->
        <div class="mt-4">
            <x-input-label for="license_number" :value="__('資格番号')" />
            <x-text-input id="license_number" class="block mt-1 w-full" type="text" name="license_number" :value="old('license_number')" required autofocus />
            <x-input-error :messages="$errors->get('license_number')" class="mt-2" />
        </div>
        <input type="hidden" name="zip" value="0" />
        <input type="hidden" name="address1" value="0" />
        <input type="hidden" name="address2" value="0" />
        <input type="hidden" name="address3" value="0" />
        <input type="hidden" name="insurance_card1" value="0" />
        <input type="hidden" name="insurance_card2" value="0" />
        @endif

        @if($user_type == 'user')
        <p class="h2">患者の登録</p>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- tel -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('電話番号')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" required />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('氏名')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Kana -->
        <div class="mt-4">
            <x-input-label for="kana" :value="__('フリガナ')" />
            <x-text-input id="kana" class="block mt-1 w-full" type="text" name="kana" :value="old('kana')" required autofocus />
            <x-input-error :messages="$errors->get('kana')" class="mt-2" />
        </div>
        <input type="hidden" name="belongs" value="0" />
        <input type="hidden" name="occupation" value="0" />
        <input type="hidden" name="clinical_department" value="0" />
        <input type="hidden" name="license_number" value="0" />
        <!-- zip (郵便番号) -->
        <div class="mt-4">
            <x-input-label for="zip" :value="__('郵便番号')" />
            <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required autofocus />
            <x-input-error :messages="$errors->get('zip')" class="mt-2" />
        </div>
        <!-- address1 (住所・都道府県) -->
        <div class="mt-4">
            <x-input-label for="address1" :value="__('住所（都道府県）')" />
            <x-text-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')" required autofocus />
            <x-input-error :messages="$errors->get('address1')" class="mt-2" />
        </div>
        <!-- address2 (住所・市区町村) -->
        <div class="mt-4">
            <x-input-label for="address2" :value="__('住所（市区町村）')" />
            <x-text-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2')" required autofocus />
            <x-input-error :messages="$errors->get('address2')" class="mt-2" />
        </div>
        <!-- address3 (住所・以降) -->
        <div class="mt-4">
            <x-input-label for="address3" :value="__('住所（以降）')" />
            <x-text-input id="address3" class="block mt-1 w-full" type="text" name="address3" :value="old('address3')" required autofocus />
            <x-input-error :messages="$errors->get('address3')" class="mt-2" />
        </div>
        <input type="hidden" name="insurance_card1" value="0" />
        <input type="hidden" name="insurance_card2" value="0" />
        @endif

        @if($user_type == 'system')
        <p class="h2">システム管理者の登録</p>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <input type="hidden" name="tel" value="0" />
        <input type="hidden" name="name" value="0" />
        <input type="hidden" name="kana" value="0" />
        <input type="hidden" name="belongs" value="0" />
        <input type="hidden" name="occupation" value="0" />
        <input type="hidden" name="clinical_department" value="0" />
        <input type="hidden" name="license_number" value="0" />
        <input type="hidden" name="zip" value="0" />
        <input type="hidden" name="address1" value="0" />
        <input type="hidden" name="address2" value="0" />
        <input type="hidden" name="address3" value="0" />
        <input type="hidden" name="insurance_card1" value="0" />
        <input type="hidden" name="insurance_card2" value="0" />
        @endif

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード（確認）')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
