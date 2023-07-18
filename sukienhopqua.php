<?php 
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
	require("../libra/dbconnect.php");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/all.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="css/sukien2thang9.css" />
    <link rel="shortcut icon" href="images/giftbox.png">
	<meta property="og:image" content="images/logofb.png">
    <title>Sự kiện LUCKY BOX | VGTA.VN</title>
    
</head>
<body>
    <header>
        <div class="tab1">
            <div class="logo">
                <a href="https://vanhiepjp.com/vgta/trangchu/">
                    <img src="images/logovgta3.png" alt="VGTA" title="vgta.vn"/>
                </a>
                <a href="https://vanhiepjp.com/vgta/trangchu/">
                    <span id="antext" ><h1>VGTA.VN</h1></span>
                </a>
            </div>
            <div class="trangweb">
                <ul>
                    <a href="#lichsu"  alt="VGTA" title="LUCKY BOX"><li><i class="fas fa-gift"></i> <span id="antext" >LỊCH SỬ</span</li></a>
                    <a href="https://vanhiepjp.com/vgta/trangchu/"  alt="VGTA" title="trang chủ VGTA" target="_blank"><li><i class="fas fa-home"></i> <span id="antext" >Trang chủ</span></li></a>
                    <a href="https://vanhiepjp.com/vgta/dangki/"  alt="VGTA" title="Đăng kí tài khoản" target="_blank"><li><i class="fas fa-pen-alt"></i> <span id="antext" >Đăng kí</span></li></a>
                    <a href="https://diendan.vgta.vn"  alt="VGTA" title="Forum" target="_blank"><li><i class="fas fa-users"></i> <span id="antext" >Diễn đàn</span></li></a>
                    <a href="https://www.youtube.com/channel/UCiz3CmzF3TmaIeLx5pzrkFA"  alt="VGTA" title="Yotube channel" target="_blank"><li><i class="fab fa-youtube"></i> <span id="antext" >Youtube</span></li></a>
                    <a href="https://www.facebook.com/vgtavn"  alt="VGTA" title="Fanpage" target="_blank"><li><i class="fab fa-facebook-square"></i> <span id="antext" >Fanpage</span></li></a>
                    <a href="https://discord.gg/MCTPzzpCFf"  alt="VGTA" title="Discord" target="_blank"><li><i class="fab fa-discord"></i> <span id="antext" >Discord</span></li></a>
                </ul>
            </div>
        </div>
        <div class="tab2">
            <?php 
            
                if(!isset($_SESSION["IsLogin"]))
                {
                    echo'<div class="chuadn">
                    <ul>
                        <li><i class="fas fa-user taikhoan"></i> Chưa đăng nhập<span id="chuthich"> Tài Khoản</span></li>
                    </ul>
                    <a href="https://vanhiepjp.com/vgta/luckybox/khungdangnhap.php/"><div class="naptien">ĐĂNG NHẬP</div></a>
                </div>';
                    $id = 0;
                    settype($id,'int');
                    $ngaynhanfree =  date("d");
                    settype($ngay,'int');
                    $online = 0;
                    $coin = 0;
                    $luotmofree =0; 
                    $manhxe = 0;
                    $coinsd = 0;
                    $quamanhxe = 100;
                }
                else
                {
                    $username = $_SESSION['taikhoan'];
                    $id = $_SESSION['id'];
                    $qr = "select `Username`, `Coin`, `luotmomienphi`, `manhxe` ,`Online`, `ngaynhanluotmo`, `socoinsudung`,`quamanhxe` from `accounts` where `id` = $id ";
                    $result = mysqli_query($connect,$qr);
                    $row = mysqli_fetch_array($result);
                    $tentaikhoan = $row['Username'];
                    $coin = $row['Coin'];
                    $luotmofree = $row['luotmomienphi']; 
                    $manhxe = $row['manhxe'];
                    $online = $row['Online'];
                    $ngaynhanfree = $row['ngaynhanluotmo'];
                    $coinsd = $row['socoinsudung'];
                    $quamanhxe = $row['quamanhxe'];
                    echo'<div class="dadn">
                    <ul>
                        <li><i class="fas fa-user taikhoan"></i>' . $tentaikhoan. '<span id="chuthich"> Tài Khoản</span></li>
                        <li><i class="fas fa-donate tien"></i>'. $coin.' <span id="chuthich">Coin</span></li>
                        <li><i class="fas fa-box-open lanmo"></i> <span id="chuthich">Còn</span> ' . $luotmofree. ' <span id="chuthich">lượt mở</span></li>
                        <li><i class="fas fa-door-open exit"></i><a onclick="xlthoat('.$id.')"> <span id="chuthich">Đăng xuất</span></a></li>
                        <li class="manh"><img src="images/manhxenrg.png">' . $manhxe. ' <span id="chuthich" style="margin-left: 5px;"> mảnh hiện có</span></li>
                    </ul>
                    <a href="https://www.facebook.com/G.N.S.L.7/" target="_blank"><div class="naptien">NẠP TIỀN</div></a>
                </div>';
                }
            
                
            ?>
            <!--  -->
            
            <!--  -->
        </div>
        
    </header>
    <div class="content">
        <h2>lucky gift box</h2>
        <div class="hopqua">
            <div class="hopqua1">
                <div class="container_hq">
                    <!-- <img class="nenhopqua" src="images/case5-bg.png" alt=""> -->
                    <div class="thongtinhopqua">
                        <img class="hopqua1_b" src="images/gg1.png" alt="Hộp Quà May Mắn" title="Hộp Quà May Mắn"/>
                        <div class="tieudehopqua">VG BOX 1</div>
                        <div class="giatien"><i class="fas fa-donate tien"></i> <span id="giatienct">99</span></div> 
                        <div class="nutmua">    
                            <div class="nutquay1" onclick="mohopqua(1,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 1 lần</div>
                            <div class="nutquay2" onclick="mohopqua(20,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 20 lần </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- hop qua 2 -->
            <div class="hopqua1 hopqua2">
                <div class="container_hq">
                    <!-- <img class="nenhopqua" src="images/case5-bg.png" alt=""> -->
                    <div class="thongtinhopqua">
                        <img class="hopqua1_b" src="images/gg2.png" alt="Hộp Quà May Mắn" title="Hộp Quà May Mắn"/>
                        <div class="tieudehopqua">VG BOX 2</div>
                        <div class="giatien"><i class="fas fa-donate tien"></i> <span id="giatienct">99</span></div> 
                        <div class="nutmua">    
                            <div class="nutquay1" onclick="mohopqua(1,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 1 lần</div>
                            <div class="nutquay2" onclick="mohopqua(20,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 20 lần </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- hop qua 3 -->
            <div class="hopqua1 hopqua3">
                <div class="container_hq">
                    <!-- <img class="nenhopqua" src="images/case5-bg.png" alt=""> -->
                    <div class="thongtinhopqua">
                        <img class="hopqua1_b" src="images/gg3.png" alt="Hộp Quà May Mắn" title="Hộp Quà May Mắn"/>
                        <div class="tieudehopqua">VG BOX 3</div>
                        <div class="giatien"><i class="fas fa-donate tien"></i> <span id="giatienct">99</span></div> 
                        <div class="nutmua">    
                            <div class="nutquay1" onclick="mohopqua(1,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 1 lần</div>
                            <div class="nutquay2" onclick="mohopqua(20,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 20 lần </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- hop qua 4 -->
            <div class="hopqua1 hopqua4">
                <div class="container_hq">
                    <!-- <img class="nenhopqua" src="images/case5-bg.png" alt=""> -->
                    <div class="thongtinhopqua">
                        <img class="hopqua1_b" src="images/gg4.png" alt="Hộp Quà May Mắn" title="Hộp Quà May Mắn"/>
                        <div class="tieudehopqua">VG BOX 4</div>
                        <div class="giatien"><i class="fas fa-donate tien"></i> <span id="giatienct">99</span></div> 
                        <div class="nutmua">    
                            <div class="nutquay1" onclick="mohopqua(1,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 1 lần</div>
                            <div class="nutquay2" onclick="mohopqua(20,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 20 lần </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- hop qua 5 -->
            <div class="hopqua1 hopqua5">
                <div class="container_hq">
                    <!-- <img class="nenhopqua" src="images/case5-bg.png" alt=""> -->
                    <div class="thongtinhopqua">
                        <img class="hopqua1_b" src="images/gg5.png" alt="Hộp Quà May Mắn" title="Hộp Quà May Mắn"/>
                        <div class="tieudehopqua">VG BOX 5</div>
                        <div class="giatien"><i class="fas fa-donate tien"></i> <span id="giatienct">99</span></div> 
                        <div class="nutmua">    
                            <div class="nutquay1" onclick="mohopqua(1,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 1 lần</div>
                            <div class="nutquay2" onclick="mohopqua(20,1,<?php echo $id ?>,<?php echo $coin ?>,<?php echo $manhxe ?>,<?php echo $coinsd ?>,<?php echo $luotmofree ?>,<?php echo $online ?>)">Mở 20 lần </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!--  -->
        </div>
        <!-- content 3 -->
        <div class="nhanluotmo">
            <a onclick="xlnhanluotmo(<?php echo $id ?>,<?php echo $ngaynhanfree ?>,<?php echo $online ?>)">
            <p>Nhận lượt mở miễn phí</p></a></div>
        <!--  -->
        <h2 class="textnhanqua">NHẬN QUÀ</h2>
        <div class="cotmoc">
            <div class="cotmoc_a">
                <div class="cotmoc_aa">
                    <div class="so">x1</div>
                    <div class="hinh"><img src="images/manhxenrg.png"></div>
                    <div class="phanthuong">5 Phiếu Thức Ăn</div>
                    <div class="nutnhanqua" onclick="nhanqua(<?php echo $id ?>,1,<?php echo $manhxe ?>,<?php echo $quamanhxe ?>,<?php echo $online ?>)">NHẬN</div>
                </div>
                <span id="antext"><div class="muiten"><img src="images/arrow.jpg"></div></span>

                <!--  -->
                <div class="cotmoc_aa">
                    <div class="so">x2</div>
                    <div class="hinh"><img src="images/manhxenrg.png"></div>
                    <div class="phanthuong">2 Hạt Giống</div>
                    <div class="nutnhanqua" onclick="nhanqua(<?php echo $id ?>,2,<?php echo $manhxe ?>,<?php echo $quamanhxe ?>,<?php echo $online ?>)">NHẬN</div>
                </div>
                <span id="antext"><div class="muiten"><img src="images/arrow.jpg"></div></span>
                <!--  -->
                <div class="cotmoc_aa">
                    <div class="so">x3</div>
                    <div class="hinh"><img src="images/manhxenrg.png"></div>
                    <div class="phanthuong">200.000$</div>
                    <div class="nutnhanqua" onclick="nhanqua(<?php echo $id ?>,3,<?php echo $manhxe ?>,<?php echo $quamanhxe ?>,<?php echo $online ?>)">NHẬN</div>
                </div>
                <span id="antext"><div class="muiten"><img src="images/arrow.jpg"></div></span>
                <!--  -->
                <div class="cotmoc_aa">
                    <div class="so">x4</div>
                    <div class="hinh"><img src="images/manhxenrg.png"></div>
                    <div class="phanthuong">VIP GOLD 1 THÁNG</div>
                    <div class="nutnhanqua" onclick="nhanqua(<?php echo $id ?>,4,<?php echo $manhxe ?>,<?php echo $quamanhxe ?>,<?php echo $online ?>)">NHẬN</div>
                </div>
                <span id="antext"><div class="muiten"><img src="images/arrow.jpg"></div></span>
               
                
                <!--  -->
            </div>
            <div class="cotmoc_b">
                <a onclick="nhanqua(<?php echo $id ?>,5,<?php echo $manhxe ?>,<?php echo $quamanhxe ?>,<?php echo $online ?>)"><img src="images/manhxenrgtt.png"></a>
            </div>
        </div>
        <!-- content 4 -->
        <h2 class="textls">LỊCH SỬ NHẬN QUÀ</h2>
        <div class="lichsu" id="lichsu">
            <ul>
                <?php
                   $qrls = "select  `sqlid`, `thoigianmo`, `vatpham`, `Username` from `luckybox` l join `accounts` a on (l.sqlid = a.id) ORDER BY l.`id` desc Limit 0,100";
                   $resultls = mysqli_query($connect, $qrls);
                   while($rowls = mysqli_fetch_array($resultls))
                   {
                   ?>
                <li><p>[<?php echo date("d/m/Y - H:m:s", strtotime($rowls['thoigianmo'])); ?>] <span id="tennguoinhan"> <?php echo $rowls['Username'] ?> </span> vừa nhận được <span id="tenvatpham"><?php echo $rowls['vatpham'] ?></span>.</p></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    
    <footer>

    </footer>
</body>
<script>
    function xlnhanluotmo(id,ngaynhanfree,online)
    {
        if(id == 0)
        {
            alert('THẤT BẠI !! Bạn chưa đăng nhập.');
			return false;
        }
        else
        {
            var today = new Date();
            var ngaynhan = String(today.getDate()).padStart(2, '0');
		
            if(ngaynhanfree == ngaynhan)
            {
                alert('THẤT BẠI !! Bạn đã nhận lượt mở hôm nay rồi.');
                return false;
            }
            else
            {
                if(online == 1)
                {
                    alert('THẤT BẠI !! Hãy thoát game trước khi nhận quà.');
                    return false;
                }
                else{
                    alert('Bạn vừa nhận được 1 lượt mở miễn phí.');
                    window.location = "thuvien/xlnhanluotmo.php?id="+id;
                }
                
            }
        }
        
    }
    function xlthoat(id)
    {
        alert('Bạn đã đăng xuất thành công.');
        window.location = "thuvien/xlthoat.php";
    }
    function mohopqua(solan,loai,id,coin,manhxe,coinsd, luotfree,online)
    {
        if(id == 0)
        {
            alert('Bạn chưa đăng nhập.');
			return false;
        }
        var x;
        var tien;
        if(online == 1)
        {
            alert('Hãy thoát game trước khi mở hộp quà.');
            return false;
        }
        if(solan == 1)
        {
            
            if(luotfree > 0)
            {
                tien = 0;
                x = confirm("Bạn có lượt mở miễn phí, muốn sử dụng?");
            }
            else{
                tien = 99;
                x = confirm("Mở 1 lần cần 99 coin, bạn có đồng ý mở?");
            }
            
        }
        else if(solan == 20)
        {
            x = confirm("Mở 20 lần cần 1499 coin, bạn có đồng ý mở?");
            tien = 1499;
        }
        if(x)
        {
            if(coin < tien)
            {
                alert("Bạn không đủ Coin, hãy nạp thêm để mở.");
                return false;
            }
            //
            if(solan == 1)
            {
                var rand = Math.floor((Math.random() * 100) + 1);
                if(manhxe == 0)
                {
                    if(rand >= 1 && rand <= 51)
                    {
                        alert("Xin chúc mừng, bạn đã trúng 1 mãnh xe NRG-500");
                        window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=101";
                    }
                    else 
                    {
                        if(rand >= 52 && rand <= 80)
                        {
                            alert("Bạn đã nhận được 1 hạt giống cần sa.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=102";
                        }
                        else  if(rand >= 81 && rand <= 90)
                        {
                            alert("Bạn đã nhận được 3 hộp nước cam.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=103";
                        }
                        else  if(rand >= 91 && rand <= 93)
                        {
                            alert("Bạn đã nhận được 1 cơm hộp.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=104";
                        }
                        else  if(rand >= 94 && rand <= 96)
                        {
                            alert("Bạn đã nhận được 10.000$.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=105";
                        }
                        else  if(rand >= 97 && rand <= 99)
                        {
                            alert("Bạn đã nhận được một khẩu Shotgun.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=106";
                        }
                        else  if(rand == 100)
                        {
                            alert("Bạn đã nhận được một khẩu AK-47.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=107";
                        }
                    }
                }
                // manh xe 1
                else if(manhxe >= 1 && manhxe <= 3)
                {
                    if(rand >= 1 && rand <= 25)
                    {
                        alert("Xin chúc mừng, bạn đã trúng 1 mãnh xe NRG-500");
                        window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=101";
                    }
                    else 
                    {
                        if(rand >= 26 && rand <= 50)
                        {
                            alert("Bạn đã nhận được 1 hạt giống cần sa.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=102";
                        }
                        else  if(rand >= 51 && rand <= 70)
                        {
                            alert("Bạn đã nhận được 3 hộp nước cam.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=103";
                        }
                        else  if(rand >= 71 && rand <= 83)
                        {
                            alert("Bạn đã nhận được 1 cơm hộp.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=104";
                        }
                        else  if(rand >= 84 && rand <= 90)
                        {
                            alert("Bạn đã nhận được 1 cành củi khô.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=105";
                        }
                        else  if(rand >= 91 && rand <= 93)
                        {
                            alert("Bạn đã nhận được một khẩu Shotgun.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=106";
                        }
                        else  if(rand == 94)
                        {
                            alert("Bạn đã nhận được một khẩu AK-47.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=107";
                        }
                        else  if(rand >= 95 && rand <= 96)
                        {
                            alert("Bạn đã nhận được 1 phương tiện ngẫu nhiên.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=108";
                        }
                        else  if(rand >= 97 && rand <= 99)
                        {
                            alert("Bạn đã nhận được 3 phiếu ăn.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=109";
                        }
                        else  if(rand == 100)
                        {
                            alert("Bạn đã nhận được một khẩu DE.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=110";
                        }
                    }
                }
                // manh xe 4
                else if(manhxe == 4)
                {
                    if(coinsd >= 10000)
                    {
                        alert("Xin chúc mừng, bạn đã trúng 1 mãnh xe NRG-500");
                        window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=101";
                    }
                    else 
                    {
                        if(rand >= 1 && rand <= 20)
                        {
                            alert("Bạn đã nhận được 1 hạt giống cần sa.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=102";
                        }
                        else  if(rand >= 31 && rand <= 40)
                        {
                            alert("Bạn đã nhận được 3 hộp nước cam.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=103";
                        }
                        else  if(rand >= 41 && rand <= 53)
                        {
                            alert("Bạn đã nhận được 1 cơm hộp.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=104";
                        }
                        else  if(rand >= 54 && rand <= 70)
                        {
                            alert("Bạn đã nhận được 1 cành củi khô.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=105";
                        }
                        else  if(rand >= 71 && rand <= 73)
                        {
                            alert("Bạn đã nhận được một khẩu Shotgun.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=106";
                        }
                        else  if(rand == 74)
                        {
                            alert("Bạn đã nhận được một khẩu AK-47.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=107";
                        }
                        else  if(rand >= 75 && rand <= 86)
                        {
                            alert("Bạn đã nhận được 1 phương tiện ngẫu nhiên.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=108";
                        }
                        else  if(rand >= 87 && rand <= 99)
                        {
                            alert("Bạn đã nhận được 3 phiếu ăn.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=109";
                        }
                        else  if(rand == 100)
                        {
                            alert("Bạn đã nhận được một khẩu DE.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=110";
                        }
                    }
                }
                // manh xe 5
                else if(manhxe >= 5)
                {
                    if(rand >= 1 && rand <= 25)
                    {
                        alert("Xin chúc mừng, bạn đã trúng 1 mãnh xe NRG-500");
                        window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=101";
                    }
                    else 
                    {
                        if(rand >= 26 && rand <= 50)
                        {
                            alert("Bạn đã nhận được 1 hạt giống cần sa.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=102";
                        }
                        else  if(rand >= 51 && rand <= 70)
                        {
                            alert("Bạn đã nhận được 3 hộp nước cam.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=103";
                        }
                        else  if(rand >= 71 && rand <= 83)
                        {
                            alert("Bạn đã nhận được 1 cơm hộp.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=104";
                        }
                        else  if(rand >= 84 && rand <= 90)
                        {
                            alert("Bạn đã nhận được 1 cành củi khô.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=105";
                        }
                        else  if(rand >= 91 && rand <= 93)
                        {
                            alert("Bạn đã nhận được một khẩu Shotgun.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=106";
                        }
                        else  if(rand == 94)
                        {
                            alert("Bạn đã nhận được một khẩu AK-47.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=107";
                        }
                        else  if(rand >= 95 && rand <= 96)
                        {
                            alert("Bạn đã nhận được 1 phương tiện ngẫu nhiên.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=108";
                        }
                        else  if(rand >= 97 && rand <= 99)
                        {
                            alert("Bạn đã nhận được 3 phiếu ăn.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=109";
                        }
                        else  if(rand == 100)
                        {
                            alert("Bạn đã nhận được một khẩu DE.");
                            alert("Phần thưởng sẽ được chuyển vào túi đồ trong game (H).");
                            window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+"&&rand=110";
                        }
                    }
                }
            //  
            }
            else if(solan == 20)
            {
                var idvp = "";
                var string = 'VGTA.VN - [LUCKY BOX] Phần quà nhận được: \n';
                for(i = 1 ; i <= 20; i++)
                {
                    var rand = Math.floor((Math.random() * 100) + 1);
                    if(rand >= 0 && rand <= 5)
                    {
                        if(manhxe < 4)
                        {
                            string = string + "\n(" + i + ") - Mảnh Xe";
                            idvp = idvp + "&&g"+i+"="+101+"";
                            manhxe=manhxe+1;
                        }
                        else
                        {
                            if(coinsd >= 10000)
                            {
                                string = string + "\n(" + i + ") - Mảnh Xe";
                                idvp = idvp + "&&g"+i+"="+101+"";
                            }
                            else
                            {
                                string = string + "\n(" + i + ") - 3 Hộp Nước Cam";
                                idvp = idvp + "&&g"+i+"="+103+""
                            }
                        }
                        
                    }
                    else if(rand >= 6 && rand <= 15)
                    {
                        string = string + "\n(" + i + ") - Hạt giống cần sa";
                        idvp = idvp + "&&g"+i+"="+102+""
                    }
                    else if(rand >= 16 && rand <= 30 || rand >= 93 && rand <= 96)
                    {
                        string = string + "\n(" + i + ") - 3 Hộp Nước Cam";
                        idvp = idvp + "&&g"+i+"="+103+""
                    }
                    else if(rand >= 31 && rand <= 41 || rand >= 97 && rand <= 100)
                    {
                        string = string + "\n(" + i + ") - 1 Hộp Cơm";
                        idvp = idvp + "&&g"+i+"="+104+""
                    }
                    else if(rand >= 42 && rand <= 45)
                    {
                        string = string + "\n(" + i + ") - 1 Cành Củi Khô";
                        idvp = idvp + "&&g"+i+"="+105+""
                    }
                    else if(rand >= 46 && rand <= 50)
                    {
                        string = string + "\n(" + i + ") - 1 Khẩu shotgun";
                        idvp = idvp + "&&g"+i+"="+106+""
                    }
                    else if(rand >= 51 && rand <= 52)
                    {
                        string = string + "\n(" + i + ") - 1 Khẩu AK";
                        idvp = idvp + "&&g"+i+"="+107+""
                    }
                    else if(rand >= 53 && rand <= 60)
                    {
                        string = string + "\n(" + i + ") - 1 Phương tiện ngẫu nhiên";
                        idvp = idvp + "&&g"+i+"="+108+""
                    }
                    else if(rand >= 61 && rand <= 90)
                    {
                        string = string + "\n(" + i + ") - 3 Phiếu Ăn";
                        idvp = idvp + "&&g"+i+"="+109+""
                    }
                    else if(rand >= 91 && rand <= 92)
                    {
                        string = string + "\n(" + i + ") - 1 Khẩu DE";
                        idvp = idvp + "&&g"+i+"="+110+""
                    }
                }
                
                alert(string);
                window.location = "thuvien/xlmohopqua.php?id="+id+"&&solan="+solan+idvp;
            }
        }
        else{
            // alert('ban da tu choi');
        }
        
    }
    function nhanqua(id,yeucau,manhxe,quamanhxe,online)
    {
        if(id == 0)
        {
            alert("Thất Bại !! Bạn chưa đăng nhập.");
            return false;
        }
        if(online == 1)
        {
            alert('Hãy thoát game trước khi nhận quà.');
            return false;
        }
        if(manhxe < yeucau)
        {
            alert("Bạn không có đủ số mảnh xe để nhận quà này.");
            return false;
        }
        else
        {
            if(quamanhxe >= yeucau)
            {
                alert("Bạn đã nhận phần quà này rồi.");
                return false;
            }
            else
            {
                var string = "";
                if(yeucau == 1 && quamanhxe == 0)
                {
                    string = "Bạn đã nhận được 5 phiếu ăn từ phần quà 1 Mảnh Xe.";
                    alert(string);
                    alert("Phần thưởng đã được chuyển vào trong game");
                    window.location = "thuvien/xlnhanquacotmoc.php?id="+id+"&&yeucau="+yeucau;
                }
                else if(yeucau == 2 && quamanhxe == 1)
                {
                    string = "Bạn đã nhận được 2 Hạt giống cần sa từ phần quà 2 Mảnh Xe.";
                    alert(string);
                    alert("Phần thưởng đã được chuyển vào trong game");
                    window.location = "thuvien/xlnhanquacotmoc.php?id="+id+"&&yeucau="+yeucau;
                }
                else if(yeucau == 3 && quamanhxe == 2)
                {
                    string = "Bạn đã nhận được 200.000$ từ phần quà 3 Mảnh Xe.";
                    alert(string);
                    alert("Phần thưởng đã được chuyển vào trong game");
                    window.location = "thuvien/xlnhanquacotmoc.php?id="+id+"&&yeucau="+yeucau;
                }
                else if(yeucau == 4 && quamanhxe == 3)
                {
                    string = "Bạn đã nhận được VIP GOLD 1 THÁNG (/phieucuatoi) từ phần quà 4 Mảnh Xe.";
                    alert(string);
                    alert("Phần thưởng đã được chuyển vào trong game");
                    window.location = "thuvien/xlnhanquacotmoc.php?id="+id+"&&yeucau="+yeucau;
                }
                else if(yeucau == 5 && quamanhxe == 4)
                {
                    string = "WOWWW !!! Bạn đã nhận được SIÊU XE NRG-500 từ phần quà 5 Mảnh Xe.";
                    alert(string);
                    alert("Phần thưởng đã được chuyển vào trong game");
                    window.location = "thuvien/xlnhanquacotmoc.php?id="+id+"&&yeucau="+yeucau;
                }
                else
                {
                    alert("Phải nhận phần quà theo cột móc.");
                    return false; 
                }
                
            }
        }
    }
</script>  
</html>
