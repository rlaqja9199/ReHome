<?php
    // $fileimg = $_FILES['reviewimg'];
    // move_uploaded_file($fileimg['tmp_name'], "C:Apache24/htdocs/php/ReHome/images/".$fileimg['name']);
    // $conn = mysqli_connect('localhost', 'root', '3693', 'rehome');
    // $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    // $query = "INSERT INTO `rehome`.`review` (`reviewdesc`, `reviewimg`, `reviewstar`,`itemid`,`userid`,`date`) values('{$_POST['reviewdesc']}','{$fileimg['name']}','{$_POST['reviewstar']}','{$_POST['id']}','{$_POST['userid']}','{$_POST['date']}')";
    // echo $query;
    // $result = mysqli_query($conn, $query);
    // if($result) {
    //     echo "게시글을 작성했습니다";
    // }else {
    //     echo "게시글 작성을 실패했습니다";
    // }
    // header("Location:http://cathkid.dothome.co.kr/ReHome/bestItem_detail.php?id={$_POST['id']}");
?>
<?php
    // cf. https://ponyozzang.tistory.com/682
    // cf. https://avada.tistory.com/2416
    // cf. https://hanamon.kr/네트워크-ssh란/
    $fileimg = $_FILES['reviewimg'];
    // $ftp_server = '112.175.184.61';
    // $ftp_port = '21';
    // $ftp_user_name = 'cathkid';
    // $ftp_user_pass = 'dothome##3693';
    // $ftp_send_file = 'ftp://cathkid@cathkid.dothome.co.kr/html/ReHome/images/';
    // $ftp_remote_file = $fileimg['name'];

    // try{

    //     // FTP서버 접속
    //     $conn_id = ftp_connect($ftp_server, $ftp_port);
    
    //     // FTP서버 접속 실패한 경우 Exception 처리
    //     if($conn_id == false){
    //         throw new Exception("[IP:".$ftp_server.":".$ftp_port ."] FTP 서버 접속 실패");
    //     }
    
    //     // FTP서버 로그인
    //     $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
    
    //     // FTP서버 로그인 실패한 경우 Exception 처리
    //     if($login_result == false){
    //         throw new Exception("[IP:".$ftp_server.":".$ftp_port ."], [USER:".$ftp_user_name."] 로그인 실패");
    //     }
    
    //     // 패시브 모드 설정
    //     ftp_pasv($conn_id, true);
    
    //     // FTP 서버에 파일 전송
    //     if (ftp_put($conn_id, $ftp_remote_file, $ftp_send_file, FTP_BINARY)) {
    //         print_r("파일 전송 (ftp) -> UPLOAD 성공");
    //     } else {
    //     // FTP서버 파일 전송 실패한 경우 Exception 처리
    //         throw new Exception("파일 전송 (ftp:".$conn_id.",".$ftp_remote_file.",".$ftp_send_file.") -> UPLOAD 실패");
    //     }
    
    //     // FTP 서버와 연결 끊음
    //     ftp_close($conn_id);
    
    // } catch(Exception $e) {
    
    //     // FTP 서버와 연결 끊음
    //     ftp_close($conn_id);
    //     print_r($e->getMessage());
    // }

    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    $query = "INSERT INTO `rehome`.`review` (`reviewdesc`, `reviewimg`, `reviewstar`,`itemid`,`userid`,`date`) values('{$_POST['reviewdesc']}','{$fileimg['name']}','{$_POST['reviewstar']}','{$_POST['id']}','{$_POST['userid']}','{$_POST['date']}')";
    echo $query;
    $result = mysqli_query($conn, $query);
    if($result) {
        echo "게시글을 작성했습니다";
    }else {
        // echo "게시글 작성을 실패했습니다.";
        echo "게시글 작성을 실패했습니다. 닷홈 무료 호스팅은 SSH 접속이 허용안돼서 사진이미지가 등록되지 않습니다.";
    }

    // header("Location:http://cathkid.dothome.co.kr/ReHome/bestItem_detail.php?id={$_POST['id']}");

?>