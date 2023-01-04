<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($user->type == 'doctor')
                {{$relation->name}}さんのログ <?php if($from && $until){ echo '（'.$from.'〜'.$until.'）'; } ?>
            @else
                {{$doctor->name}}さんに共有しているログ <?php if($from && $until){ echo '（'.$from.'〜'.$until.'）'; } ?>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="h4">期間で絞り込み</p>
                    <form action="./{{$id}}" method="GET">
                        <input class="form-control" type="date" name="from" placeholder="from_date">
                            <span class="text-grey">から</span>
                        <input class="form-control"  type="date" name="until" placeholder="until_date">
                        <button type="submit" style="margin-top: 5px;" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">検索</button>
                    </form>
                    <hr />
                    <div class="js-result"></div>
                    @if(count($data) == 0)
                        その期間の記録はありません。
                    @endif
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(function() {
        var titles = [];
        var values = [];
        var datas = [];
        @foreach($items as $item)
            titles[{{$item->id}}] = "<?php echo $item->label; ?>";
            values[{{$item->id}}] = <?php echo $item->value; ?>;
        @endforeach
        @foreach($data as $d)
            datas.push({log:<?php echo $d->log; ?>, date: '<?php echo $d->created_at; ?>'});
        @endforeach
        // console.log(datas);
        var datas_for_render = [];
        $.each(datas, function(index, val) {
            var date = val.date;
            // console.log(date);
            $.each(val.log, function(i, v) {
                var _i = '_'+String(i);
                var _v = {log: v, date: date};
                // console.log(_v);
                if(datas_for_render[_i]) {
                    datas_for_render[_i].push(_v);
                } else {
                    datas_for_render[_i] = [_v];
                    datas_for_render[_i]['id'] = _i;
                }
            });
        });
        datas_for_render =  Object.assign({}, datas_for_render);

        $.each(datas_for_render, function(index, val) {
            var html = '';
            var id = Number(val['id'].slice(1));

            html += '<p><b>'+titles[id]+'</b></p>';
            html += '<p>';
            $.each(val, function(i, v) {
                var today = new Date(v.date);
                var year = today.getFullYear();
                var month = today.getMonth() + 1;
                var day = today.getDate();
                html += '<span style="font-size: 80%;color:#aaa">'+year + '/' + month + '/' + day+'</span> '+v.log+'<br />';

            });

            $('.js-result').append(html);
        });


    });
</script>

</x-app-layout>
