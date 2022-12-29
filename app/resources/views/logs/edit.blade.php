<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           ログの作成
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('logs.update', $id) }}">
                        @csrf
                        <div class="js-logForms"></div>
                        <button type="submit" class="js-logFormsSubmit btn btn-primary">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">
    $(function() {
        var items = [];
        @if($items)
            @foreach($items as $item)
            items.push(['{{$item->label}}','<?php echo htmlspecialchars_decode($item->value); ?>', '{{$item->id}}']);
            @endforeach
        @endif
        var html = '';
        if(items.length) {
            $.each(items, function(index, val) {
                html += '<p style="font-weight:bold;margin-top: 10px;margin-bottom: 5px;">'+val[0]+'</p>';
                var v = JSON.parse(val[1]);
                var item_id = val[2];
                var item_count = 0;
                $.each(v.items, function(i, v) {
                    if(v.title) html+= '<p class="form-label">'+v.title+'</p>';
                    if(v.type == 'text') { html += '<input class="form-control" type="text" name="'+item_id+'['+item_count+']" value="" />'; }
                    if(v.type == 'textbox') { html += '<textarea class="form-control" style="height: 100px" name="'+item_id+'['+item_count+']"></textarea>'; }
                    if(v.type == 'number') { html += '<input class="form-control" type="number" name="'+item_id+'['+item_count+']" value="">'; }
                    if(v.type == 'time') { html += '<input class="form-control" type="time" name="'+item_id+'['+item_count+']" value="">'; }
                    if(v.type == 'decimal') { html += '<input class="form-control" type="number" step="0.1" name="'+item_id+'['+item_count+']" value="">'; }
                    if(v.type == 'select') {
                        $.each(v.value, function(_i, _v) {
                            html += '<div><label>';
                            html += '<input class="form-check-input" type="radio" name="'+item_id+'['+item_count+']" value="'+_v+'" />';
                            html += ' '+_v;
                            html += '</label></div>';
                        });
                    }
                    if(v.unit) html += v.unit;
                    html += '<hr />';
                    item_count++;
                });
            });
            $('.js-logForms').html(html);
        } else {
            var html = '';
            html += '<p>この医師はまだテンプレートを作成していません。</p>';
            html += '<p><a href="/logs">戻る</a></p>';
            $('.js-logFormsSubmit').remove();
            $('.js-logForms').html(html);
        }

    });
</script>

</x-app-layout>
