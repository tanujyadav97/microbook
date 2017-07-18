<html>
<link href="../css2/login7.css" rel='stylesheet' type='text/css'/ >
 <script src="../javascript/main3.js" type="text/javascript"></script>

<body >
<div id="container">
       
        
        <div id="modal" class="popupContainer" style="display:none;">
                <header class="popupHeader">
                        <span class="header_title">Login</span>
                        <span class="modal_close"><a class="modal_close" >Close</a></span>
                </header>

                <section class="popupBody">
                        <!-- Social Login -->
                        <div class="social_login">
                                <div class="">
                                        <a href="#" class="social_box fb">
                                                <span class="icon"><i class="fa fa-facebook"></i></span>
                                                <span class="icon_title">Connect with Facebook</span>

                                        </a>

                                        <a href="#" class="social_box google">
                                                <span class="icon"><i class="fa fa-google-plus"></i></span>
                                                <span class="icon_title">Connect with Google</span>
                                        </a>
                                </div>

                               

                                <div class="action_btns">
                                        <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                                        <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
                                </div>
                        </div>

                        <!-- Username & Password Login form -->
                        <div class="user_login" style="display:none;">
                                <form>
                                        <label>Email / Username</label>
                                        <input type="text" class="ns" />
                                        <br />

                                        <label>Password</label>
                                        <input type="password" />
                                        <br />

                                        <div class="checkbox">
                                                <input id="remember" type="checkbox" />
                                                <label for="remember">Remember me on this computer</label>
                                        </div>

                                        <div class="action_btns">
                                                <div class="one_half"><a href="#" id="btn_back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                                                <div class="one_half last"><a href="#" class="btn_btn_red">Login</a></div>
                                        </div>
                                </form>

                                <a href="#" class="forgot_password">Forgot password?</a>
                        </div>

                        <!-- Register Form -->
                        <div class="user_register" style="display:none;" >
                                <form method="POST" action="../php/connect.php">
                                        <label>Full Name</label>
                                        <input type="text" name="name" />
                                        <br />

                                        <label>Email Address</label>
                                        <input type="email" name="email"/>
                                        <br />

                                        <label>username:</label>
                                        <input type="text" name="username"/>
                                        <br />

                                        

                                        <div class="action_btns">
                                                <div class="one_half"><a href="#" id="btn_back_btn1"><i class="fa fa-angle-double-left"></i> Back</a></div>
                                                <div class="one_half last"><input type="submit" class="btn btn_red" name="register"/></div>
                                        </div>
                                </form>
                        </div>
                </section>
        </div>
</div>
</body>
</html>