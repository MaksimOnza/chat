</div>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript">

    //var fd = window.setInterval(timer, 3000);

    /*function timer(){
        //sendAjaxForm('index.php?path=get_messages');
    }*/

    $(document).ready(function () {

        $("#chat_send").click(
            function () {
                getAjaxForm('index.php?path=send_message');
  //              sendAjaxForm('message', 'chat_messages', 'index.php?path=send_message');
                return false;
            }
        );
    /*});

    $(document).ready(function () {*/
        $("#reload_mess").click(
            function () {
                getAjaxForm('index.php?path=get_messages');
                return false;
            }
        );
    });


    function getAjaxForm(url_action){
        /*$.ajax({
            url: url_action,
            type: "POST",/!*
            dataType: "json",*!/
            data: {/!*'id_user': user_id, 'message': chat_message, 'current_time': current_time*!/},
            success: function (response) {
                $('#_messages').html(response);
                /!*var ar = JSON.parse(response);
                $('#_messages').html(ar);
                //alert(ar['message']);
                var index = 'message';
                ar.forEach(entry, index, ar){
                    alert(ar[]);
                }*!/
            },
            error: function (response) {
                $('#_messages').html('Ошибка. Данные не отправлены. 1'+typeof (response));
            }
        });*/
        $( "#_messages" ).load( "index.php?path=get_messages")/*, function( response, status, xhr ) {
            $('#_messages').innerText = response;*/
            /*document.write( response); // строка соответствующая данным, присланным от сервера
            document.write( status ); // строка соответствующая статусу запроса
            document.write( xhr.status ); // числовой код состояния ответа от сервера
            document.write( xhr.statusText ); // сообщение о состоянии ответа
        })*/
    }

    function sendAjaxForm(input_elem, output_elem, url_action){
        var chat_message = document.getElementById(input_elem).value;
        var current_time = new Date().getTime();
        var user = 'maks';
//        var user = document.getElementById(in_name_user_elem).value;

        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "jsond",
            data: {'user': user, 'message': chat_message, 'current_time': current_time},
            success: function (response) {
                //$('#_users').html(response);
            },
            error: function (response) {
                $('#_users').html('Ошибка. Данные не отправлены.');
            }
        });
    }

</script>
<!--<script src="/js/js_script.js"></script>-->
</body>
</html>