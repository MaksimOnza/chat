</div>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript">

    var fd = window.setInterval(timer, 2000);

    function timer() {
        //   getAjaxForm('index.php?path=get_messages');
    }

    $(document).ready(function () {
        $(".smile").click(function () {
            var smilik = $(this).attr('alt');
            var symb = $(this).attr('title');
            var emojy = new Image();
            emojy.src = '/media/smilies/' + smilik + '.gif';
            //document.getElementById('s_input').appendChild(emojy);
            document.getElementById('s_input').innerText += symb;
            return false;
        })
    });

    $(document).ready(function () {
        $("#s_btn").click(
            function () {
                sendAjaxForm('s_input', '_login', 'index.php?path=send_message');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        );

        $("#s_input").keyup(function(event){
            if(event.keyCode == 13){
                //alert('alert');
                sendAjaxForm('s_input', '_login', 'index.php?path=send_message');
                document.getElementById('s_input').innerText = '';
            }
        });
        /*$("#s_input").click(
            function () {
                sendAjaxForm('s_input', '_login', 'index.php?path=send_message');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        );*/

        $("#reload_mess").click(
            function () {
                getUserAjaxForm('index.php?path=get_users');
                getMessageAjaxForm('index.php?path=get_messages');
                return false;
            }
        );

        $("#logout1").click(
            function () {
                loginAjaxForm('index.php?path=logout');
                return false;
            }
        );
    });

    function loginAjaxForm(url_action) {
        $.ajax({
            url: url_action,
            type: 'POST',
            dataType: 'html'
        });
    }

    function getUserAjaxForm(url_action) {
        var current_time = new Date().getTime();
        $.ajax({
            cache: false,
            url: url_action,
            type: 'POST',
            dataType: 'html',
            data: {'current_time': current_time},
            success: function (response) {
                $('#d_users').html(response);
            },
            error: function (response) {
                $('#d_users').html('Ошибка. Данные не отправлены.');
            }
        });
    }

    function getMessageAjaxForm(url_action) {
        var current_time = new Date().getTime();
        $.ajax({
            cache: false,
            url: url_action,
            type: 'POST',
            dataType: 'html',
            data: {'current_time': current_time},
            success: function (response) {
                $('#d_messages').html(response);
            },
            error: function (response) {
                $('#d_messages').html('Ошибка. Данные не отправлены.');
            }
        });
    }

    function sendAjaxForm(input_elem, name_user, url_action) {
        var chat_message = document.getElementById(input_elem).innerText;
        var current_time = new Date().getTime();
        var user = document.getElementById(name_user).value;
        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "html",
            data: {'user': user, 'message': chat_message, 'current_time': current_time},
            success: function (response) {
                $('#d_users').html(response);
            },
            error: function (response) {
                $('#_users').html('Ошибка. Данные не отправлены.');
            }
        });
    }

    //getAjaxForm('index.php?path=get_messages');
</script>
</body>
</html>