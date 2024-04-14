<head>

        <style>
                html {
    box-sizing: border-box;
    font-size: 16px;
    scroll-behavior: smooth;
    overflow-x:hidden;
   
  }
  
  * {
    box-sizing: inherit;
    margin: 0;
    padding: 0;
 
  }
  
  body {
    min-height:500px;
    font-family: Arial, sans-serif;
    font-size: 1rem;
    line-height: 1.5;
    color: #333;
   
  }
.nav-col {
    min-height:100px;
    
    display:flex;
    justify-content: center;
    align-items: center;
  }
  
.nav-bar {
   
    position:fixed;
    z-index:10;
    min-width:100%;
    min-height:90px;
    max-height:90px;
}
.nav-sidebar {

   display: flex;
    position:fixed;
    z-index:10;
    min-width:100%;
    min-height:50px;
    max-height:50px;
    align-items: center;
    justify-content: center;
    background: rgba(22, 22, 22, 1);
    box-shadow: 2px 2px 5px black;
  
}

.cyber-logo img{
   
   height:60px;
  
}
.cyber-logo {
    display:flex;
    align-items: center;
    justify-content: center;
 
    width:100%;
    max-height:60px;
}


.nav-sidebar > :first-child {

    flex: 1 1 25%;
    max-width:100px;
    color:rgb(168, 168, 168);
   
   
    max-height:50px;
    

    
}
.nav-sidebar > :nth-child(2) {
    flex:1 1 55%;
    
    column-gap:40px;
    padding-left:50px;
    justify-content: left;
    
}
.nav-sidebar > :last-child {
    flex: 1 1 20%;
    max-width:250px;

 position:relative;
 columns:50px 2;
 min-height:50px;
 max-height:50px;
}

.sign-in-button,
.register-button {

    text-decoration: none;
    color:rgb(199, 199, 199);
    font-size: 11px;
    padding:17px;
    transition:ease-in-out .2s;
    display:flex;
    align-items: center;
    justify-content: center;
    min-width:50%;
   
}
.register-button {
  max-height:100%;
    font-weight:500;
 background:#621fc7;
 color:white;
 transition:ease-in-out .2s;
}
.register-button:hover {
    background:white;
    color:#232323;
}
.sign-in-button:hover {
    background:rgba(255, 255, 255, 0.132);
    color:white;
}

.nav-button {
    z-index:2;
    text-decoration: none;
    color:rgb(199, 199, 199);
    font-size: 11px;
    padding:10px;
    transition:ease-in-out .2s;
    position: relative;
    display:flex;
    align-items: center;
    justify-content: center;
}
.nav-button::after {
    content:"";
    background:#611FC7;
    width:4px;
    height:4px;
    border-radius:50px;
    position: absolute;
    bottom:3px;
    transition: ease-in-out .3s;
}
.nav-button::before {
    content:"";
   
    width:200%;
    height:100%;
    z-index:1;
    position: absolute;
    
    transition: ease-in-out .3s;
  
}
.nav-button:hover::after {
    background:linear-gradient(to right,#611FC7,#9249ff,#fe1ffe);
    width:85%;
  
}



.nav-button:hover {
    color:white;
 

}
        </style>
</head>
<body>

<div class = "nav-bar">
            <div class = "nav-sidebar">
                
                <div class = "nav-col">  
                    <a class = "cyber-logo" href = "landing.php"><img src ="assets/images/cyber+logo.png"></a>
                </div>

                <div class = "nav-col">
             
                <a class="nav-button" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">HOME</a>
                <a class="nav-button" href="storegames.php" role="button" aria-haspopup="true" aria-expanded="false">STORE</a>
                <a class="nav-button" href="faq.php" role="button" aria-haspopup="true" aria-expanded="false">FAQ</a>
                <a class="nav-button" href="#" role="button" aria-haspopup="true" aria-expanded="false" onclick = "hide_help()">HELP</a>
                <a class="nav-button" href="about-us.php" role="button" aria-haspopup="true" aria-expanded="false">ABOUT CYBER+</a>
                </div>

                <!--sign in--> 
                <div class = "nav-col p-5">
                    <a class="sign-in-button" href="login.php" role="button" aria-haspopup="true" aria-expanded="false">SIGN IN</a>
                   </div>
            </div>
          
        </div>

        
  <div id="help_trigger" class="help-inner-container">


<div class="help-outer-container">
  <div class="help-content">
    <div class="help">
      <div class="help-sidebar">
        <h1 id="ins">
          HELP
        </h1>
        <span class="help-close" onclick="hide_help()">×</span>
      </div>

      <ol class="help-text">

      <label class = "help-label"> LANDING PAGE </label><br><br>

<p class = "help-cont">
As you can see, this is the website's home page. On the top left side, there are five (5) navigation buttons; the first is "Store," where you can see the various digital games that are available on the website, and the second is "FAQ," or "frequently asked questions," where developers will type in the most frequently asked questions along with the answers that players most often ask. 

You can also see the HELP button, where these guidelines will be inserted, and the ABOUT CYBER+ button, in which you can see the relevant information about the website's developers, when this was created, as well as what year it was published to the community, whereas the REGISTER AND SIGN IN buttons are on the right side.

 If you click the register button, that means you will be directed to a page where you will create a new account since you do not have one yet. After completing the required information, you can progress to the sign-in button and fill in your username along with the password you created. </p>
 <br><br><br><br>
<img src= "/CYBER+/assets/images/help/help1.png"> <br><br><br><br> 

<label class = "help-label"> SIGN UP/REGISTER </label><br><br>

<p class = "help-cont">
If you still have not set up an account, you should visit the sign-up form here. 

The sign-up form would then request an active email address, a contact number, a username (what you want others to call you), and a password that must be at least 8 characters and includes respectively uppercase and lowercase alphabetic characters (e.g., A-Z, a-z) with at least one numerical character (e.g., 0-9) or one special character (e.g., @#$%&*() -+=). 

Upon completing all of the required information and verifying that there are no errors, you can tap the "sign up" button, and your account will be created. </p>
<br><br><br><br>
<img src = "/CYBER+/assets/images/help/help3.png"> <br><br><br>
  
<label class = "help-label"> STORE PAGE </label><br><br>

<p class = "help-cont"> This is the store page, where you, the user, can see the entire picture and information about a specific game by clicking on it. You can see the price of the digital game and options like wishlist, add to cart, and buy buttons; you just have to pick which of the three you would like to put the digital game you have chosen in.

For the wish list button, whenever you want a video game or online game but are not yet sure if you really want to buy it, Just add it to your wishlist and visit it if you have already decided to purchase it.

While for the wish list button, whenever you want a video game or online game but are not yet sure if you really want to buy it, just add it to your wishlist and visit it if you have already decided to purchase it. 

If you are certain to buy a certain digital game from the website along with others, merely click the "add to cart" button.

 If you fancy buying the game instantly, you will be asked to enter the necessary small details about yourself and your preferred payment method, whether it be G-Cash, PayMaya, a credit or debit card, etc. </p>
 <br><br><br><br>
<img src = "/CYBER+/assets/images/help/help2.png">
<br><br><br><br>
      </ol>
    </div>
  </div>
</div>
</div>
<script src="/CYBER+/assets/js/popup.js"></script>


        <script src = "assets/js/reg.js"></script>
        </body>