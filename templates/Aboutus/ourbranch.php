<?php $this->assign('title','สาขาของเรา'); ?>

<div class="jumbotron jumbotron-fluid bg-success">
    <div class="container ">
        <?= $this->element('/component/breadcrumb') ?>
        <h1 class="text-uppercase">branch</h1>
        <h6>สาขาของเรา</h6>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-4 mb-2 h-100">
            <div class="card  shadow-sm border p-2">
                <p>ค้นหาตามจังหวัด</p>
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect02">

                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02">ค้นหา</label>
                    </div>
                </div>
            </div>
            <ul class="list-group d-none d-sm-block" id="branch_list">
            </ul>
        </div>

        <div class="col-12 col-md-12 col-lg-8 mx-auto  h-100">
            <div class="card  shadow-sm border p-3">
                <div class="mb-2">
                    <h2>แม่ปลูกลูกขาย:Farm By Mom</h2>
                    <h3>สาขา <span>เชียงใหม่</span></h3>
                    <small>เบอร์โทร: XXX-XXX-XXXX</small> <br>
                    <small>Email: test@gmail.com</small> <br>
                    <small>ตำแหน่งร้าน: <a href="http://">ไปที่แผนที่</a></small>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60424.69551156281!2d98.97490152693268!3d18.8184881510205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da314efa84854f%3A0xfe1971871ead0f92!2z4LmB4Lih4LmI4Lib4Lil4Li54LiB4Lil4Li54LiB4LiC4Liy4LiiLeC4quC4leC4o-C4reC5gOC4muC4reC4o-C4teC5iCDguK3guYLguKfguITguLLguYLguJQgQnkgVGhld2t1bmc!5e0!3m2!1sen!2sth!4v1666724710259!5m2!1sen!2sth" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>

</div>


<script>
    $(document).ready(function() {
        var branch = [{
                'id': '1',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาช้างคลาน',
            },
            {
                'id': '2',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาตลาดนัดคณะพยาบาล'
            },
            {
                'id': '3',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาตลาดนัดโลตัสคำเที่ยง'
            },
            {
                'id': '4',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาตลาดเพลินฤดี'
            },
            {
                'id': '5',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาปตท.หางดง'
            },
            {
                'id': '6',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาปตท.ป่างิ้ว'
            },
            {
                'id': '7',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาปตท.สันผักหวาน'
            },
            {
                'id': '8',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาแม่แจ่ม',
            },
            {
                'id': '9',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาหน้าม.แม่ฟ้าหลวง'
            },
            {
                'id': '10',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาโลตัสเลียบคลองสอง'
            },
            {
                'id': '11',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาม.กรุงเทพ'
            },
            {
                'id': '12',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาเซนทรัลอยุธยา'
            },
            {
                'id': '13',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาฟู้ดวิลล่าราชพฤกษ์'
            },
            {
                'id': '14',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาตลาดนัดเลียบด่วนรามอินทรา'
            },
            {
                'id': '15',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขารัชดา'
            },
            {
                'id': '16',
                'province': 'เชียงใหม่',
                'link': '',
                'attitude': '',
                'name': 'สาขาหลังม.ธรรมศาสตร์'
            },

        ]


        let html = ''
        let branchData = []
        let link = []
        for (i = 0; i < branch.length; i++) {
            html += `<option value="${branch[i]['id']}">${branch[i]['province']}</option>`
            branchData.push({
                id: branch[i]['name'],
                link: branch[i]['link']
            })
        }
        sidebar(branchData);
        $('#inputGroupSelect02').html(html)


        function sidebar(branch1) {
            let branchData2 = ''
            for (i = 0; i < branch1.length; i++) {
                branchData2 += `<li class="list-group-item"><a href="${branch1[i]['link']}">#${branch1[i]['id']}</a></li>`
            }
            $('#branch_list').html(branchData2)


        }

    })
</script>