<?php
    session_start();
    include("../config/dbcon.php");

    if(isset($_POST["endSession"]))
    {
        $session_id = $_POST["sessionId"];
        $session_status = "Ended";

        $endSessionId = "UPDATE user_sessions SET session_status = '$session_status' WHERE session_id = '$session_id'";
        $endSessionIdRun = mysqli_query($con, $endSessionId);
        
        if($endSessionIdRun)
        {
            $_SESSION["status"] = "Session Ended";
            header("Location: ../admin/readchats");
            exit();
        }
    }

    else if(isset($_POST["addProduct"]))
    {
        $title = $_POST["title"];
        $category = $_POST["category"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $product_id = rand(000000, 999999);

        $path = "../uploads/";

        $error=array();
        $extension=array("jpeg","jpg","png");
        foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name) {
            $file_name=$_FILES["images"]["name"][$key];
            $file_tmp=$_FILES["images"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);

            if(in_array($ext,$extension)) {
                if(!file_exists($path."/".$file_name)) 
                {
                    $insert_query = "INSERT INTO products (product_id,title,category,description,price,address,city,images) 
                        VALUES ('$product_id','$title','$category','$description','$price','$address','$city','$file_name')";
                    $insert_query_run = mysqli_query($con, $insert_query);

                    $move = move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key], $path."/".$file_name);
                    
                    if($move)
                    {
                        $_SESSION['status'] = "Post Created Successfully";
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
                else 
                {
                    $filename=basename($file_name,$ext);
                    $newFileName=$filename.time().".".$ext;

                    $insert_query = "INSERT INTO products (product_id,title,category,description,price,address,city,images) 
                        VALUES ('$product_id','$title','$category','$description','$price','$address','$city','$newFileName')";
                    $insert_query_run = mysqli_query($con, $insert_query);

                    $move = move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key], $path."/".$newFileName);

                    if($move)
                    {
                        $_SESSION['status'] = "Post Created Successfully";
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
            }
            else {
                array_push($error,"$file_name, ");
            }
        }

        $insert_query = "INSERT INTO productsfamily (product_id,title) VALUES ('$product_id','$title')";
        $insert_query_run = mysqli_query($con, $insert_query);
    }

    else if(isset($_POST["addNews"]))
    {
        $title = $_POST["title"];
        $updateStory = $_POST["description"];

        $image = $_FILES['image']['name'];

        $Uploadpath = "../uploads/";

        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $postImg = time(). ' ' . $image;

        $insert = "INSERT into news (title,story,image) VALUES('$title','$updateStory','$postImg')";
        $insert_query = mysqli_query($con, $insert);

        if($insert_query)
        {
            $move = move_uploaded_file($_FILES['image']['tmp_name'], $Uploadpath.'/'.$postImg);

            if($move)
            {
                $_SESSION["status"] = "Success";
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
?>