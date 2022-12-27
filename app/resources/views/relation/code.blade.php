<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Connect') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>4桁のpinコードを相手に共有してください</p>
                    <p>この時点で4桁のpinを生成、DBに保存</p>
                    <p>{{$pin}}</p>
                    <p>このpinは5分間有効です（00:00:00まで）</p>
                    <p>再取得する場合はページをリロードしてください</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
