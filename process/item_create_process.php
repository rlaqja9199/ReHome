<?php 
    // var_dump($_FILES);
    // file 타입으로 보내는게 두개니까 두개 만들어줘야함!!!
    $fileimg = $_FILES['imgsrc']; 
    $fileimg2 = $_FILES['imgsrc2']; 
    move_uploaded_file($fileimg['tmp_name'],"C:\Apache24\htdocs\php\ReHome\images/".$fileimg['name']);
    move_uploaded_file($fileimg2['tmp_name'],"C:\Apache24\htdocs\php\ReHome\images/".$fileimg2['name']);

    // $conn = mysqli_connect('localhost','root','3693','rehome');     
    // $conn = mysqli_connect('localhost','root','1234','rehome');     
    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');   
                            //not null로 준거는 쿼리문에 다 적어줘야 빈값이 안생겨서!! 다 적어줘야함!
    // $query = "insert into bestitem(`name1`,`brand`, `imgsrc`, `price`, `saleprice`, `imgsrc2`,`name2`)
    // values('{$_POST['name1']}','{$_POST['brand']}','{$fileimg['name']}','{$_POST['price']}',{$_POST['saleprice']},'{$fileimg2['name']}','aaa')";
    $query = "insert into bestitem(`name1`,`brand`, `imgsrc`, `price`, `saleprice`, `imgsrc2`,`name2`,`category`) values('{$_POST['name1']}','{$_POST['brand']}','{$fileimg['name']}','{$_POST['price']}',{$_POST['saleprice']},'{$fileimg2['name']}','{$_POST['name2']}','{$_POST['category']}')";                                                                   
    
    echo $query;           
    $result = mysqli_query($conn, $query);
    if($result){
        echo "게시글을 작성했습니다.";
    }else {
        echo "게시글 작성이 실패했습니다.";
    }
    header('Location:../index.php');
?>