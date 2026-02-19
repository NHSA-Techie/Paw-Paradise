<!-- ====== HERO (optional, simple and clean) ====== -->
<section class="hero-soft section-soft">
  <div class="container">
    <div class="hero-content">
      <h1>Paws Paradise</h1>
      <p>Comfort, safety, and lots of tail wags.</p>
      {{-- <div class="hero-cta">
        <a href="{{ url('our_rooms') }}" class="btn btn-register">View Rooms</a>
        <a href="{{ url('about') }}" class="btn btn-login">Learn More</a>
      </div> --}}
    </div>
  </div>
</section>

<!-- ====== ABOUT ====== -->
<section class="about-lite section-soft" id="about">
  <div class="container">

    <!-- Section Title -->
    <div class="titlepage title-center">
      <h2>About Paws Paradise</h2>
      <p class="about-lead">
        Founded in 2015, Paws Paradise has been providing exceptional pet care services to families in our community.
        Our mission is to create a loving, safe environment where pets can thrive while their owners are away.
      </p>
    </div>

    <!-- Mission Card -->
    <div class="mission-card">
      <div class="row align-items-center">
        <div class="col-md-7">
          <div class="mission-left">
            <h3>Our Mission</h3>
            <p>
              We believe every pet deserves love, attention, and care. Our dedicated team works tirelessly to ensure your
              furry family members feel comfortable, happy, and secure during their stay with us.
            </p>

            <ul class="mission-list">
              <li>24/7 supervised care</li>
              <li>Certified pet care professionals</li>
              <li>State-of-the-art facilities</li>
              <li>Personalized attention for each pet</li>
            </ul>
          </div>
        </div>

        <div class="col-md-5">
          <div class="mission-right">
            {{-- img --}}
            <img src="{{ asset('custom_images/veterinary.png') }}" alt="Facility Icon" class="mission-icon">
            <p class="facility-note">
              Our beautiful facility spans <strong>5,000 sq ft</strong> with indoor and outdoor play areas
            </p>
            <!-- Or show an image instead of emoji:
            <figure class="mission-figure">
              <img src="{{ asset('custom_images/veterinary.png') }}" alt="Our facility">
            </figure> -->
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ====== TEAM ====== -->
<section class="team section-soft" id="team">
  <div class="container">
    <div class="titlepage title-center">
      <h2>Meet Our Team</h2>
    </div>

    <div class="row">
      <!-- Card 1 -->
      <div class="col-md-4">
        <article class="team-card">
          <img src="{{ asset('custom_images/vet.png') }}" alt="Head Veterinarian" class="team-icon">
          <h3>Dr.Htet</h3>
          <p class="role accent">Head Veterinarian</p>
          <p class="blurb">
            15+ years of experience in veterinary care. Specializes in small animal medicine and emergency care.
          </p>
        </article>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4">
        <article class="team-card">
          <img src="{{ asset('custom_images/care.png') }}" alt="Head Veterinarian" class="team-icon">
          <h3>Khine Mya</h3>
          <p class="role accent">Pet Care Manager</p>
          <p class="blurb">
            Certified animal behaviorist with a passion for creating positive experiences for pets and their families.
          </p>
        </article>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4">
        <article class="team-card">
          <img src="{{ asset('custom_images/train.png') }}" alt="Head Veterinarian" class="team-icon">
          <h3>Hla Hla</h3>
          <p class="role accent">Training Specialist</p>
          <p class="blurb">
            Professional dog trainer with expertise in obedience training and behavioral modification programs.
          </p>
        </article>
      </div>

      <!-- Card 4 -->
      <center>
      <div class="col-md-4">
        <article class="team-card">
          <img src="{{ asset('custom_images/groom.png') }}" alt="Head Veterinarian" class="team-icon">
          <h3>Pa Pa</h3>
          <p class="role accent">Grooming Specialist</p>
          <p class="blurb">
            Skilled pet groomer focused on styling, hygiene, and comfort to keep furry guests looking their very best.
          </p>
        </article>
      </div>

      </center>

    </div>
  </div>
</section>





