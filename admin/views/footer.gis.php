<!-- Footer -->
<footer class="page-footer pt-0 mt-5 rgba-stylish-light">

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2020 Copyright: ETHIC-SA
        </div>
    </div>

</footer>
<!-- Footer -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script src="vendor/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="vendor/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="vendor/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="vendor/js/mdb.min.js"></script>
<script type="text/javascript" src="vendor/js/ckeditor.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="public/js/notification.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    $("#imgName").val('Charger une image');
    function readURL (input)
    {
        if (input.files && input.files[0])
        {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#imageProd").attr('src', e.target.result).removeClass("d-none");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#btnOne").click(function () {
        $("#btnOne").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Loading...').addClass("disabled");
    });

    $('#file-upload').change(function() {
        let i = $(this).next('label').clone();
        let file = $('#file-upload')[0].files[0].name;
        //$(this).next('label').text(file);
        $("#imgName").val(file);
        readURL(this);
    });
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            //toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
</script>
<script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    let container = document.querySelector('.custom-scrollbar');
    let ps = new PerfectScrollbar(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<!-- Charts -->
<script>
    // Small chart
    $(function() {
        $('.min-chart#chart-sales').easyPieChart({
            barColor: "#FF5252",
            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
    });

    // Main chart
    let ctxL = document.getElementById("lineChart").getContext('2d');
    let myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                fillColor: "#fff",
                backgroundColor: 'rgba(255, 255, 255, .3)',
                borderColor: 'rgba(255, 255, 255)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "#fff",
                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: true,
                        color: "rgba(255,255,255,.25)"
                    },
                    ticks: {
                        fontColor: "#fff",
                    },
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        color: "rgba(255,255,255,.25)"
                    },
                    ticks: {
                        fontColor: "#fff",
                    },
                }],
            }
        }
    });



    // $(function() {
    //     $('#dark-mode').on('click', function(e) {
    //
    //         e.preventDefault();
    //         $('h4, button').not('.check').toggleClass('dark-grey-text text-white');
    //         $('.list-panel a').toggleClass('dark-grey-text');
    //
    //         $('footer, .card').toggleClass('dark-card-admin');
    //         $('body, .navbar').toggleClass('white-skin navy-blue-skin');
    //         $(this).toggleClass('white text-dark btn-outline-black');
    //         $('body').toggleClass('dark-bg-admin');
    //         $('h6, .card, p, td, th, i, li a, h4, input, label').not(
    //             '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
    //         $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
    //         $('.gradient-card-header').toggleClass('white black lighten-4');
    //         $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');
    //
    //     });
    // });
</script>
</body>

</html>