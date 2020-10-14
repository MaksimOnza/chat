</div>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript">

    //var fd = window.setInterval(timer, 3000);

    function timer(){
        sendAjaxForm('index.php?path=get_messages');
    }

    $(document).ready(function () {
        $("#chat_send").click(
            function () {
                sendAjaxForm2('message', 'chat_messages', 'index.php?path=send_message');
                return false;
            }
        );
    });

    $(document).ready(function () {
        $("#reload_mess").click(
            function () {
                sendAjaxForm('index.php?path=get_messages');
                return false;
            }
        );
    });


    function sendAjaxForm(/*input_elem, output_elem, */url_action){
        /*var chat_message = document.getElementById(input_elem).value;
        var current_time = new Date().getTime();
        var user_id = 1;*/
        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "jsond",
            data: {/*'id_user': user_id, 'message': chat_message, 'current_time': current_time*/},
            success: function (response) {
                $('#chat_messages').html(response);
            },
            error: function (response) {
                $('#chat_messages').html('Ошибка. Данные не отправлены. 1');
            }
        });
    }

    function sendAjaxForm2(input_elem, output_elem, url_action){
        var chat_message = document.getElementById(input_elem).value;
        var current_time = new Date().getTime();
        var user = 'maks';
//        var user = document.getElementById(in_name_user_elem).value;

        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "html",
            data: {'user': user, 'message': chat_message, 'current_time': current_time},
            success: function (response) {
                $('#out_message').html(response);
                typeof(response);
            },
            error: function (response) {
                $('#result_form1').html('Ошибка. Данные не отправлены.');
            }
        });
    }

</script>
<!--<script src="/js/js_script.js"></script>-->
</body>
</html>