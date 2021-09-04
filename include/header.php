<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=(isset($PAGE_TITLE) && ($PAGE_TITLE != "") ? $PAGE_TITLE : "Dental health");?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/styles/main.css" />
    <script src='assets/js/main.js'></script>
    <?php
    if (isset($PAGE_JS) && (count($PAGE_JS)>0))
    {
        for($i=0;$i<count($PAGE_JS);$i++)
        {
            echo '<script src="'.$PAGE_JS[$i].'"></script>';
        }
    }
    ?>
</head>

<body onload="animation()">
    <div class="fixed-container">
        <header>
            <div class="logo">
                <div class="logo-img">
                    <a href="index.php"><img src="assets/images/tooth.png" alt="Tooth"></a>
                </div>
                <div class="logo-text">
                    <img src="assets/images/tooth_text.png" id="anim-img" alt="Logotype">
                </div>
                <div>
                    <div class="about-us-logo">
                        <span>
                            These innovations have served to enable us to <br> better live our mission; "To build partnerships <br>
                            that improve our customers' earnings by co-managing <br> their supply, equipment and practice management needs".
                        </span>
                    </div>
                    <data value="31">Wednesday, October 23, 2002</data>
                </div>
            </div>
            <div class="site-search">
                <div class="contacts">
                    <a href="#" class="icon-top icon-help"><span>help</span></a>
                    <a href="#" class="icon-top icon-about"><span>about us</span></a>
                    <a href="mailto:dental.helth@gmail.com" class="icon-top icon-contact"><span>contact</span></a>
                </div>
                <div class="search">
                    <form name="searching" method="get" action="index-variables.php">
                        <label>SEARCH:
                            <input type="search" name="search">
                        </label>
                        <button type="submit">ok</button>
                    </form>
                </div>
            </div>
        </header>
        <aside>
            <nav>
                <ul class="menu-elements">
                    <li><a href="index-reg-post.php">Registration</a></li>
                    <li><a href="index-variables.php">Viewing variables</a></li>
                    <li><a href="index-redirect.php">Redirection</a></li>
                    <li><a href="index-filesystem.php">File system</a></li>
                    <li><a href="index-store.php">Dental store</a></li>
                    <li><a href="index-calendar.php">Calendar</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Seminars</a></li>
                    <li><a href="#">Practice Development</a></li>
                    <li><a href="#">Painless Web</a></li>
                    <li><a href="#">BluChips Rewards</a></li>
                    <li><a href="#">Earnings Builders</a></li>
                    <li><a href="#">Interlink</a></li>
                    <li><a href="#">Featured Products</a></li>
                    <li><a href="#">Parthers</a></li>
                    <li><a href="#">International</a></li>
                    <li><a href="#">Government</a></li>
                    <li><a href="#">Handpiece repairs</a></li>
                </ul>
            </nav>
            <div class="site-add">
                <div class="icon-features">
                    <a href="#">Spotlight Features</a>
                </div>
                <div class="pills">
                    <img src="assets/images/layer9.jpg" alt="Pills">
                </div>
                <div class="site-add-text">
                    <a href="#">Seminars in your area</a><br>Dates, topics, locations, & prices. Save 10% when 3 or more sign-up!
                </div>
                <div class="site-add-text">
                    <a href="#">Topics, Trends, Techniques</a><br>Don't let your patients give you the brush-off. Increase patient acceptance!
                </div>
            </div>
        </aside>
        <main class="main-part">
