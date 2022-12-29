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

                    @if($user->type == 'user')
                    <p>
                        <a href="/connect/invite" class="btn btn-warning">医師を招待する</a>
                        <a href="/connect/get" class="btn btn-info">pinコード受取</a>
                    </p>
                    <h3 class="h4">連携医師リスト</h3>
                    @if($relations_doctor)
                    <ul class="list-unstyled">
                        @foreach($relations_doctor as $relation)
                        <li style="margin-bottom: 5px;padding-top: 5px;border-top: 1px solid #ccc;">
                            <b>{{$relation->name}}</b><br />
                            職種：{{$relation->occupation}}<br />
                            所属：{{$relation->belongs}}<br />
                            診療科目：{{$relation->clinical_department}}<br />
                            <!-- todo <select>
                                <option>閲覧許可</option>
                                <option>閲覧停止</option>
                                <option>完全に削除</option>
                            </select> -->
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p>共有している医師はいません</p>
                    @endif
                    @endif

                    @if($user->type == 'doctor')
                    <p>
                        <a href="/connect/invite" class="btn btn-warning">患者を招待する</a>
                        <a href="/connect/get" class="btn btn-info">pinコード受取</a>
                    </p>
                    <h3 class="h4">連携患者リスト</h3>
                    @if($relations_user)
                    <ul class="list-unstyled">
                        @foreach($relations_user as $relation)
                        <li>
                            <b>{{$relation->name}}</b><span>{{$relation->kana}} {{$relation->email}}</span>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p>共有している患者はいません</p>
                    @endif

                    @endif

                    @if($user->type == 'system')
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
