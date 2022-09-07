<!-- 최근 본 상품 -->
<?php 
    setcookie("goods_view", $_COOKIE['goods_view'].",".$_GET['id'],time() + 86400,"/");
?>