<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Paws Paradise Pet Hotel</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .hero {
      background: linear-gradient(135deg, #FF8C42 0%, #4A90E2 50%, #9013FE 100%);
      min-height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
      padding: 120px 16px 140px;
    }

    .hero-logo {
      height: 120px;       /* adjust size as needed */
      width: auto;
      vertical-align: middle; /* keeps text aligned */
      margin-right: 12px; /* space between logo and text */
    }



    .hero h1 { font-weight: 800; font-size: clamp(32px, 6vw, 72px); margin-bottom: 18px; }
    .hero p.sub { font-size: clamp(16px, 2.5vw, 28px); margin-bottom: 36px; }
    .hero .btns { display:inline-flex; gap:16px; flex-wrap:wrap; justify-content:center; }
    .btn-primary-fill { background: #fff; color:#111; padding: 14px 28px; border-radius: 999px; font-weight: 600; }
    .btn-primary-outline { padding: 12px 26px; border-radius: 999px; font-weight: 600; border:2px solid #fff; color:#fff; background: transparent; }

    .intro { padding: 64px 16px 40px; background: #fff; }
    .intro .wrap { max-width: 1000px; margin: 0 auto; text-align: center; }
    .intro h2 { font-size: clamp(28px, 3.6vw, 48px); font-weight: 800; margin-bottom: 16px; }
    .intro p { font-size: 18px; line-height: 1.8; color:#333; margin-bottom: 50px; }

    /* Feature cards */
    .features { display:grid; grid-template-columns: repeat(auto-fit, minmax(260px,1fr)); gap:28px; max-width:1100px; margin:0 auto; }
    .feature-card { background:#fff; border-radius:14px; padding:32px 24px; text-align:center; box-shadow:0 4px 12px rgba(0,0,0,0.08); transition:transform 0.2s; }
    .feature-card:hover { transform:translateY(-4px); }
    
    .feature-card h3 { font-size:20px; font-weight:700; margin-bottom:10px; }
    .feature-card p { font-size:16px; line-height:1.6; color:#444; }
    
    .feature-icon {
      height: 60px;     /* adjust size */
      width: auto;
      margin-bottom: 14px;
      display: block;
      margin-left: auto;
      margin-right: auto; /* centers the icon */
    }


  </style>
</head>
<body>
  

  <section class="hero">
    <div class="container">
      <h1>
        <img src="{{ asset('custom_images/intro_cat.png') }}" alt="Paws Paradise Logo" class="hero-logo">
        Welcome to Paws Paradise
      </h1>

      <p class="sub">Where Your Furry Friends Feel at Home</p>
      <div class="btns">
        <a href="{{url('our_rooms')}}" class="btn-primary-fill">Book Now</a>
        {{-- <a href="#services" class="btn-primary-outline">View Services</a> --}}
      </div>
    </div>
  </section>

  <section id="about" class="intro">
    <div class="wrap">
      <h2>Your Pet's Home Away From Home</h2>
      <p>
        At Paws Paradise, we provide loving care for your beloved pets in a safe,
        comfortable, and fun environment. Our experienced staff treats every pet like family,
        ensuring they receive the attention and care they deserve.
      </p>

      <div class="features">
        <div class="feature-card">
          <img src="{{ asset('custom_images/pet_house.png') }}" alt="Boarding Icon" class="feature-icon">
          <h3>Comfortable Boarding</h3>
          <p>Spacious, clean rooms with cozy bedding and plenty of natural light for your pet's comfort.</p>
        </div>

        <div class="feature-card">
          <img src="{{ asset('custom_images/heart_paw_2.png') }}" alt="Boarding Icon" class="feature-icon">
          <h3>Loving Care</h3>
          <p>Our trained staff provides individual attention, playtime, and lots of love to every guest.</p>
        </div>
        <div class="feature-card">
          <img src="{{ asset('custom_images/play.png') }}" alt="Boarding Icon" class="feature-icon">
          <h3>Fun Activities</h3>
          <p>Daily exercise, interactive play sessions, and socialization with other friendly pets.</p>
        </div>
      </div>
    </div>
  </section>
</body>
</html>