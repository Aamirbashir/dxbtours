</div>
<script src="{{ asset('public/admin/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/jquery-loading-overlay-master/loadingoverlay.min.js') }}"></script>
@stack('plugin-js')
<script src="{{ asset('public/admin/js/bracket.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#inner').fadeOut();
        $('#preloader').delay(50).fadeOut(100);
        $('body').delay(50).css({'overflow':'visible'});
    })
    $(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("body").removeClass("preload");

        'use strict'

        $(window).resize(function(){
            minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
            if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
        }

    });

    currentURL = '{{ url()->current() }}';
    $.fn.sidebarActive = (route) => {
        $.each($(".br-menu-link, .br-menu-sub .nav-link"), function(ii, ele){
            if($(ele).attr('href') == route){
                if($(ele).hasClass('nav-link')){
                    $(ele).addClass('active')
                    $(ele).closest('.br-menu-sub').show();
                    $('a[data-parent="'+$(ele).closest('.br-menu-sub').attr('data-child')+'"]').addClass('show-sub');
                }else{
                    $(ele).addClass('active')
                }
            }
        });
    }

    $.fn.sidebarActive(currentURL);

    $.fn.getPlaceholder = () => {
        $.each($('input, select, textarea'), function (ii, ele) {
            $label = $(ele).closest('.form-group').find('label.control-label').text();
            if($(ele).attr("placeholder") == undefined){
                $label = $label.replace(/  +/g, ' ');
                $(ele).attr("placeholder", "Enter "+$label+" here");
            }
        })
    }

    $.fn.getPlaceholder();

    $(document).on("input", "input[type='tel']", function() {
        this.value = this.value.replace(/\D/g,'');
    });

    if($.validator != undefined){
        $.validator.setDefaults({
            errorPlacement: function (error, element) {
                if (element.parents('.input-group').length) {
                    error.insertAfter(element.parents('.input-group'));
                } else if (element.data('select2')) {
                    element.parent('div').append(error);
                }else{
                    error.insertAfter(element);
                }
            }
        });
    }

    $("body").on("click", "#profileNavbar", function(e){
        e.preventDefault()
        $('.portfolio-nav').toggleClass('show');;
    });

    $("body").on("click", '[data-action="delete"]', function(e){
        e.preventDefault();
        $this = $(this);
        var deleteConfirm = $.confirm({
            title: 'Delete it!',
            content: 'Are you sure you want to delete this?',
            theme: "light",
            type: "dark",
            animation: 'scale',
            closeAnimation: 'scale',
            animateFromElement: false,
            buttons: {
                confirm: {
                    text: "",
                    btnClass: "btn-green",
                    action: function () {
                        $.get($this.attr('data-href'), function (data){
                            deleteConfirm.close();
                            $.confirm({
                                title: 'Success',
                                content: data.html,
                                theme: "light",
                                type: "dark",
                                animation: 'scale',
                                closeAnimation: 'scale',
                                animateFromElement: false,
                                buttons: {
                                    ok: function () {
                                        table.draw();
                                    }
                                }
                            })
                        })
                        return false;
                    }
                },
                cancel: function () {

                }
            }
        })
    });

</script>

@stack('footer-js')

</body>
</html>
