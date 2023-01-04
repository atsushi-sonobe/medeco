<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ログ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if($user->type =='doctor')
                <div class="p-6 text-gray-900">
                    <p class="h4">患者のログを見る</p>
                    <ul class="list-unstyled">
                        @foreach($relations_user as $user)
                        <li><a href="/logs/view/{{$user->id}}">{{$user->name}} のログを見る</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($user->type == 'user')
                <div class="p-6 text-gray-900">
                    <p class="h4">医師を選んでログをつける</p>
                    <ul class="list-unstyled">
                        @foreach($relations_doctor as $user)
                        <li><a href="/logs/{{$user->id}}">{{$user->name}} のログをつける</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="p-6 text-gray-900">
                    <p class="h4">自分のログの確認</p>
                    <ul class="list-unstyled">
                        @foreach($relations_doctor as $user)
                        <li><a href="/logs/view/{{$user->id}}">{{$user->name}} のログを確認</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($user->type == 'system')
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
