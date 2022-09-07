<?php 
    session_start();
    $userid = $_POST['userId'];
    $userpw = $_POST['userPw'];
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');
    $query = "select * from member where id='{$userid}'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);

        if($userpw == $row['pw'] ){
            $_SESSION['userId'] = $userid;
            if(isset($_SESSION['userId'])){
        ?>
        <script>
            alert("로그인 되었습니다.");
            location.replace("/php/ReHome/index.php");       
        </script>
        <?php
            }
        }else {
        ?>
        <script>
            alert("비밀번호가 맞지 않습니다.");
            location.replace("/php/ReHome/index.php");      
        </script>
        <?php
        }
    }
    else {
    ?>
    <script>
            alert("아이디가 맞지 않습니다.");       
            location.replace("/php/ReHome/index.php");      
        </script>
    <?php
    }
?>