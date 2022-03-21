<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>抽獎小程式</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Styles -->
        <link href="https://bootswatch.com/5/litera/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <script>
        function submit() {
            // console.log($('#staticGift').val());
            $.ajax({
                type: "POST",
                url: "/lottery_gifts",
                data: {
                    'gift'  :$('#staticGift').val(),
                    'number'  :$('#staticPeople').val()
                },
                cache: false,
                dataType: 'json',
                success: function(result) {
                    insertLottery();
                    // console.log(result);
                },
                error: function(xhr, status, msg) {
                    console.log(xhr);
                    console.log(status);
                    console.log(msg);
                    alert('獎品總數不可以超過抽獎人數唷');
                }
            });
        }

        function insertLottery() {
            $.ajax({
                type: "POST",
                url: "/lotteries",
                data: {
                    'number'  :$('#staticPeople').val()
                },
                cache: false,
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                    var datas = result.data;
                    var html = '';
                    // console.log(datas[0].id);
                    $('#group_id').val(datas[0].id);
                    for(var i = 0; i < datas.length; i++) {
                        html += '<tr><td scope="row">'+datas[i].gift_name+'</td><td scope="row">'+datas[i].number+'</td></tr>';
                    }
                    $('#table').html(html);
                },
                error: function(xhr, status, msg) {
                    console.log(xhr);
                    console.log(status);
                    console.log(msg);
                }
            });
        }

        function reset() {
            // console.log($('#group_id').val);
            $('#staticPeople').val(30);
            $('#staticGift').val('');
            var group_id = $('#group_id').val();
            if (group_id) {
                $.ajax({
                    type: "DELETE",
                    url: "/lotteries/" + group_id,
                    data: {},
                    cache: false,
                    dataType: 'json',
                    success: function(result) {
                        search();
                        // console.log(result);
                    },
                    error: function(xhr, status, msg) {
                        console.log(xhr);
                        console.log(status);
                        console.log(msg);
                    }
                });
            }
        }

        function search() {
            $.ajax({
                type: "GET",
                url: "/lotteries",
                data: {},
                cache: false,
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                    var datas = result;
                    var html = '';
                    for(var i = 0; i < datas.length; i++) {
                        html += '<tr><td scope="row">'+datas[i].gift_name+'</td><td scope="row">'+datas[i].number+'</td></tr>';
                    }
                    $('#table').html(html);
                },
                error: function(xhr, status, msg) {
                    console.log(xhr);
                    console.log(status);
                    console.log(msg);
                }
            });
        }
    </script>
    <body>
      <div id="lottery" class="container">
          <h1 class="my-4 text-center">抽獎小程式</h1>
          <div class="row justify-center text-center">
            <form method="POST">
                @csrf
                <div class="row my-3">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <label for="staticPeople" class="col-form-label">抽獎人數</label>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12">
                        <input type="number" class="form-control" id="staticPeople" min="0" value="30" required>
                    </div>
                </div>
                <div class="row my-3 align-items-center">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <label for="staticGift" class="col-form-label">獎項設定</label>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12">
                        <textarea id="staticGift" rows="6" class="form-control" required placeholder="說明：一行一獎項，可多種獎項，獎品順序影響抽籤順序
格式：獎品名稱,獎品數量（可省略，預設為1）
範例：
三獎,5
二獎,2
頭獎,1"></textarea>
                    </div>
                </div>
                <span class="d-none" id="group_id" value=""></span>
            </form>
            <div class="mt-5">
                <button type="button" class="btn btn-lg btn-outline-danger px-5 mx-3" onclick="reset()">重置</button>
                <button type="button" class="btn btn-lg btn-info px-5 mx-3" onclick="search()">查詢中獎紀錄</button>
                <button type="button" class="btn btn-lg btn-primary px-5 mx-3" onclick="submit()">抽獎</button>
            </div>
            <hr class="my-5">
            <h1 class="my-4 text-center">抽獎結果</h1>
            <table class="table">
                <tbody id="table">
                </tbody>
            </table>
          </div>
        @yield('content')
      </div>
    </body>
</html>