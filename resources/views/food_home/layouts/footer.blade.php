
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022 - US<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reservations</h4>
                        <p>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->



<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Would You Like To Take A Second & Review Our Services ?  </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--================= Model Body  =================-->
        <div class="modal-body">
            <form action="{{route('submit_review')}}" id="reviewForm" method="post">
                @csrf
                <h5>How was Our Coustomer Suport</h5>
                <div class="rate">
                    <input type="radio" id="coustomer_Suport_star5" name="coustomer_support_rate" value="5" />
                    <label for="coustomer_Suport_star5" title="text">5 stars</label>
                    <input type="radio" id="coustomer_Suport_star4" name="coustomer_support_rate" value="4" />
                    <label for="coustomer_Suport_star4" title="text">4 stars</label>
                    <input type="radio" id="coustomer_Suport_star3" name="coustomer_support_rate" value="3" />
                    <label for="coustomer_Suport_star3" title="text">3 stars</label>
                    <input type="radio" id="coustomer_Suport_star2" name="coustomer_support_rate" value="2" />
                    <label for="coustomer_Suport_star2" title="text">2 stars</label>
                    <input type="radio" id="coustomer_Suport_star1" name="coustomer_support_rate" value="1" />
                    <label for="coustomer_Suport_star1" title="text">1 star</label>
                </div><br><br>
                <h5>Did We Deliver On Time </h5>
                <div class="rate Deliver">
                    <input type="radio" id="Deliver_star5" name="deliver_rate" value="5" />
                    <label for="Deliver_star5" title="text">5 stars</label>
                    <input type="radio" id="Deliver_star4" name="deliver_rate" value="4" />
                    <label for="Deliver_star4" title="text">4 stars</label>
                    <input type="radio" id="Deliver_star3" name="deliver_rate" value="3" />
                    <label for="Deliver_star3" title="text">3 stars</label>
                    <input type="radio" id="Deliver_star2" name="deliver_rate" value="2" />
                    <label for="Deliver_star2" title="text">2 stars</label>
                    <input type="radio" id="Deliver_star1" name="deliver_rate" value="1" />
                    <label for="Deliver_star1" title="text">1 star</label>
                </div><br><br>
                <h5>How was Our Product Quality</h5>
                <div class="rate Quality">
                    <input type="radio" id="Quality_star5" name="Quality_rate" value="5" />
                    <label for="Quality_star5" title="text">5 stars</label>
                    <input type="radio" id="Quality_star4" name="Quality_rate" value="4" />
                    <label for="Quality_star4" title="text">4 stars</label>
                    <input type="radio" id="Quality_star3" name="Quality_rate" value="3" />
                    <label for="Quality_star3" title="text">3 stars</label>
                    <input type="radio" id="Quality_star2" name="Quality_rate" value="2" />
                    <label for="Quality_star2" title="text">2 stars</label>
                    <input type="radio" id="Quality_star1" name="Quality_rate" value="1" />
                    <label for="Quality_star1" title="text">1 star</label>
                </div><br><br>
                <label for="compliments" style="position: relative;bottom: 36px;">Remarks <span style="    font-size: x-small;font-weight: 100;">(Optional:)</span></label>
                <textarea name="compliments" id="compliments" cols="30" rows="3" placeholder="Would You Like Leave Few Lines For Us..... "></textarea>
            </form>
        </div>
        <!--================= Model Body  =================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="CancleAndLogout()">Ask Me Later</button>
          <button type="button" class="btn btn-primary" onclick="saveAndLogout()">Save and Logout</button>
        </div>
      </div>
    </div>
</div>
