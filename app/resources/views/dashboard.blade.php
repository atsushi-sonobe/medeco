<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ダッシュボード
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="h3">{{$user->name}}</p>
                    <p>ユーザータイプ: <?php switch ($user->type) {
                        case 'doctor':
                            echo "医師";
                            break;
                        case 'user':
                            echo "患者";
                            break;
                        case 'system':
                            echo "システム管理者";
                            break;
                    } ?></p>
                    <p><a class="btn btn-outline-primary" href="{{route('profile.edit')}}">プロフィール変更</a></p>

                    @if($user->type == 'doctor' || $user->type == 'system')
                    <hr />
                    <p class="h4">テンプレート</p>
                    @if($template)
                    <p>下記からテンプレートを確認・編集できます。</p>
                    <p><a href="{{route('templates.index')}}" class="btn btn-outline-primary">テンプレート編集</a></p>
                    @else
                    <p>テンプレートはまだありません。</p>
                    <p><a href="{{route('templates.edit')}}" class="btn btn-outline-primary">テンプレート作成</a></p>
                    @endif
                    @endif


                    @if($user->type == 'doctor' || $user->type == 'system')
                    <hr />
                    <p class="h4">患者のログを確認</p>
                    @if(count($relations_user))
                    <ul class="list-unstyled">
                        @foreach($relations_user as $u)
                        <li><a href="/logs/view/{{$u->id}}">{{$u->name}}</a></li>
                        @endforeach
                    </ul>
                    @else
                    <p>連携している患者はいません。</p>
                    <p><a href="/connect/invite">患者を招待してテンプレートを共有</a></p>
                    @endif
                    @endif

                    @if($user->type == 'user' || $user->type == 'system')
                    <hr />
                    <p class="h4">ログをつける</p>
                    @if(count($relations_doctor))
                    <ul class="list-unstyled">
                        @foreach($relations_doctor as $u)
                        <li><a href="/logs/{{$u->id}}">{{$u->name}} のログをつける</a></li>
                        @endforeach
                    </ul>
                    @else
                    <p>連携している医師はいません。</p>
                    <p><a href="/connect/invite">医師を招待する</a></p>
                    @endif
                    @endif


                    <hr />

                    <p class="h4">アカウント連携</p>
                    <p><a href="{{route('relation.index')}}" class="btn btn-outline-primary">アカウント連携の確認</a></p>
                    <p>
                        <a href="/connect/invite" class="btn btn-warning"><?php switch ($user->type) {
                        case 'doctor':
                            echo "患者";
                            break;
                        case 'user':
                            echo "医師";
                            break;
                        case 'system':
                            echo "他ユーザー";
                            break;
                    } ?>を招待する</a>
                        <a href="/connect/get" class="btn btn-info">pinコード受取</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
