
    <!-- Bootstrap core JavaScript-->
    {{-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="{{ url('/sb_admin2/sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ url('/sb_admin2/sbadmin2/vendor/boostrap/js/bootstrap.bundle.min.js') }}"></script> --}}

    <!-- Core plugin JavaScript-->
    {{-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> --}}
    <script src="{{ url('/sb_admin2/sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    {{-- <script src="js/sb-admin-2.min.js"></script> --}}
    <script src="{{ url('/sb_admin2/sbadmin2/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    {{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}
    <script src="{{ url('/sb_admin2/sbadmin2/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> --}}
    <script src="{{ url('/sb_admin2/sbadmin2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ url('/sb_admin2/sbadmin2/js/demo/chart-pie-demo.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#item_name').on('change', function() {
                // alert( $(this).find(":selected").val() );
                // fitur next update
                $('#specs').val('aaaaa');
            });
        });
    </script>
    

</body>

</html>