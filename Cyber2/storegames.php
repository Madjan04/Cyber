<?php
       include 'head.php'
    ?>

<body>

<?php
       include 'navbar.php'
       ?>

    <section id="main-section"><i class="fa-regular fa-cart-plus fa-bounce" style="color: #ffffff;"></i>
        <div class="main-game-list">
            <div class="main-game-list-sidebar">
        
                <div class="col mt-5">
                    DISCOVER NEW GAMES
                </div>


                <div class="col" id="game-cards-container">

                <?php while ($product = mysqli_fetch_array($prod)) { ?>
                    <div class="game-cards" type="button">                    
                        <div class="col cover">
                        <div class='cover-photo'><img src='./assets/images/game/<?php echo $product['productImage']?>'></div>              
                        </div>

                        <div class="col content">
                            <div class="game-title"><?php echo $product['productName']?></div>
                            <div class="genre"><?php echo $product['categoryName']?></div>
                        </div>

                        <div class="price">₱ <?php echo number_format($product['productPrice'], 2, '.', ',')?></div>
                    </div>
                <?php }?>
                    





                    <!------------------------------>
                    <script src="test.js"></script>
                </div>
                
            </div>
        </div>






    </section>
    <script>
        const card = document.getElementById('game-cards');

        card.addEventListener('click', function() {
            // Redirect to landing.php
            window.location.href = 'landing.php';
        });
    </script>

    <section id="featured-section">
        <div class="featured-title">
            FEATURED GAME OF THE WEEK
        </div>

        <div class="featured-sidebar" id="featured" type="button">


                
<div class="featured-card-left">

<div class="col">
    <div class="featured-img">
        <img src="assets/images/game3.png">
    </div>
</div>
</div>

<div class="featured-card-right">

<div class="col">

    <div class="featured-content">
        <div class="featured-game-title">Atlantis: Extraterrestrial Mutation</div>
        <div class="featured-genre">FANTASY</div>
        <div class="featured-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem aliquam veritatis incidunt illo modi! Mollitia harum optio nemo quaerat sed.</div>
    </div>

    <div class="col">

        <div class="featured-lower">
            <div class="featured-price">$3.99</div>
            <button href="#" class="featured-btn" id="add-to-cart">Add to Cart</button>
            <button href="#" class="featured-btn" id="purchase" name = "buy">Buy</button>

        </div>
    </div>

</div>



            </div>


            <script src="assets/js/store.js"></script>

    </section>
</body>

</html>