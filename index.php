<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrandLine Laptops</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">



</head>
<body class="bg-dark">
    <?php require 'header0.php' ?>
    <header class="bg-dark text-white py-4">
        <div class="container text-center">
            <h1 class="display-4 mb-4" style="margin-top: 50px;">Welcome to GrAnDlInE lApToPs</h1>
            <p class="lead">Discover the latest in technology</p>
        </div>
    </header>

    <section class="container-fluid px-0" style="margin-top: 0px; padding:0;">

        <h5 class="text-center text-white mb-4 bg-dark" style="margin: 0px; padding-top:10px;">We provide a vast variety of laptops.</h5>
        <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner">
               
                <div class="carousel-item active" style="background-image: url('img/gaming.png');">
                    <div class="carousel-caption">
                        <h3>Gaming</h3>
                        <p>Explore our latest gaming products.</p>
                        <a href="http://localhost/project/sbsales/products.php?sort=price_asc&Category%5B%5D=Gaming" class="btn btn-primary stretched-link">View Products</a>
                    </div>
                </div>
                
                <div class="carousel-item" style="background-image: url('img/mainstream.png');">
                    <div class="carousel-caption">
                        <h3>Mainstream</h3>
                        <p>Discover our mainstream product range.</p>
                        <a href="http://localhost/project/sbsales/products.php?sort=price_asc&Category%5B%5D=Mainstream" class="btn btn-primary stretched-link">View Products</a>
                    </div>
                </div>
                
                <div class="carousel-item" style="background-image: url('img/convertible.png');">
                    <div class="carousel-caption">
                        <h3>Convertible</h3>
                        <p>Check out our convertible devices.</p>
                        <a href="http://localhost/project/sbsales/products.php?sort=price_asc&Category%5B%5D=Convertible" class="btn btn-primary stretched-link">View Products</a>
                    </div>
                </div>
                
                <div class="carousel-item" style="background-image: url('img/premium.png');">
                    <div class="carousel-caption">
                        <h3>Premium</h3>
                        <p>Explore our premium selection of products.</p>
                        <a href="http://localhost/project/sbsales/products.php?sort=price_asc&Category%5B%5D=Premium" class="btn btn-primary stretched-link">View Products</a>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="container-fluid bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Shop from Top Brands</h2>
                <p>Discover our curated selection of products from the world's leading brands known for their quality and innovation.</p>
                <p>Explore the latest offerings from industry giants such as Dell, Acer, Lenovo, and more.</p>
            </div>
        </div>
    </div>
</section>

    
    <section class="container-fluid px-0">
        
        <div class="video-container">
            <video muted loop autoplay class="w-100">
                <source src="img/Dell.mp4" type="video/mp4">
            </video>
            <div class="overlay">
               <a href="http://localhost/project/sbsales/products.php?brand%5B%5D=Dell&sort=price_asc" style='text-decoration:none; color:white;'> 
               <h3>Dell Laptops</h3>
                <p>Discover the latest Dell laptops.</p>
                </a>
            </div>
        </div>
        
        <div class="video-container">
            <video muted loop autoplay class="w-100">
                <source src="img/Acer.mp4" type="video/mp4">
            </video>
            <div class="overlay">
            <a href="http://localhost/project/sbsales/products.php?brand%5B%5D=Acer&sort=price_asc" style='text-decoration:none; color:white;'>
                <h3>Acer Laptops</h3>
                <p>Original from the best brand.</p>
                </a>
            </div>
        </div>
       
        <div class="video-container">
            <video muted loop autoplay class="w-100">
                <source src="img/Lenovo.mp4" type="video/mp4">
            </video>
            <div class="overlay">
            <a href="http://localhost/project/sbsales/products.php?brand%5B%5D=Lenovo&sort=price_asc" style='text-decoration:none; color:white;'>
                <h3>Lenovo Laptops</h3>
                <p>Our exquisite collection of laptops.</p>
            </a>
            </div>
        </div>
    </section>

 
    <footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>&copy; 2024 GrandLine Laptops. All Rights Reserved. Developed by The Wolfpack</p>
        <div class="mt-3">
            <a href="about.php" class="text-white mx-2">About</a>
            <a href="contact.php" class="text-white mx-2">Contact</a>
        </div>
    </div>
</footer>


    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
  window.watsonAssistantChatOptions = {
    integrationID: "3f494a05-38aa-4751-a510-1273dd072d6a", // The ID of this integration.
    region: "us-south", // The region your integration is hosted in.
    serviceInstanceID: "f6d067bf-3768-4fbc-ad58-45f50166529b", // The ID of your service instance.
    onLoad: async (instance) => { await instance.render(); }
  };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
    document.head.appendChild(t);
  });
</script>
</body>
</html>