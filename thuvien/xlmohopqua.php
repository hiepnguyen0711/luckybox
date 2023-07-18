<?php
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    require("../../libra/dbconnect.php");

    if(!isset($_SESSION["IsLogin"]))
	{
		header('location:../khungdangnhap.php');
		
	}
    $id = $_GET['id'];
    $solan = $_GET['solan'];


    $qr = "select `Username`, `Coin`,`manhxe`,`socoinsudung`,`luotmomienphi` from `accounts` where `id` = $id ";
    $result = mysqli_query($connect,$qr);
    $row = mysqli_fetch_array($result);
    $coin = $row['Coin'];
    $manhxe = $row['manhxe'];
    $coinsd = $row['socoinsudung'];
    $luotfree = $row['luotmomienphi'];
    if($solan == 1)
    {
        if($luotfree > 0)
        {
            $tien = 0;
        }
        else{
            $tien = 99;
        }
        
    }
   
    if($solan == 20)
    {
        $tien = 1499;
    }
    if($luotfree > 0 || $coin > $tien)
    {
        if($solan == 1)
        {
            $rand = $_GET['rand'];
            if($tien == 0)
            {
                $qr = "Update `accounts` Set `luotmomienphi` = `luotmomienphi` - 1 where `id` = $id ";
                mysqli_query($connect,$qr);
		
            }
            $date = new DateTime();
            $giomo = date_timestamp_get($date);
            if($rand == 101)
            {
                $vatpham = '<span style="color:red">Mảnh Xe NRG-500</span>';
                $qr = "Update `accounts` Set `manhxe` = `manhxe` + 1, `Coin` = `Coin` - $tien, `socoinsudung` = `socoinsudung` + $tien where `id` = $id ";
                mysqli_query($connect,$qr);
                $qr = "INSERT INTO `luckybox`(`sqlid`, `vatpham`) VALUES ('$id','$vatpham')";
                mysqli_query($connect,$qr);
            }
            else if($rand >= 102)
            {
                $soluong = 1;
                if($rand == 102)
                {
                    $vatpham = "1 Hạt giống cần sa";
                    $idvatpham = 50033;
                }
                else if($rand == 103)
                {
                    $vatpham = "3 hộp nước cam";
                    $idvatpham = 50024;
                    $soluong = 3;
                }
                else if($rand == 104)
                {
                    $vatpham = "1 cơm hộp";
                    $idvatpham = 50028;
                }
                else if($rand == 105)
                {
                    $vatpham = "1 cành củi khô";
                    $idvatpham = 50011;
                }
                else if($rand == 106)
                {
                    $vatpham = "một khẩu Shotgun";
                    $idvatpham = 32500;
                }
                else if($rand == 107)
                {
                    $vatpham = "một khẩu AK-47";
                    $idvatpham = 33000;
                }
                else if($rand == 108)
                {
                    $vatpham = "1 phương tiện ngẫu nhiên";
                    $idvatpham = 50015;
                }
                else if($rand == 109)
                {
                    $vatpham = "3 phiếu ăn";
                    $idvatpham = 50022;
                    $soluong = 3;
                }
                else if($rand == 110)
                {
                    $vatpham = "một khẩu DE";
                    $idvatpham = 32400;
                }

                if($idvp[$j] != 106 && $idvp[$j] != 107 && $idvp[$j] != 110)
                {
                    for($i = 0; $i < 50; $i++)
                    {
                        $qr = "select `pInv$i` FROM `accounts` where `id` = $id and (`pInv$i` = 0 OR `pInv$i` = $idvatpham);";
                        $ketqua = mysqli_query($connect,$qr);
                        $sodong = mysqli_num_rows($ketqua);
                        if($sodong == 1)
                        {
                            $qr = "Update `accounts` Set `pInv$i` = '$idvatpham', `pInvAmount$i` = `pInvAmount$i`+ $soluong, `Coin` = `Coin` - $tien, `socoinsudung` = `socoinsudung` + $tien where `id` = $id";
                            mysqli_query($connect,$qr);
                            break;
                        }
                    }
                }
                else
                {
                    for($i = 0; $i < 50; $i++)
                    {
                        $qr = "select `pInv$i` FROM `accounts` where `id` = $id and (`pInv$i` = 0 );";
                        $ketqua = mysqli_query($connect,$qr);
                        $sodong = mysqli_num_rows($ketqua);
                        if($sodong == 1)
                        {
                            $qr = "Update `accounts` Set `pInv$i` = '$idvatpham', `pInvAmount$i` = `pInvAmount$i`+ $soluong, `Coin` = `Coin` - $tien, `socoinsudung` = `socoinsudung` + $tien where `id` = $id";
                            mysqli_query($connect,$qr);
                            break;
                        }
                    }
                }
                $qr = "INSERT INTO `luckybox`(`sqlid`, `vatpham`) VALUES ('$id','$vatpham')";
                mysqli_query($connect,$qr);
            }
	echo("<script>alert('aa')</script>");
            header('location:../sukienhopqua.php');
        }
        else if($solan == 20)
        {
            // $idvp1 = $_GET['g1'];
            // $idvp2 = $_GET['g2'];
            // $idvp3 = $_GET['g3'];
            // $idvp4 = $_GET['g4'];
            // $idvp5 = $_GET['g5'];
            // $idvp6 = $_GET['g6'];
            // $idvp7 = $_GET['g7'];
            // $idvp8 = $_GET['g8'];
            // $idvp9 = $_GET['g9'];
            // $idvp10 = $_GET['g10'];
            // $idvp11 = $_GET['g11'];
            // $idvp12 = $_GET['g12'];
            // $idvp13 = $_GET['g13'];
            // $idvp14 = $_GET['g14'];
            // $idvp15 = $_GET['g15'];
            // $idvp16 = $_GET['g16'];
            // $idvp17 = $_GET['g17'];
            // $idvp18 = $_GET['g18'];
            // $idvp19 = $_GET['g19'];
            // $idvp20 = $_GET['g20'];
            
            for($i = 1; $i <= 20; $i++)
            {
                $idvp[$i] = $_GET['g'.$i];
            }
            if($tien < 1499)
            {
                header('location:../sukienhopqua.php');
            }
            else
            {
                for($j = 1; $j <= 20; $j++)
                {
                    if($idvp[$j] == 101)
                    {
                        $vatpham = '<span style="color:red; font-weight: bold;"> Mảnh Xe NRG-500</span> <span style="color: #ffff00;">(Mở 20 lần)</span>';
                        $qr = "Update `accounts` Set `manhxe` = `manhxe` + 1 where `id` = $id ";
                        mysqli_query($connect,$qr);
                        $qr = "INSERT INTO `luckybox`(`sqlid`, `vatpham`) VALUES ('$id','$vatpham')";
                        mysqli_query($connect,$qr);
                    }
                    else if($idvp[$j] >= 102)
                    {
                        $soluong = 1;
                        if($idvp[$j] == 102)
                        {
                            $vatpham = '1 Hạt giống cần sa <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 50033;
                        }
                        else if($idvp[$j] == 103)
                        {
                            $vatpham = '3 hộp nước cam <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 50024;
                            $soluong = 3;
                        }
                        else if($idvp[$j] == 104)
                        {
                            $vatpham = '1 cơm hộp <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 50028;
                        }
                        else if($idvp[$j] == 105)
                        {
                            $vatpham = '1 cành củi khô <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 50011;
                        }
                        else if($idvp[$j] == 106)
                        {
                            $vatpham = 'một khẩu Shotgun <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 32500;
                        }
                        else if($idvp[$j] == 107)
                        {
                            $vatpham = 'một khẩu AK-47 <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 33000;
                        }
                        else if($idvp[$j] == 108)
                        {
                            $vatpham = '1 phương tiện ngẫu nhiên <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 50015;
                        }
                        else if($idvp[$j] == 109)
                        {
                            $vatpham = '3 phiếu ăn <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 50022;
                            $soluong = 3;
                        }
                        else if($idvp[$j] == 110)
                        {
                            $vatpham = 'một khẩu DE <span style="color: #ffff00;">(Mở 20 lần)</span>';
                            $idvatpham = 32400;
                        }
                        if($idvp[$j] != 106 && $idvp[$j] != 107 && $idvp[$j] != 110)
                        {
                            for($i = 0; $i < 50; $i++)
                            {
                                $qr = "select `pInv$i` FROM `accounts` where `id` = $id and (`pInv$i` = 0 OR `pInv$i` = $idvatpham);";
                                $ketqua = mysqli_query($connect,$qr);
                                $sodong = mysqli_num_rows($ketqua);
                                if($sodong == 1)
                                {
                                    $qr = "Update `accounts` Set `pInv$i` = '$idvatpham', `pInvAmount$i` = `pInvAmount$i`+ $soluong where `id` = $id";
                                    mysqli_query($connect,$qr);
                                    break;
                                }
                            }
                        }
                        else
                        {
                            for($i = 0; $i < 50; $i++)
                            {
                                $qr = "select `pInv$i` FROM `accounts` where `id` = $id and (`pInv$i` = 0 );";
                                $ketqua = mysqli_query($connect,$qr);
                                $sodong = mysqli_num_rows($ketqua);
                                if($sodong == 1)
                                {
                                    $qr = "Update `accounts` Set `pInv$i` = '$idvatpham', `pInvAmount$i` = `pInvAmount$i`+ $soluong where `id` = $id";
                                    mysqli_query($connect,$qr);
                                    break;
                                }
                            }
                        }
                        
                        $qr = "INSERT INTO `luckybox`(`sqlid`, `vatpham`) VALUES ('$id','$vatpham')";
                        mysqli_query($connect,$qr);
                    }
                    // 
                }
                $qr = "Update `accounts` Set `Coin` = `Coin` - $tien, `socoinsudung` = `socoinsudung` + $tien where `id` = $id";
                mysqli_query($connect,$qr);
                header('location:../sukienhopqua.php');
            }
        }
    }
    else{
        header('location:../sukienhopqua.php');
    }

?>