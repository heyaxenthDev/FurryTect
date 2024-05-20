<script src="assets/js/sweetalert2.all.min.js"></script>
<?php
if (isset($_SESSION['logged'])) {
?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            background: '#53a653',
            color: '#fff',
            icon: '<?php echo $_SESSION['logged_icon']; ?>',
            title: '<?php echo $_SESSION['logged']; ?>'
        });
    </script>
<?php
    unset($_SESSION['logged']);
}
?>