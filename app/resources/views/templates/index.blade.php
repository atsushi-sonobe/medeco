<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            テンプレート
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @if(!$template)
                <p>テンプレートはまだありません。</p>
                <p><a href="{{route('templates.edit')}}" class="btn btn-outline-primary">テンプレート作成</a></p>
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
                html += '<div class="js-templateSelectBox" data-id="'+selected_id+'" style="border:1px solid gray;padding:10px;margin-bottom: 5px;">';
                html += '<p style="font-weight:bold">'+title+'</p>';
                html += '<p style="margin-bottom: 0;">';
                $.each(items, function(index, val) {
                    if(val.title) {
                        html += '<b>'+val.title+'</b>　';
                    }
                    if(val.type) {
                        var type_label = '';
                        if(val.type == 'decimal') type_label = '小数点あり数値';
                        if(val.type == 'text') type_label = 'テキスト';
                        if(val.type == 'textbox') type_label = 'テキストボックス';
                        if(val.type == 'number') type_label = '数値（整数）';
                        if(val.type == 'select') type_label = 'セレクトボックス';
                        if(val.type == 'time') type_label = '時間を選択';
                        html += type_label;
                    }
                    if(val.unit) {
                        html += ' '+val.unit;
                    }
                    if(val.value) {
                        html += ' '+val.value;
                    }
                    html += '<br />';
                });
                html += '</p>';
                html += '</div>';

                $('.js-templateSelectList').append(html);
            });
        @endif
    });
</script>
</x-app-layout>
