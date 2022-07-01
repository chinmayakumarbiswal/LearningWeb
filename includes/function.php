<?php
    function getCategory($db,$id)
    {
        $query="SELECT * FROM category WHERE id=$id";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['name'];
    }


    function getPdfByPost($db,$post_id){
        $query="SELECT * FROM pdf WHERE post_id=$post_id";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['pdf'];
    }


    function getAdminInfo($db,$email)
    {
        $query="SELECT * FROM admin WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllCategory($db){
        $query="SELECT * FROM category";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllPost($db){
        $query="SELECT * FROM post ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
?>