<script>
    $(document).ready(function () {
        $('#back2Top').click(function () {
            $("html,body").animate({scrollTop: 0}, "slow");
            return false;
        });
    })
</script>
<script>
    $(document).ready()
    {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            rtl: true,
            margin: 25,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    }
</script>
