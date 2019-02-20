<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>
<script>
    $(function () {
        //画像ファイルプレビュー表示のイベント追加 fileを選択時に発火するイベントを登録
        $('form').on('change', 'input[type="file"]', function (e) {
            var file = e.target.files[0],
                reader = new FileReader(),
                $preview = $(".preview");
            t = this;

            // 画像ファイル以外の場合は何もしない
            if (file.type.indexOf("image") < 0) {
                return false;
            }

            // ファイル読み込みが完了した際のイベント登録
            reader.onload = (function (file) {
                return function (e) {
                    //既存のプレビューを削除
                    $preview.empty();
                    // .prevewの領域の中にロードした画像を表示するimageタグを追加
                    $preview.append($('<img>').attr({
                        src: e.target.result,
                        width: "150px",
                        class: "preview",
                        title: file.name
                    }));
                };
            })(file);

            reader.readAsDataURL(file);
        });
    });
</script>

@if (count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<h1>Team 11</h1>
<hr>

<form action="{{ url('tatekans/upload') }}" method="POST" enctype="multipart/form-data">
    <label for="photo"><h3>タテカン画像</h3></label>
    <input type="file" class="form-control" name="file"/>
    <div class="preview"></div>
    <br>
    {{ csrf_field() }}
    <button class="btn btn-success"> アップロードする</button>
</form>

<hr>
<h3>直近にアップロードされた10件のタテカン</h3>

<?php /** @var \App\Models\Tatekan[] $tatekans */ ?>
@foreach ($tatekans as $tatekan)
    <img src="{{ $tatekan->uri }}"/>
@endforeach
