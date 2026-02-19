<footer class="site-footer">
  <div class="container">
    <div class="row footer-top">
      <!-- Brand & blurb -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="brand-line">
          <i class="fa fa-paw paw-icon" aria-hidden="true"></i>
          <span class="brand-name">Paws Paradise</span>
        </div>
        <p class="footer-blurb">
          Your pet’s home away from home.<br>
          Providing loving care since 2015.
        </p>
      </div>

      <!-- Services -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h4 class="footer-title">Services</h4>
        <ul class="footer-list">
          <li>Pet Boarding</li>
          <li>Pet Grooming</li>
          <li>Pet Daycare</li>
          <li>Pet Training</li>
        </ul>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h4 class="footer-title">Quick Links</h4>
        <ul class="footer-list">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('about') }}">About Us</a></li>
          <li><a href="{{ url('hotel_gallery') }}">Gallery</a></li>
          <li><a href="{{ url('contact_us') }}">Contact</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-2 col-md-6 mb-4">
        <h4 class="footer-title">Contact Info</h4>
        <ul class="footer-list contact-list">
          <li><i class="fa fa-map-marker"></i> 123 Pet Paradise Lane</li>
          <li><i class="fa fa-phone"></i> (555) 123-PAWS</li>
          <li><i class="fa fa-envelope"></i> info@pawsparadise.com</li>
        </ul>
      </div>
    </div>

    <hr class="footer-divider">

    <div class="row">
      <div class="col-12 text-center">
        <p class="site-copyright">© {{ date('Y') }} Paws Paradise Pet Hotel. All rights reserved.</p>

    </div>
  </div>
</footer>

<!-- Keep only one jQuery include (avoid duplicates) -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

