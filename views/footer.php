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
                return false;
            }
        );

        $("#reload_mess").click(
            function () {
                getAjaxForm('index.php?path=get_messages');
                return false;
            }
        )
    });

    function loginAjaxForm(url_action) {
        $.ajax({
            url: url_action,
            type: 'POST',
            dataType: 'html'
        });
    }

    function getAjaxForm(url_action) {
        var current_time = new Date().getTime();
        $.ajax({
            cache: false,
            url: url_action,
            type: 'POST',
            dataType: 'html',
            data: {'current_time': current_time},
            success: function (response) {
                $('#chat_content').html(response);
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
                //$('#_message').html('df');
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