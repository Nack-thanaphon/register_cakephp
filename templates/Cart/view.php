<script>
    $(document).ready(function() {
        let dat = <?= json_encode($result) ?>




        for (i = 0; i < dat.length; i++) {
            console.log(dat[i])
        }
    })
</script>