@extends('layouts.main')

@section('title')
Home
@endsection

@section('container')
  <section class="hero-section pt-5 mt-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 pt-1">
          <div class="hero-content">
            <h1 class="hero-title fw-bold">
              Enjoy Delicious <br>
              Healthy Sushi <br>
              Near You  
            </h1>
            <p class="hero-text">
              To provide fresh ingredients, expertly prepared dishes, and nutritious options to fuel your day.
            </p>
            <div class="hero-buttons mt-4">
              <a href="#" class="btn me-3 dine-in-btn">
                <i class="bi bi-cup-hot me-2"></i>Dine-In
              </a>
              <a href="#" class="btn takeaway-btn">
                <i class="bi bi-bag me-2"></i>Takeaway
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="hero-image">
            <img src="img/illustration/sushi_plate.png" alt="Sushi_plate" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="features-section py-5">
    <div class="container">
      <div class="row g-4"> <!-- Added g-4 for proper gutters -->
        <div class="col-md-4">
          <div class="feature-card text-center">
            <div class="feature-icon">
              <i class="bi bi-stopwatch-fill"></i>
            </div>
            <h3 class="feature-title">Fast Delivery</h3>
            <p class="feature-text">Get your meals delivered quickly and efficiently. We prioritize speed without compromising on quality, ensuring your food arrives fresh and hot.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="feature-card text-center">
            <div class="feature-icon">
              <i class="bi bi-stars"></i>
            </div>
            <h3 class="feature-title">Clean and Safe</h3>
            <p class="feature-text">Your health is our priority. We follow strict hygiene and safety standards to ensure your meals are prepared and delivered with the utmost care.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="feature-card text-center">
            <div class="feature-icon">
              <i class="bi bi-flower2"></i>
            </div>
            <h3 class="feature-title">Fresh Ingredients</h3>
            <p class="feature-text">We use only the freshest ingredients in all our dishes. Our commitment to quality means every bite is packed with flavor and nutrition.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-story-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="story-image">
            <div class="chef-image">
              <img src="img/illustration/home_our_story.png" alt="Our Chef" class="img-fluid rounded">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="story-content">
            <h2 class="section-title">OUR STORY</h2>
            <div class="story-text">
              <p>At sùshě, our journey began with a simple passion: 
                to bring the heart of Japanese culinary tradition to every table. 
                Inspired by the art of sushi-making, we blend authentic techniques with a modern twist,
                 using only the freshest ingredients and the utmost attention to detail. 
                 Every roll, every slice, and every flavor tells a story—crafted with love,
                  precision, and respect for the heritage it represents.</p>
              
              <p>From our humble beginnings to becoming a beloved fixture in the community,
                 our journey has been guided by one principle: to deliver happiness, 
                 one delicious dish at a time. With a dedication to quality ingredients and culinary innovation, 
                 we invite you to join us on this flavorful adventure. Welcome to YumGo, 
                 where every bite tells a story of passion, flavor, and the joy of shared meals.
              </p>
              
              <a href="{{ route('about')}}" class="btn btn-primary mt-3" style="background-color: #F58232;" >Learn more about us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection