<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
</head>
<body>
    <div>
        <select style="width:350px" class="select2-ajax"></select>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/ja.js"></script>
    <script>
        $(function(){
            $(".select2-ajax").select2({
                ajax:{
                    //非同期通信するサーバーURL
                    url:"/user",
                    dataType:"json",
                    processResults(response){
                        let options = [];
                        //サーバーと非同期通信してデータが返ってきた時の処理
                        // console.message(response);
                        
                        response.forEach(user => {
                            //select2用の連想配列を作る
                            options.push({
                                id:user.id,
                                text:user.name,
                                email:user.email,
                                phone:user.phone

                            });
                        });
                        return{
                            //select2にサーバーからのデータを配列で戻す
                            results:options
                        };
                    }
                },
                allowClear:true,
                placeholder:'',
                language:'ja'
            });

            //変化があった時
            $('.select2-ajax').on('select2:selecting',function(e){
                console.log(e.params.args.data);
                $('.name').remove();
                $('.email').remove();
                $('.phone').remove();
                $('body').append("<div class='name'>name:"+e.params.args.data.text + "</div>");
                $('body').append("<div class='email'>email:"+e.params.args.data.email + "</div>");
                $('body').append("<div class='phone'>phone:"+e.params.args.data.phone + "</div>");
            });
        });
    </script>
  </body>
</html>
