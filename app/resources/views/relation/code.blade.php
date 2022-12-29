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
                    <p>共有相手のダッシュボードから「pinコード受取」画面を開き、下記の4桁のpinコードを入力してください。</p>
                    <p style="font-size: 60px; font-weight: bold; text-align: center;">{{$pin}}</p>
                    <!-- <p>todo このpinは5分間有効です（00:00:00まで）</p> -->
                    <p>再取得する場合はページをリロードしてください。</p>
                    <p><a href="{{route('relation.index')}}" class="btn btn-primary">完了</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
