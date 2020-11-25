<!-- grids block 5 -->
 <section class="w3l-footer-29-main" id="footer">
  <div class="footer-29">
    <div class="grids-forms-1 pb-5">
<div class="container">
  <div class="grids-forms">
      <div class="main-midd">
          <h4 class="title-head">Newsletter – Get Updates & Latest offers</h4>
          
      </div>
      <div class="main-midd-2">
          <form action="#" method="post" class="rightside-form">
              <input type="email" name="email" placeholder="Enter your email">
              <button class="btn" type="submit">Subscribe</button>
          </form>
      </div>
    </div>
  </div>
  </div>
      <div class="container pt-5">
        
          <div class="d-grid grid-col-4 footer-top-29">
              <div class="footer-list-29 footer-1">
                  <h6 class="footer-title-29">About Us</h6>
                  <ul>
                     <p>DXB Tours & Travel is serving valuable clients since last 20 years. Providing Charter of Luxury yachts, World's biggest Dhow cruise experience , Desert Safari services and much more.</p>
                  </ul>
                  <div class="main-social-footer-29">
                    <h6 class="footer-title-29">Social Links</h6>
                      <a href="https://www.facebook.com/jtoursdubai" class="facebook"><span class="fa fa-facebook"></span></a>
                      <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                      <a href="https://www.instagram.com/jannat.tours/" class="instagram"><span class="fa fa-instagram"></span></a>
                      <a href="#google-plus" class="google-plus"><span class="fa fa-google-plus"></span></a>
                      <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
                  </div>
              </div>
              <div class="footer-list-29 footer-2">
                  <ul>
                      <h6 class="footer-title-29">Useful Links</h6>
                      @foreach(\App\servicesModel::limit(3)->get() as $menu)
          <li>
            <a  href="{{route('pages.services',$menu->slug)}}">{{$menu->name}}</a>
          </li>
          @endforeach
                  </ul>
              </div>
             
              <div class="footer-list-29 footer-4">
                  <ul>
                      <h6 class="footer-title-29">Facebook Feeds</h6>
                  
                  </ul>
              </div>
          </div>
          <div class="bottom-copies text-center">
              <p class="copy-footer-29">© Copyright ©2004-2020 | Powered By: Jannat Tours LLC</p>
               
          </div>
      </div>
  </div>
        <a href="https://wa.link/556bgb" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
   <!-- move top -->
  <button onclick="topFunction()" id="movetop" title="Go to top">
              <span class="fa fa-angle-up"></span>
                 </button>
                 <script>
                     // When the user scrolls down 20px from the top of the document, show the button
                     window.onscroll = function () {
                         scrollFunction()
                     };
              
                     function scrollFunction() {
                         if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                             document.getElementById("movetop").style.display = "block";
                         } else {
                             document.getElementById("movetop").style.display = "none";
                         }
                     }
              
                     // When the user clicks on the button, scroll to the top of the document
                     function topFunction() {
                         document.body.scrollTop = 0;
                         document.documentElement.scrollTop = 0;
                     }
                 </script>
                 <!-- /move top -->
</section>
<!-- // grids block 5 -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  
<!-- //footer-28 block -->
</section>

<script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });


        $(window).scroll(function () {
            if ($(this).scrollTop() > ($('.single-page-header-content').outerHeight(true)/2)) {
                $('.site-navbar .site-logo').css({"opacity": "1"});
                $('.single-page-header-content .site-logo').hide();
            } else {
                $('.site-navbar .site-logo').css({"opacity": "0"});
                $('.single-page-header-content .site-logo').fadeIn('slow');
            }
        });



  
  </script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
   
<!-- Smooth scrolling -->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
@stack('footer-js')
 <script>
     $(function(){
    $("#quick_quotes").on("submit", function(e){
         e.preventDefault();
        
        if($('#service_id').val()=='' || $('#email').val()==''  || $('#message').val()=='' || $('#number_of_pax').val()=='' )
        {
            $('#res_message').show();
            $('#res_message').html("Please Fill * Fields");
            $('#msg_div').removeClass('d-none'); 
        }
        else
        {
        $.ajax({
          url: 'https://dxbtoursntravel.ae/quickquots',
          type: 'post',
          data: $('#quick_quotes').serialize(),
          dataType: 'json',
          success: function(data) {
             $('#res_message').show();
            $('#res_message').html("Thank you, Our representative will reach you shortly");
            $('#msg_div').removeClass('d-none');

            document.getElementById("quick_quotes").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },5000);
          }
         });
        }
    });
});
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f8a0c42fd4ff5477ea69677/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>

</html>
<!-- // grids block 5 -->