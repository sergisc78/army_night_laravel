<!-- BOOTSTRAP JS-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>


<!-- DATATABLES SCRIPT-->
<script>
    $(document).ready(function () {
        $('#table').DataTable();
});
</script>

<!-- DATATABLES AND JQUERY -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--DATATABLES JS -->

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<!-- SWEET ALERT SCRIPT -->

<script>
    $('.delete').on('click', function (e) {
        e.preventDefault();
        const id = $(this).attr('data-id');
        swal({
            title: 'Are you sure you want to delete this genre?',
            text: "If you are, delete this genre!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            }).then(function(value) {
            if (value) {
                window.location.href = id;
                    }
                        })
                    });
    
</script>


</body>

</html>