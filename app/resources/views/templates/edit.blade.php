<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Templates 編集画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('templates.update') }}" class="mt-6 space-y-6">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{$user->id}}" />
                        <input type="hidden" name="item_ids" value="" class="js-templateSelectIds" />
                        <div class="js-templateSelectList"></div>
                        <button type="submit" class="js-templateSelectSubmit inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" disabled>決定</button>
                    </form>

                    <br />
                    <hr />
                    <br />

                    <select name="items" class="js-templateSelect">
                        <option value="" disabled selected style="display:none;">選択してください</option>
                    @foreach($categories as $category)
                        <optgroup label="{{$category->label}}">
                        @foreach($items as $item)
                            @if($item->category_id == $category->id)
                            <option value="{{$item->id}}">{{$item->label}}</option>
                            @endif
                        @endforeach
                        </optgroup>
                    @endforeach
                    </select>
                    <div class="js-templateSelectContents">
                        <p>項目が出ます</p>
                        <p>単位が出ます</p>
                    </div>
                    <p><a href="javascript:void(0)" class="js-templateSelectAdd">追加</a></p>

<?php /*

                    <br />
                    <hr />
                    <br />

                    <ul>
                    @foreach($items as $item)
                        <li>{{$item->id}} {{$item->label}}<br />
                            <?php var_dump(json_decode($item->value, true)); ?>
                        </li>
                    @endforeach
                    </ul>
*/ ?>

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
                html += '<p>タイトル: '+title+'</p>';
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
                        html += '<p>タイプ: '+type_label+'</p>';
                    }
                    if(val.unit) {
                        html += '<p>単位: '+val.unit+'</p>';
                    }
                    if(val.value) {
                        html += '<p>選択肢: '+val.value+'</p>';
                    }
                });
                html += '<p><a href="javascript:void(0)" class="js-templateSelectRemove">削除</a></p>';
                html += '<p><input type="text" disabled value="'+selected_id+'" /></p>';
                html += '</div>';

                add_id(selected_id);

                $('.js-templateSelectList').append(html);
            });
        @endif


        $('.js-templateSelect').on('change', function() {
            var json = values[$(this).val()];
            var items = json.items;
            var html = '';
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
                    html += '<p>タイプ: '+type_label+'</p>';
                }
                if(val.unit) {
                    html += '<p>単位: '+val.unit+'</p>';
                }
                if(val.value) {
                    html += '<p>選択肢: '+val.value+'</p>';
                }
            });

            $('.js-templateSelectContents').html(html);
        });
        $('.js-templateSelectAdd').on('click', function() {
            var html = '';
            var selected = $('.js-templateSelect').find('option:selected');
            var selected_id = selected.val();
            var title = titles[selected_id];
            var items = values[selected_id].items;
            html += '<div class="js-templateSelectBox" data-id="'+selected_id+'" style="border:1px solid gray;padding:10px;margin-bottom: 5px;">';
            html += '<p>タイトル: '+title+'</p>';
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
                    html += '<p>タイプ: '+type_label+'</p>';
                }
                if(val.unit) {
                    html += '<p>単位: '+val.unit+'</p>';
                }
                if(val.value) {
                    html += '<p>選択肢: '+val.value+'</p>';
                }
            });
            html += '<p><a href="javascript:void(0)" class="js-templateSelectRemove">削除</a></p>';
            html += '<p><input type="text" disabled value="'+selected_id+'" /></p>';
            html += '</div>';

            add_id(selected_id);

            $('.js-templateSelectList').append(html);
            return false;
        });
        $(document).on('click', '.js-templateSelectRemove', function() {
            var box = $(this).parent().parent();
            var id = box.attr('data-id');
            box.remove();
            remove_id(id);
        });


        function add_id(id) {
            ids.push(id);
            if(ids.length) {
                $('.js-templateSelectSubmit').prop('disabled', false);
            } else {
                $('.js-templateSelectSubmit').prop('disabled', true);
            }
            $('.js-templateSelectIds').val(ids.join(','));
        }
        function remove_id(id) {
            var val = 'apple';
            var index = ids.indexOf(id);
            ids.splice(index, 1);
            if(ids.length) {
                $('.js-templateSelectSubmit').prop('disabled', false);
            } else {
                $('.js-templateSelectSubmit').prop('disabled', true);
            }
            $('.js-templateSelectIds').val(ids.join(','));
        }
    });
</script>
</x-app-layout>
