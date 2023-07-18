<?php
    session_start();
	require("../../libra/dbconnect.php");
    if(!isset($_SESSION["IsLogin"]))
	{
		header('location:../khungdangnhap.php');
		
	}
    $id = $_GET['id'];
    $qr = "select `Username`, `Coin`, `luotmomienphi`, `manhxe` ,`Online`, `ngaynhanluotmo` from `accounts` where `id` = $id ";
    $result = mysqli_query($connect,$qr);
    $row = mysqli_fetch_array($result);
    $online = $row['Online'];
    $ngaynhanfree = $row['ngaynhanluotmo'];
    $ngay = date("d");
    settype($ngay,'int');
    if($ngaynhanfree == $ngay)
    {
        header('location:../sukienhopqua.php');
    }
    else{
        $qr = "Update `accounts` Set `ngaynhanluotmo`= $ngay, `luotmomienphi` = `luotmomienphi` + 1 where `id` = $id ";
        mysqli_query($connect,$qr);
        header('location:../sukienhopqua.php');
    }
?>