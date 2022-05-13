<?php                   
    $sid = $_POST['subcategory-id'];
    $db = mysqli_connect('server-name', 'user-name', 'password', 'divinewashersfinal');
    $query = "DELETE FROM subcategory where sid = '$sid'";
    $result = mysqli_query($db, $query);
    if ($result == FALSE) 
    {
        die(mysqli_error());
        echo "Errorbb";
        exit();
    }
    else{
        
        echo "Subcategory deleted";
        $URL="categories.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
?>