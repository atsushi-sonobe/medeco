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
                    <p><a href="/connect/invite">医師を招待する（pinコード発行）</a></p>
                    <p><a href="/connect/get">pinコード受取</a></p>
                    <h3 style="font-weight:bold;">連携医師リスト（患者に表示）</h3>
                    <ul>
                        @foreach($relations as $relation)
                        <li>
                            {{$relation->name}}<br />
                            職種：{{$relation->occupation}}<br />
                            所属：{{$relation->belongs}}<br />
                            診療科目：{{$relation->clinical_department}}<br />
                            <select>
                                <option>閲覧許可</option>
                                <option>閲覧停止</option>
                                <option>完全に削除</option>
                            </select>
                        </li>
                        @endforeach
                    </ul>
                    <br />
                    <hr />
                    <br />
                    <p><a href="/connect/invite">患者を招待する（pinコード発行）</a></p>
                    <p><a href="/connect/get">pinコード受取</a></p>
                    <h3 style="font-weight:bold;">患者リスト</h3>
                    <ul>
                        @foreach($relations as $relation)
                        <li>
                            {{$relation->name}} {{$relation->kana}} {{$relation->email}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
