<footer id = "footer-section">
        <div class = "footer-sidebar">

            <div class = "footer-inner-sidebar">
                <div class = "footer-col">
                    @2023, Cyber+, Inc. All rights reserved. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quaerat suscipit voluptatem laborum porro? Sed sit facere aut ratione modi.    
                </div>
            
                <div class = "footer-col">
                    <a class="footer-nav-button" href="landing.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                    <a class="footer-nav-button" href="terms_of_service.php" role="button" aria-haspopup="true" aria-expanded="false">Terms of Service</a>
                    <a class="footer-nav-button" href="privacy_policy.php" role="button" aria-haspopup="true" aria-expanded="false">Privacy Policy</a>
                    <a class="footer-nav-button" href="collaborate.php" role="button" aria-haspopup="true" aria-expanded="false">Collaborate with Us</a>
                    <a class="footer-nav-button" href="contacts.php" role="button" aria-haspopup="true" aria-expanded="false">Contacts</a>
                </div>
            </div>
            
            <div class = "footer-logo">
                <div class = "footer-col">
                    <a class = "cyber-logo-footer" href = "#"><img src ="assets/images/cyber+logo.png"></a>
                </div>
            </div>
        </div>   
    </footer>

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
    font-family: Arial, sans-serif;
    font-size: 1rem;
    line-height: 1.5;
    color: #333;
    background-color: #fff;
  }

.footer-sidebar {
    
    display:flex;
    align-items: center;
    justify-content: center;
    background:rgb(20, 20, 20);
    position: relative;
    max-height:300px;
    padding: 100px;
}
.footer-col {
    min-height: 100px;
    display:flex;
            align-items:center;
            justify-content: center;
}
.footer-sidebar > :first-child {
    flex:1 1 75%;
    max-height:250px;
    
    
}

.footer-sidebar > :last-child {
    flex:1 1 25%;
   max-width:200px;
}

.footer-inner-sidebar {

    font-size: 12px;
    color:#f5f5f5;
border-top:rgba(255, 255, 255, 0.135) 1px solid;
}

.footer-inner-sidebar >:last-child {
    
justify-content: left;
    gap:30px ;
}
.footer-logo {
    

    min-height:200px;
    position: relative;
    
}

.footer-logo .col {
    position: absolute;
    inset:0;
    margin:auto;
    color:rgb(168, 168, 168);
   
}
.cyber-logo-footer img{
    position: absolute;
    top:0;
    right:0;
  
 
    height:50%;
}
.footer-nav-button {
  
    text-decoration: none;
    color:rgb(168, 168, 168);
    transition:ease-in-out .2s;
}

.footer-nav-button:hover {
    color:white;
}

    </style>