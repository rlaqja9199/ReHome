<?php 
    $userid = $_POST['userId'];
    $userpw = $_POST['userPw'];
    $userpwch = $_POST['userPwCh'];
    $username = $_POST['userName'];
    $email = $_POST['userEmail'];
    $number = $_POST['userNumber'];
    $addr1 = $_POST['addr1'];
    $addr2_1 = $_POST['addr2_1'];
    $addr2_2 = $_POST['addr2_2'];
    $addr2_3 = $_POST['addr2_3'];
    if( !is_null($userid) ){
        // $conn = mysqli_connect('localhost','root','3693','rehome');
        // $conn = mysqli_connect('localhost','root','1234','rehome');
        $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
        $query = "select id from member where id='{$userid}'";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $userid_e = $row['id'];
        }
        if ($userid == $userid_e){
            $wu = 1;
        }elseif ($userpw != $userpwch){
            $wp = 1;
        }else {
            $encrypted_password = password_hash($userpw, PASSWORD_DEFAULT);
            $add_user = "insert into member (`id`,`name`,`pw`,`email`,`number`,`addr1`,`addr2`)
            values ('$userid','$username','$userpw','$email','$number','$addr1','$addr2_1 $addr2_2 $addr2_3')";
            echo $add_user;
            mysqli_query($conn, $add_user);
        }
        if ( $wu == 1 ) {
            echo "<p>사용자이름이 중복되었습니다.</p>";
        }
        if ( $wp == 1 ) {
            echo "<p>비밀번호가 일치하지 않습니다.</p>";
        }
        header('Location:/php/ReHome/index.php');
    }


    // $query = "insert into members (`id`, `pw`, `date`, `name`, `email`, `number`)
    // values('{$_POST['userId']}','{$_POST['userPw']}',NOW(),'{$_POST['userName']}','{$_POST['userEmail']}','{$_POST['userNumber']}')";
    // if($result){
    //     echo "성공";
    // }else {
    //     echo "실패";
    // }
    // header('Location:../index.php');
?>