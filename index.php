<!DOCTYPE html>
<html lang="en">
<head>
<?php include ('header.php') ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Apollo MNL</title>    
<link rel="stylesheet" href="style.css" >
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<section class="header">
    <div class="title">APOLLO MANILA</div>
</section>

<section class="about">
        <h3></h3>
        <h2>WELCOME</h2>
        <p>Welcome to Apollo Manila, where culinary excellence meets vibrant ambiance. Nestled in the heart of the city,</br>
        Apollo Manila offers a unique dining experience that celebrates the rich flavors of Filipino cuisine with a modern twist.</p>
        <a href="regis.php" class="button">Reserve Now</a>
</section>

<section class="gallery">
        <h3>GALLERY</h3>
        <p>Affordable Eat All You Can Asian food</p>
        <p>Daily Dishes may vary due to seasonal availability and Chef's suggestions.</p>

<div class="image-container">
    <img id="image1" class="image active" src="pics/1.jpeg" alt="Image 1">
    <img id="image2" class="image active" src="pics/2.jpeg" alt="Image 2">
    <img id="image3" class="image active" src="pics/3.jpeg" alt="Image 3">
    <img id="image4" class="image" src="pics/4.jpeg" alt="Image 4">
    <img id="image5" class="image" src="pics/2.jpeg" alt="Image 5">
</div>

<button id="prevBtn"><</button>
<button id="nextBtn">></button>
<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.image');

    function showImages(index) {
        const totalImages = images.length;
        images.forEach((img, i) => {
            img.classList.toggle('active', i >= index && i < index + 3);
        });
    }

    document.getElementById('nextBtn').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % (images.length - 2);
        showImages(currentIndex);
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + (images.length - 2)) % (images.length - 2);
        showImages(currentIndex);
    });

    showImages(currentIndex); // Initial display
</script>
</section>
<section class="rate">
    <div class="box">
        <h3>Rate</h3>
        <p>Adult/350</p>
        <p>Bata/Libre.</p>
    </div>
    </section>
</body>
<?php include ('footer.php') ?>
</html>
