<?php
session_start();
include_once 'header.php';
?>
<?php if (isset($_SESSION['username'])): ?>
<header class="header white-bg">
    <!--     <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div> -->
    <?php
$query_title = "SELECT * FROM master limit 1";
$result1 = $connecion->query($query_title);
while ($row1 = $result1->fetch_assoc()) {
	?>
    <a href="/Project/" class="logo">پروژه <span><?php echo $row1['site_name']; ?></span></a>
    <?php }?>
    <div class="nav notify-row" id="top_menu">
    </div>
    <div class="top-nav ">
        <ul class="nav pull-right top-menu">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="img/avatar1_small.jpg">
                    <span class="username">
                    <?php echo $_SESSION['username']; ?>
                    </span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                    <li><a href="#"><i class="icon-cog"></i> تنظیمات</a></li>
                    <li><a href="#"><i class="icon-bell-alt"></i> اعلام ها</a></li>
                    <li><a href="logout.php"><i class="icon-key"></i> خروج</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="index.php?show=main">
                    <i class="icon-dashboard"></i>
                    <span>صفحه اصلی</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>صفحه اصلی نرم افزار</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="../index.php?show=news">صفحه اصلی نرم افزار</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>ایجا دسته بندی</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="index.php?show=category">دسته بندی</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>ارسال خبر جدید</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="index.php?show=news">ارسال خبر جدید</a></li>
                    <li><a class="" href="index.php?show=allnews">مشاهده همه احبار</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-cogs"></i>
                    <span>گالری صوتی و تصویری</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="index.php?show=images">مدیریت تصاویر</a></li>
                    <li><a class="" href="index.php?show=movies">مدیریت فیلم ها</a></li>
                    <li><a class="" href="index.php?show=sounds">مدیریت صوت ها</a></li>
                </ul>
            </li>






            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>پیوندها</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="index.php?show=other_sites">سایت جدید</a></li>
                    <li><a class="" href="index.php?show=allnews">مشاهده همه موارد</a></li>
                </ul>
            </li>





            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-tasks"></i>
                    <span>کاربران</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="index.php?show=allusers">مدیریت کاربرها</a></li>
                    <li><a class="" href="index.php?show=role">نقشها</a></li>
                    <li><a class="" href="index.php?show=chart">چارت سازمانی</a></li>
                </ul>


            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-tasks"></i>
                    <span>تنظیمات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="index.php?show=master">تنظیمات کلی نرم افزار</a></li>
                </ul>
            </li>
            <li>
                <a class=""  href="logout.php">
                    <i class="icon-user"></i>
                    <span>خروج از نرم افزار</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<section id="main-content">
    <section class="wrapper">
        <?php
if (isset($_REQUEST['show'])) {
	$show = $_REQUEST['show'];
}
switch ($show) {
case 'news':
	include 'news.php';
	break;
case 'images':
	echo file_get_contents('images.php');
	break;
case 'movies':
	echo file_get_contents('movies.php');
	break;
case 'sounds':
	echo file_get_contents('sounds.php');
	break;
case 'allnews':
	echo file_get_contents('allnews.php');
	break;
case 'master':
	echo file_get_contents('master.php');
	break;
case 'category':
	echo file_get_contents('category.php');
	break;
case 'allusers':
	echo file_get_contents('users.php');
	break;
case 'other_sites':
	echo file_get_contents('other_sites.php');
	break;
    case 'chart':
    echo file_get_contents('chart.php');
    break;
        case 'role':
    echo file_get_contents('role.php');
    break;
default:
	echo file_get_contents('main.php');
	break;
}
?>
    </section>
</section>
<?php endif?>
<?php if (!isset($_SESSION['username'])): ?>
<body class="login-body">
    <div class="container">
        <form class="form-signin" action="../commands.php?type=login" method="POST">
            <h2 class="form-signin-heading">ورود به صفحه مدیریت</h2>
            <div class="login-wrap">
                <input type="text" name="username" class="form-control" placeholder="نام کاربری" autofocus>
                <input type="password" name="password" class="form-control" placeholder="کلمه عبور">
                <!-- <input name="captcha" type="text"> -->
                <input type="text" name="captcha" class="form-control" placeholder="متن زیر را وارد کنید">
                <img src="captcha.php" /><br>
                <button class="btn btn-lg btn-login btn-block" type="submit">ورود</button>
            </div>
        </form>
    </div>
</body>
<?php endif?>
<?php
echo file_get_contents("footer.php");
?>
