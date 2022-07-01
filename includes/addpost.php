<?php
require('database.php');
if(isset($_POST['addpost'])){
    $ptitle=mysqli_real_escape_string($db,$_POST['post_title']);
    $pcontent=mysqli_real_escape_string($db,$_POST['post_content']);
    $pcategory=$_POST['post_category'];
    $query="INSERT INTO post (title,content,category_id) VALUES('$ptitle','$pcontent',$pcategory)";
    $run=mysqli_query($db,$query);

    $post_id=mysqli_insert_id($db);
    $pdf_name=$_FILES['post_pdf']['name'];
    $pdf_tmp=$_FILES['post_pdf']['tmp_name'];

    // echo $pdf_name;
    // echo $pdf_tmp;

    if(move_uploaded_file($pdf_tmp,"../pdf/$pdf_name")){
        $query="INSERT INTO pdf (post_id,pdf) VALUES('$post_id','$pdf_name')";
        $run=mysqli_query($db,$query);
    }

    header('location:../adminlogin/index.php');
}

?>