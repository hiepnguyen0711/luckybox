<?php

    session_start();
	require("../../libra/dbconnect.php");
    if(!isset($_SESSION["IsLogin"]))
	{
		header('location:../khungdangnhap.php');
		
	}
    $id = $_GET['id'];
    $qr = "select `Username`, `Coin`, `luotmomienphi`, `manhxe`,`quamanhxe` ,`Online`, `ngaynhanluotmo` from `accounts` where `id` = $id ";
    $result = mysqli_query($connect,$qr);
    $row = mysqli_fetch_array($result);
    $manhxe = $row['manhxe'];
    $quamanhxe = $row['quamanhxe'];
    $yeucau = $_GET['yeucau'];

    if($manhxe < $yeucau)
    {
        header('location:../sukienhopqua.php');
    }
    else
    {
        if($quamanhxe >= $yeucau)
        {
            header('location:../sukienhopqua.php');
        }
        else{
           
            if($yeucau == 1)
            {
                for($i = 0; $i < 50; $i++)
                {
                    $qr = "select `pInv$i` FROM `accounts` where `id` = $id and (`pInv$i` = 0 OR `pInv$i` = 50022);";
                    $ketqua = mysqli_query($connect,$qr);
                    $sodong = mysqli_num_rows($ketqua);
                    if($sodong == 1)
                    {
                        $qr = "Update `accounts` Set `pInv$i` = '50022', `pInvAmount$i` = `pInvAmount$i`+ 5 where `id` = $id";
                        mysqli_query($connect,$qr);
                        break;
                    }
                }
                $qr = "Update `accounts` set `quamanhxe` = `quamanhxe` + 1 where `id` = $id";
                mysqli_query($connect,$qr);
            }
            if($yeucau == 2)
            {
                for($i = 0; $i < 50; $i++)
                {
                    $qr = "select `pInv$i` FROM `accounts` where `id` = $id and (`pInv$i` = 0 OR `pInv$i` = 50033);";
                    $ketqua = mysqli_query($connect,$qr);
                    $sodong = mysqli_num_rows($ketqua);
                    if($sodong == 1)
                    {
                        $qr = "Update `accounts` Set `pInv$i` = '50033', `pInvAmount$i` = `pInvAmount$i`+ 2 where `id` = $id";
                        mysqli_query($connect,$qr);
                        break;
                    }
                }
                $qr = "Update `accounts` set `quamanhxe` = `quamanhxe` + 1 where `id` = $id";
                mysqli_query($connect,$qr);
            }
            if($yeucau == 3)
            {
               
                $qr = "Update `accounts` set `quamanhxe` = `quamanhxe` + 1, `Money` = `Money` + 200000 where `id` = $id";
                mysqli_query($connect,$qr);
            }
            if($yeucau == 4)
            {
                $qr = "Update `accounts` set `quamanhxe` = `quamanhxe` + 1, `GVIPVoucher` = `GVIPVoucher` + 1 where `id` = $id";
                mysqli_query($connect,$qr);
            }
            if($yeucau == 5)
            {
               
                $qr = "Update `accounts` set `quamanhxe` = `quamanhxe` + 1 where `id` = $id";
                mysqli_query($connect,$qr);
                $qr = "INSERT INTO `vehicles`(`sqlID`, `pvModelId`,`pvFuel`) VALUES ($id,522,100)";
                mysqli_query($connect,$qr);
            }
            header('location:../sukienhopqua.php');
        }
    }
?>