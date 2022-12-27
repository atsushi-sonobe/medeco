<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Templates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @if(!$template)
                <p>まだありません</p>
                <p><a href="/templates/edit">作りはじめましょう！</a></p>
                @else
                <div class="js-templateSelectList"></div>
                <p><a href="/templates/edit" class="btn btn-outline-primary">編集する</a></p>
                @endif
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(function() {
        var ids = [];

        var titles = [];
        var values = [];
        @foreach($items as $item)
            titles[{{$item->id}}] = "<?php echo $item->label; ?>";
            values[{{$item->id}}] = <?php echo $item->value; ?>;
        @endforeach

        // view default
        var template_items = null;
        @if($template)
            template_items = [{{$template->items}}];
            $.each(template_items, function(index, val) {
                var html = '';
                var selected_id = val;
                var title = titles[selected_id];
                var items = values[selected_id].items;
                html += '<div class="js-templateSelectBox card" data-id="'+selected_id+'" style="margin: 0 0 5px 0"><div class="card-body">';
                html += '<h5 class="card-title">'+title+'</h5>';
                html += '<div class="card-text">';
                $.each(items, function(index, val) {
                    if(val.title) {
                        html += '<p>見出し: '+val.title+'</p>';
                    }
                    if(val.type) {
                        var type_label = '';
                        if(val.type == 'decimal') type_label = '小数点あり数値';
                        if(val.type == 'text') type_label = 'テキスト';
                        if(val.type == 'textbox') type_label = 'テキストボックス';
                        if(val.type == 'number') type_label = '数値（整数）';
                        if(val.type == 'select') type_label = 'セレクトボックス';
                        if(val.type == 'time') type_label = '時間';

                        html += '<p>タイプ: '+type_label+'</p>';
                    }
                    if(val.unit) {
                        html += '<p>単位: '+val.unit+'</p>';
                    }
                    if(val.value) {
                        html += '<p>選択肢: '+val.value+'</p>';
                    }
                });
                html += '</div>'
                html += '<p><a href="javascript:void(0)" class="js-templateSelectRemove">削除</a></p>';
                html += '<p><input type="text" disabled value="'+selected_id+'" /></p>';
                html += '</div></div>';

                $('.js-templateSelectList').append(html);
            });
        @endif
    });
</script>
</x-app-layout>
