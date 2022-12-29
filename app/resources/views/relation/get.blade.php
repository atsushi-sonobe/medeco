<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            アカウント連携
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>共有相手の画面に表示された4桁のpinコードを入力してください。</p>
                    <form method="post" action="{{ route('relation.readCode') }}" class="mt-6 space-y-6">
                        @csrf
                        <p><input type="number" name="pin" value="" class="form-control form-control-lg" /></p>
                        <p><input type="submit" value="確定" class="btn btn-primary" /></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
