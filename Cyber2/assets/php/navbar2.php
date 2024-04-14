<!DOCTYPE html>

<head>
  <style>
    html {
      box-sizing: border-box;
      font-size: 16px;
      scroll-behavior: smooth;
      overflow-x: hidden;

    }

    * {
      box-sizing: inherit;
      margin: 0;
      padding: 0;

    }

    body {
      min-height: 500px;
      font-family: Arial, sans-serif;
      font-size: 1rem;
      line-height: 1.5;
      color: #333;

    }

    .nav-col {
      min-height: 100px;

      display: flex;
      justify-content: center;
      align-items: center;
    }

    .nav-bar {
      z-index: 20;
      position: relative;
      z-index: 10;
      min-width: 100%;
      min-height: 90px;
      max-height: 90px;
    }

    .nav-sidebar {
      top: 0px;
      display: flex;
      position: relative;
      z-index: 20;
      min-width: 100%;
      min-height: 50px;
      max-height: 50px;
      align-items: center;
      justify-content: center;
      background: rgba(22, 22, 22, 1);

      box-shadow: 2px 2px 5px black;


    }

    .cyber-logo img {

      height: 60px;

    }

    .cyber-logo {
      display: flex;
      align-items: center;
      justify-content: center;

      width: 100%;
      max-height: 60px;
    }


    .nav-sidebar> :first-child {

      flex: 1 1 25%;
      max-width: 100px;
      color: rgb(168, 168, 168);


      max-height: 50px;



    }

    .nav-sidebar> :nth-child(2) {
      flex: 1 1 55%;

      column-gap: 40px;
      padding-left: 50px;
      justify-content: left;

    }

    .nav-sidebar> :last-child {
      flex: 1 1 20%;
      max-width: 250px;

      position: relative;
      columns: 50px 2;
      min-height: 50px;
      max-height: 50px;
    }

    .sign-in-button,
    .register-button {

      text-decoration: none;
      color: rgb(199, 199, 199);
      font-size: 11px;
      padding: 17px;
      transition: ease-in-out .2s;
      display: flex;
      align-items: center;
      justify-content: center;
      min-width: 50%;

    }

    .register-button {
      max-height: 100%;
      font-weight: 500;
      background: #621fc7;
      color: white;
      transition: ease-in-out .2s;
    }

    .register-button:hover {
      background: white;
      color: #232323;
    }

    .sign-in-button:hover {
      background: rgba(255, 255, 255, 0.132);
      color: white;
    }

    .nav-button {
      z-index: 2;
      text-decoration: none;
      color: rgb(199, 199, 199);
      font-size: 11px;
      padding: 10px;
      transition: ease-in-out .2s;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav-button::after {
      content: "";
      background: #611FC7;
      width: 4px;
      height: 4px;
      border-radius: 50px;
      position: absolute;
      bottom: 3px;
      transition: ease-in-out .3s;
    }

    .nav-button::before {
      content: "";

      width: 200%;
      height: 100%;
      z-index: 1;
      position: absolute;

      transition: ease-in-out .3s;

    }

    .nav-button:hover::after {
      background: linear-gradient(to right, #611FC7, #9249ff, #fe1ffe);
      width: 85%;

    }



    .nav-button:hover {
      color: white;


    }

    .nav-sidebar-2 {
      margin-top: -40px;
      color: white;
      flex-direction: row;
      display: flex;
      position: sticky;
      top: 0px;
      z-index: 30;
      min-width: 100%;
      min-height: 30px;
      max-height: 60px;
      align-items: center;
      justify-content: center;
      background: rgb(31, 31, 31);
      box-shadow: 0px 5px 5px black;
      justify-content: left;



    }

    .nav-sidebar-2> :nth-child(1) {
      flex: 1 1 40%;


      max-width: fit-content;
      gap: 20px;
      padding-left: 20px;
      padding-right: 20px;

    }

    .nav-sidebar-2> :nth-child(2) {
      flex: 1 1 40%;
      max-width: 400px;
      display: flex;
      align-items: center;
      flex-direction: row;

      justify-content: left;
    }

    .nav-sidebar-2> :nth-child(3) {
      flex: 1 1 20%;
      position: relative;
      padding-right: 100px;
      justify-content: right;

    }

    .nav-button-2 {
      cursor:pointer;
      z-index: 8;
      text-decoration: none;
      color: rgb(199, 199, 199);
      font-size: 11px;
      padding: 10px;
      transition: ease-in-out .2s;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav-button-2:hover {
      color: white;
    }

    .search-bar {
      border-radius: 25px;
      min-width: 30px;

      min-height: 30px;

      position: relative;
      margin-left: 30px;

      background: rgba(255, 255, 255, .05);

      padding: 3px 4px;
      transition: .8s cubic-bezier(0.18, 0.89, 0.18, 1.13);
    }

    .search-bar:focus-within {
      min-width: 200px;
      border: none;
      background: white;
      border-radius: 25px;
    }

    .search-bar:focus-within>.search-btn {
      background: #611fc6;
      border-radius: 25px;
      transform: rotate(405deg);
    }

    .search-bar:focus-within>.search-btn::after {
      background: transparent;
      border-radius: 25px;
      transform: rotate(405deg);
    }

    .search-bar:focus-within>.search-input {
      opacity: 1;
    }



    .search-input {

      opacity: 0;
      inset: 0;
      left: 10px;
      position: absolute;
      border: none;
      background: none;
      z-index: 3;
      cursor: pointer;
      max-width: 150px;
    }


    .search-input:focus {
      outline: none;
      cursor: initial;
    }

    .search-input::placeholder {
      color: #611fc6;
    }

    .search-btn::before {
      content: "";
      position: absolute;
      inset: 0;


      background-size: 100%;
      transition: ease-in-out .2s;

      margin: auto;

    }

    .search-btn {
      border: 2px solid #611fc6;
      z-index: 2;
      transform: rotate(45deg);
      background: transparent;
      cursor: pointer;
      position: absolute;
      min-width: 25px;
      min-height: 25px;
      max-width: 25px;
      max-height: 25px;
      right: 0;
      margin-right: 2px;

      color: rgb(161, 89, 255);
      transition: ease-in-out .5s;
    }

    .search-btn::after {
      content: "";
      position: absolute;
      inset: 0;


      background-size: 100%;
      transition: ease-in-out .25s;
      z-index: -1;
      margin: auto;
    }

    .search-bar:hover>.search-btn::after {
      background: #611fc6;

    }

    .search-bar:focus-within>.search-btn:hover::before {
      scale: 150%;
      border-radius: 50px;
      background: #8330ff;
      color: white;
    }

    .search-btn img {
      z-index: 1;
      transform: rotate(315deg);
      max-block-size: 20px;
    }
  </style>
</head>

<body>
  <div class="nav-bar">
    <div class="nav-sidebar">

      <div class="nav-col">
        <a class="cyber-logo" href="landing.php"><img src="assets/images/cyber+logo.png"></a>
      </div>

      <div class="nav-col">


        <a class="nav-button" href="store.php" role="button" aria-haspopup="true" aria-expanded="false">STORE</a>
        <a class="nav-button" href="faq.php" role="button" aria-haspopup="true" aria-expanded="false">FAQ</a>
        <a class="nav-button" href="#" role="button" aria-haspopup="true" aria-expanded="false" onclick = "show_help()">HELP</a>
        <a class="nav-button" href="about-us.php" role="button" aria-haspopup="true" aria-expanded="false">ABOUT CYBER+</a>
      </div>

      <!--sign in-->
      <div class="nav-col">
        <a class="sign-in-button" href="login.php" role="button" aria-haspopup="true" aria-expanded="false">SIGN IN</a>
        <a class="register-button" href="register.php" role="button" aria-haspopup="true" aria-expanded="false">REGISTER</a>
      </div>
    </div>
  </div>


  <div class="nav-sidebar-2">

    <div class="nav-col">
      <a class="nav-button-2" href="store-genre.php" role="button" aria-haspopup="true" aria-expanded="false">GENRE</a>

      <a class="nav-button-2" href="#" role="button" aria-haspopup="true" aria-expanded="false">NEW RELEASE</a>
      <a class="nav-button-2" href="store-a-z.php" role="button" aria-haspopup="true" aria-expanded="false">A - Z</a>
    </div>

    <div class="nav-col">
      <div class="search-bar">
        <input type="text" class="search-input" aria-label="search" placeholder="Enter your search">
        <button class="search-btn" aria-label="submit search"><img src="assets/images/search.png"></button>
      </div>
    </div>

    <div class="nav-col">
      <div class="wish-cart-bar">

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


</body>

</html>