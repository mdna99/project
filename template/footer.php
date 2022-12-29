
<!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.js"></script> -->
    <!-- <script>
        $(document).ready(function() {
            $('li').on('click', function() {
                $(this).siblings().removeClass('active');
            });
        });
    </script> -->
    <!-- <script>
        $(document)ready(function(){
            $('ul.sidebar li').click(function(e){
                $('ul.sidebar li').removeClass('active');
                var $this = $($this);
                if (!$this.hasClass('active')) {
                    $this.addClass('active');
                }
            e.peventDefault();
            });
        });
    </script> -->
    <script>
        $("ul.sidebar li").on('click' , function(){
            // $("ul.sidebar li.active").removeClass('active');
            $(this).addClass('active');
        })
    </script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script> -->

    
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            var url = window.location;
            $('ul.navbar-nav a[href="'+ url +'"]').parent().addClass('active');
            $('ul.navbar-nav a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');
        });
    </script> -->

</body>

</html>