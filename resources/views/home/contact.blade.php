<div class="contact section-soft" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titlepage title-center">
          <h2>Contact Us</h2>
          <p>Get in touch with us for any questions or to schedule a visit</p>
        </div>

        {{-- Notification of message --}}
        @if (session()->has('message'))
          <div class="alert alert-success contact-alert">
            <button type="button" class="close" data-bs-dismiss="alert">×</button>
            {{ session()->get('message') }}
          </div>
        @endif
      </div>
    </div>

    <div class="row">
      <!-- LEFT: same form, same names/IDs/classes -->
      <div class="col-md-6">
        <div class="contact-card">
          <h3>Send us a Message</h3>
          <form id="request" class="main_form" action="{{ url('contact') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <input class="contactus" placeholder="Name" type="text" name="name" required>
              </div>
              <div class="col-md-12">
                <input class="contactus" placeholder="Email" type="email" name="email" required>
              </div>
              <div class="col-md-12">
                <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>
              </div>
              <div class="col-md-12">
                <textarea class="textarea" placeholder="Message" name="message" required></textarea>
              </div>
              <div class="col-md-12">
                <button type="submit" class="send_btn">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- RIGHT: visual-only cards (no functionality change) -->
      <div class="col-md-6">
        <aside class="contact-info-card">
          <h3>Get in Touch</h3>
          <ul class="contact-info-list">
            <li>
              <span class="ci-icon"><i class="fa fa-map-marker"></i></span>
              <div class="ci-body">
                <strong>Address</strong>
                <p>123 Pet Paradise Lane<br>Happy Valley, CA 90210</p>
              </div>
            </li>
            <li>
              <span class="ci-icon"><i class="fa fa-phone"></i></span>
              <div class="ci-body">
                <strong>Phone</strong>
                <p>(555) 123-PAWS</p>
              </div>
            </li>
            <li>
              <span class="ci-icon"><i class="fa fa-envelope"></i></span>
              <div class="ci-body">
                <strong>Email</strong>
                <p>info@pawsparadise.com</p>
              </div>
            </li>
            <li>
              <span class="ci-icon"><i class="fa fa-clock-o"></i></span>
              <div class="ci-body">
                <strong>Hours</strong>
                <p>Mon–Fri: 7AM–7PM<br>Sat–Sun: 8AM–6PM</p>
              </div>
            </li>
          </ul>
        </aside>

        <aside class="contact-map-card">
          <h3>Find Us</h3>
          <div class="map-responsive rounded-embed">
            <iframe
              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
              width="600" height="400" frameborder="0" allowfullscreen="" style="border:0; width:100%;">
            </iframe>
          </div>
        </aside>
      </div>
    </div>
  </div>
</div>
