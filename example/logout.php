<?php
setcookie("ws_auth", time()-60);
unset($ws_auth);
header("Location: index.php?site=news");
?>