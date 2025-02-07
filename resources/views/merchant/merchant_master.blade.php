<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Shajib Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

   @include('merchant.body.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('merchant.body.side_bar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('merchant.body.footer')

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<script src="{{ asset('backend/js/jquery-3.7.1.min.js') }}"></script>
<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
<!-- Sunny Admin App -->
<script src="{{ asset('backend/js/template.js') }}"></script>
<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    jQuery(document).ready(function (){
        jQuery(document).on('click','#delete',function (e){
            e.preventDefault();
            let link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })


        })
    })



</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script>
    @if (Session::has('message'))
    let type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}")
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}")
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}")
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}")
            break;

        default:
            break;
    }
    @endif
</script>


<script>
    $(document).ready(function (){
        $(document).on('change','#image',function (e){
            let url = URL.createObjectURL(e.target.files[0]);
            $('img#img').attr('src',url).width('100px').height('100px')
        })

        $(document).on('change','select[name="store_id"]',function (){
            let id = $(this).val();

            $.ajax({
                url: '/root_route/merchant/get-category/' + id,
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    $('select[name="category_id"]').empty();
                    $('select[name="category_id"]').append('<option value="">-Select-</option>')
                    $.each(data,function (key,value){
                        $('select[name="category_id"]').append(`<option value=${value.id}>${value.name}</option>`)
                    })
                }
            })
        })

        function loadCategories(storeId, selectedCategory) {
            if (!storeId) return;

            $.ajax({
                url: '/root_route/merchant/category-select/' + storeId,
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    let categorySelect = $('select[name="category_id"]');
                    categorySelect.empty();
                    categorySelect.append('<option value="">-Select-</option>');

                    $.each(data, function (key, value) {
                        let isSelected = (String(selectedCategory) === String(value.id)) ? 'selected' : '';
                        categorySelect.append(`<option value="${value.id}" ${isSelected}>${value.name}</option>`);
                    });
                }
            });
        }

        let storeId = $('select[name="store_id"]').val();
        let selectedCategory = $('select[name="category_id"]').attr('data-selected');

        if (storeId) {
            loadCategories(storeId, selectedCategory);
        }

        $(document).on('change', 'select[name="store_id"]', function () {
            let newStoreId = $(this).val();
            $('select[name="category_id"]').attr('data-selected', '');
            loadCategories(newStoreId, '');
        });

    })
</script>


</body>
</html>
