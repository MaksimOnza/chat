<?php

namespace Chat;

session_destroy();
session_unset();
header('Location: /index.php?path=chat');