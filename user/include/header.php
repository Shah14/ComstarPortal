        <!-- start header -->
        <header>
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav navbar-fixed-top header-dark background-transparent nav-box-width white-link navbar-expand-lg menu-center border-white-light border-bottom">
                <div class="container-fluid nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto col-lg-2 pl-0">
                        <a href="<?php if($page=="Home"){echo "#home";}else{echo "home.php";} ?>" title="COMSTAR Portal" class="logo inner-link">
                            <img src="../../assets/logo/logo.png" data-rjs="../../assets/logo/logo.png" class="logo-dark" alt="Pofo">
                            <img src="../../template/POFO/html/images/logo-white.png" data-rjs="../../template/POFO/html/images/logo-white@2x.png" alt="Pofo" class="logo-light default">
                        </a>
                    </div>
                    <!-- end logo -->
                    <div class="col accordion-menu pr-0 pr-md-3">
                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse justify-content-center" id="navbar-collapse-toggle-1">
                            <ul id="accordion" class="nav navbar-nav no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                <!-- start menu item -->
                                <li class="dropdown simple-dropdown ">
                                    <a href="<?php if($page=="Home"){echo "#home";}else{echo "home.php";} ?>" class="inner-link"><i class="ti-home"></i>&emsp;Home</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?php if($page=="Home"){echo "#about";}else{echo "home.php#about";} ?>" class="inner-link"><i class="ti-info-alt"></i>&emsp;About</a></li>
                                            <li class="dropdown"><a class="dropdown-toggle inner-link" data-toggle="dropdown" href="<?php if($page=="Home"){echo "#member";}else{echo "home.php#member";} ?>" class="inner-link"><i class="ti-user"></i>&emsp;Members <i class="fas fa-angle-right"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php if($page=="member"){echo "#current";}else{echo "member.php#current";} ?>"><i class="ti-user"></i>&emsp;Current Session</a></li>
                                                    <li><a href="<?php if($page=="member"){echo "#previous";}else{echo "member.php#previous";} ?>"><i class="ti-user"></i>&emsp;Previous Session</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                </li>
                                <!-- end menu item -->

                                <li><a href="#contact" class="inner-link"><i class="ti-email"></i>&emsp;Contact</a></li>

                                <li class="dropdown simple-dropdown ">
                                    <a href="<?php if($page=="Home"){echo "#services";}else{echo "home.php#services";} ?>" class="inner-link"><i class="ti-view-list-alt"></i>&emsp;Services</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?php if($page=="Home"){echo "#advertisement";}else{echo "home.php#advertisement";} ?>" class="inner-link"><i class="ti-announcement"></i>&emsp;Advertisement</a></li>
                                            <li class="dropdown"><a class="dropdown-toggle inner-link" data-toggle="dropdown" href="<?php if($page=="Home"){echo "#gallery";}else{echo "home.php#gallery";} ?>" class="inner-link"><i class="ti-gallery"></i>&emsp;Gallery <i class="fas fa-angle-right"></i></a>
                                                <ul class="dropdown-menu">
                                                     <li><a href="gallery.php"><i class="ti-gallery"></i>&emsp;View Gallery</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="programme.php"><i class="ti-calendar"></i>&emsp;Programme <i class="fas fa-angle-right"></i></a>
                                                <ul class="dropdown-menu">
                                                     <li><a href="programme.php#comstar"><i class="ti-calendar"></i>&emsp;COMSTAR</a></li>
                                                     <li><a href="programme.php#utm"><i class="ti-calendar"></i>&emsp;UTM</a></li>
                                                     <li><a href="programme.php#public"><i class="ti-calendar"></i>&emsp;Public</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a class="dropdown-toggle inner-link" data-toggle="dropdown" href="<?php if($page=="Home"){echo "#video";}else{echo "home.php#video";} ?>" class="inner-link"><i class="ti-video-camera"></i>&emsp;Video Library <i class="fas fa-angle-right"></i></a>
                                                <ul class="dropdown-menu">
                                                     <li><a href="video.php"><i class="ti-video-camera"></i>&emsp;View Video Library</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="forum.php"><i class="ti-comments"></i>&emsp;Forum</a></li>
                                            <li><a href="<?php if($page=="Home"){echo "#fee";}else{echo "home.php#fee";} ?>" class="inner-link"><i class="ti-money"></i>&emsp;Fee</a></li>
                                            <li><a href="<?php if($page=="Home"){echo "#faq";}else{echo "home.php#faq";} ?>" class="inner-link"><i class="ti-help-alt"></i>&emsp;FAQs</a></li>
                                            <li><a href="support.php"><i class="ti-headphone-alt"></i>&emsp;Technical Supports</a></li>
                                        </ul>
                                </li>

                                <li class="dropdown simple-dropdown ">
                                    <a href="profile.php"><i class="ti-user"></i>&emsp;<?php echo $name ?></a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="profile.php"><i class="ti-id-badge"></i>&emsp;View Profile</a></li>
                                            <li><a href="payment.php"><i class="ti-wallet"></i>&emsp;View Payment History</a></li>
                                            <li><a href="../../account/login/logout.php"><i class="ti-power-off"></i>&emsp;Log Out</a></li>
                                        </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-lg-2 pr-0 text-right">
                        <div class="header-social-icon d-none d-md-inline-block no-border-left no-padding-left no-margin-left">
                            <a class="facebook text-white-2" href="https://www.facebook.com/groups/COMSTAR.UTMKL" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <a class="twitter text-white-2" href="https://linktr.ee/ComstarMediaSocial" target="_blank"><i class="fa fa-link"></i></a>
                            <a class="google text-white-2" href="https://www.youtube.com/channel/UCkagvAQ9G15bj63Z9CUYL_g/featured" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a class="instagram text-white-2" href="https://www.instagram.com/comstar.utmkl/?hl=en" target="_blank"><i class="fab fa-instagram mr-0" aria-hidden="true"></i></a>
                            <a class="telegram text-white-2" href="https://t.me/officialcomstar" target="_blank"><i class="fab fa-telegram" aria-hidden="true"></i></a>                        
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation --> 
        </header>
        <!-- end header -->