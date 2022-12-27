<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('logs.update', $id) }}" class="mt-6 space-y-6">
                        @csrf
                        <div class="js-logForms"></div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">
    $(function() {
        var items = [];
        @foreach($items as $item)
        items.push(['{{$item->label}}','<?php echo htmlspecialchars_decode($item->value); ?>', '{{$item->id}}']);
        @endforeach
        var html = '';
        $.each(items, function(index, val) {
            html += '<p style="font-weight:bold;">'+val[0]+'</p>';
            var v = JSON.parse(val[1]);
            var item_id = val[2];
            var item_count = 0;
            $.each(v.items, function(i, v) {
                if(v.title) html+= '<p>'+v.title+'</p>';
                if(v.type == 'text') { html += '<input type="text" name="'+item_id+'['+item_count+']" value="" />'; }
                if(v.type == 'textbox') { html += '<textbox type="text" name="'+item_id+'['+item_count+']"></textbox>'; }
                if(v.type == 'number') { html += '<input type="number" name="'+item_id+'['+item_count+']" value="">'; }
                if(v.type == 'time') { html += '<input type="time" name="'+item_id+'['+item_count+']" value="">'; }
                if(v.type == 'decimal') { html += '<input type="number" step="0.1" name="'+item_id+'['+item_count+']" value="">'; }
                if(v.type == 'select') {
                    $.each(v.value, function(_i, _v) {
                        html += '<label><p>'+_v+': ';
                        html += '<input type="radio" name="'+item_id+'['+item_count+']" value="'+_v+'" />';
                        html += '</p></label>';
                    });
                }
                if(v.unit) html += v.unit;
                item_count++;
            });
        });
        $('.js-logForms').html(html);






    });


</script>

</x-app-layout>
