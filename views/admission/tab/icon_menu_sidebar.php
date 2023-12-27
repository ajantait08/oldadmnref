<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
body {font-family: "Lato", sans-serif;}

.sidebar {

  height: 100%;
  width: 160px;
  position: fixed;
  top:100px;
  z-index: 1;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

ul{
	position:absolute;/* set the position of the navigation bar*/
	top: 20%;
	left: 50%;
	transform: translate(-50%,-50%);
	margin: 0;
	padding: 20px 0; /* Adding some padding */
	background: #fff; /* Add a white background color to the top navigation */
	display: flex; /* flex Set navigation bar horizontally using the  display tag*/
	border-radius: 10px; /* add the border radius */
	box-shadow: 0 10px 30px rgba(0,0,0,.3)
}
 /* Style the links inside the navigation bar */
ul li{
	list-style: none;
	text-align: center;
	display: block;
	border-right: 1px solid rgba(0,0,0,0.2);
}
ul li:last-child{
	border-right: none;
}
ul li a{
	text-decoration: none;
	padding: 0 50px;
	display: block;
}
/* Style the icon inside the navigation bar */
ul li a .icon{
	width: 40px; /* changing the width of the icon */
	height: 40px; /* changing the height of the icon */
	text-align: center;
	
	overflow: hidden;
	margin: 0 auto 10px;
	
}
/* set the size, height, width of the icon*/
ul li a .icon .fa{
	width: 100%;
	height: 100%;
	line-height: 40px;
	font-size: 34px;
	transition: 0.5s; /* adding the transition to make it more attractive */
	color: #000;
}

/* Change the color of icon on hover */
ul li a .icon .fa:last-child{
	color: aqua;
}
/* style the color and transform of the icon on hover */
ul li a:hover .icon .fa{
	transform: translateY(-100%); /* translate y to add the hover effect */
}
ul li a .name{
	position: relative;
	height: 20px; 
	width: 100%;
	display: block;
	overflow: hidden;/*make ul li a .name overflow is hidden*/
}
/*style the font size and set transition of the navigation menu*/
ul li a .name span{
	display: block;
	position: relative;
	color: #000;
	font-size: 18px; /* changing font size */
	line-height: 20px;
	transition: 0.5s; /* adding the transition to make it more attractive */
	
}
/*set and change position, top, width, left, height color of the 'class'.name span:before*/
ul li a .name span:before{
	content: attr(data-text);
	position: absolute;
	top: -100%;
	width: 100%;
	left: 0;
	height: 1005;
	color: aqua;
	
}
/*style hover effect of ul li a .name span */
ul li a:hover .name span{
	transform: translateY(20px);
}
.icon-bar {
  width: 90px;
  background-color: #555;
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}

.icon-bar a:hover {
  background-color: #000;
}

.active {
  background-color: #04AA6D;
}
/*FOOTER*/

footer {
  background: #16222A;
  background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  background: linear-gradient(59deg, #3A6073, #16222A);
  color: white;
  margin-top:100px;
}

footer a {
  color: #fff;
  font-size: 14px;
  transition-duration: 0.2s;
}

footer a:hover {
  color: #FA944B;
  text-decoration: none;
}

.copy {
  font-size: 12px;
  padding: 10px;
  border-top: 1px solid #FFFFFF;
}

.footer-middle {
  padding-top: 2em;
  color: white;
}


</style>
<!-- top navigation -->
<!-- <div class="row header">
    <div class="col-md-12 ">
      <div id="logo_header" >
        <div class=" col-lg-2 col-md-2 col-xs-12 logo_space"></div>
          <div class="col-lg-8 col-md-8  col-xs-12">
             <div class="col-lg-2 col-md-2  col-xs-12 logo_container">
                <a href="#" style=""><img id="logo" src="<?php echo base_url("/assets/img/logo.png")?>" alt="logo" height="92"></a>
              </div>
              <div class="col-lg-10 col-md-10 col-xs-12 name_container" style="text-align: center;
              text-align:center;
              margin-top: 20px;
                 }">
              <span class="border1" style="color: white;"><b> भारतीय प्रौद्योगिकी संस्थान  <span style="font-family:arial">(भारतीय&nbsp;खनि&nbsp;विद्यापीठ), धनबाद</b></span></span>
               <br>
              <span class="border1" style="color: white;font-size:110%;"><b>INDIAN INSTITUTE OF TECHNOLOGY (INDIAN&nbsp;SCHOOL&nbsp;OF&nbsp;MINES), DHANBAD</b></span>
             </span>
           </div>
          </div>
        <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-12 logo_space"></div>
      </div>
    </div> 
  </div>
  </div> -->

<!-- /top navigation -->
    <!-- icon menu navbar start  -->
    <div class="icon_menu_nabar">
        <ul class="menu_top">
            <!--starting ul tag to create unordered lists.-->
            <li>
                <!--The HTML li element is used to represent an item in a list. ... In menus and unordered lists-->
                <!--the a tag defines a hyperlink, which is used to link from one page to another-->
                <a href="#">
                    <!-- this anchor text for link your home to another page -->
                    <div class="icon">
                        <i class="fa fa-home" aria-hidden="true"></i><!-- this is home icon link get form fornt-awesome icon for home button -->	
                        <i class="fa fa-home" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->	
                    </div>
                    <div class="name"><span data-text="Home">Home</span></div>
                    <!-- we are create first menu item name home -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your About page to another page -->
                    <div class="icon">
                        <i class="fa fa-file" aria-hidden="true"></i><!-- this is file icon link get form fornt-awesome icon for about -->	
                        <i class="fa fa-file" aria-hidden="true"></i><!-- copy and paste the file icon link here for hover effect -->		
                    </div>
                    <div class="name"><span data-text="About">About</span></div>
                    <!-- we are create second menu item name About -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your service page to another page -->
                    <div class="icon">
                        <i class="fa fa-cogs" aria-hidden="true"></i><!-- this is cogs icon link get form fornt-awesome iocn for service menu -->	
                        <i class="fa fa-cogs" aria-hidden="true"></i><!-- copy and paste the cogs icon link here for hover effect -->	
                    </div>
                    <div class="name"><span data-text="Services">Services</span></div>
                    <!--- we are create third menu item name services -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your portfolio page to another page -->
                    <div class="icon">
                        <i class="fa fa-picture-o" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio --> 	
                        <i class="fa fa-picture-o" aria-hidden="true"></i><!-- copy and paste the picture icon link here for hover effect -->		
                    </div>
                    <div class="name" ><span data-text="Portfolio">Portfolio</span></div>
                    <!-- we are create fourth menu item name portfolio -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your team page to another page -->
                    <div class="icon">
                        <i class="fa fa-users" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio --> 	
                        <i class="fa fa-users" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->			
                    </div>
                    <div class="name"><span data-text="Team">Team</span></div>
                    <!-- we create first menu item name home -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your home to another page -->
                    <div class="icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i><!-- this is picture icon link get form fornt-awesome icon for portfolio --> 		
                        <i class="fa fa-envelope" aria-hidden="true"></i><!-- copy and paste the home icon link here for hover effect -->		
                    </div>
                    <div class="name"><span data-text="Contact">Contact</span></div>
                    <!-- we create first menu item name home -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your Blog page to another page -->
                    <div class="icon">
                        <i class="fa fa-book" aria-hidden="true"></i><!-- this is Book icon link get form fornt-awesome icon for Blog --> 	
                        <i class="fa fa-book" aria-hidden="true"></i><!-- copy and paste the Book icon link here for hover effect -->		
                    </div>
                    <div class="name"><span data-text="Blog">Blog</span></div>
                    <!-- we are create seventh menu item name Blog -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your cart page to another page -->
                    <div class="icon">
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i><!-- this is cart icon link get form fornt-awesome icon for cart --> 		
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i><!-- copy and paste the cart icon link here for hover effect -->		
                    </div>
                    <div class="name"><span data-text="Cart">Cart</span></div>
                    <!-- we are create eight menu item name Cart -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your Price page to another page -->
                    <div class="icon">
                        <i class="fa fa-usd" aria-hidden="true"></i><!-- this is usd icon link get form fornt-awesome iocn for Price --> 	
                        <i class="fa fa-usd" aria-hidden="true"></i><!-- copy and paste the usd icon link here for hover effect -->		
                    </div>
                    <div class="name"><span data-text="Price">Price</span></div>
                    <!-- we are create nineth menu item name Price -->
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- this anchor text for link your login page to another page -->
                    <div class="icon">
                        <i class="fa fa-sign-in" aria-hidden="true"></i><!-- this is sign in icon link get form fornt-awesome icon for Login --> 		
                        <i class="fa fa-sign-in" aria-hidden="true"></i><!-- copy and paste the sign in  icon link here for hover effect -->		
                    </div>
                    <div class="name"><span data-text="Login">Login</span></div>
                    <!-- we are create tenth menu item name login panel -->
                </a>
            </li>
        </ul>
        <div class="main">
       
        </div>
         <!-- icon menu navbar end  -->
 
    

<!-- <div class="sidebar">
  <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
  <a href="#clients"><i class="fa fa-fw fa-user"></i> Clients</a>
  <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>
</div>    -->
<!-- Footer -->
<footer class="mainfooter" style="position:fixed;bottom:0px; width:100%">
  
	<div class="row">
		<div class="col-md-12 copy">
			<p class="text-center">&copy; Copyright .  All rights reserved.</p>
		</div>
	</div>
</footer>
<!-- Footer -->
</body>
</html> 
