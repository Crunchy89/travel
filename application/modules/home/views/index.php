<div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <?php $i = 1;
        foreach ($promo as $row) :
            if ($i == 1) : ?>
                <div class="carousel-item active">
                    <div class="hero-wrap js-fullheight" style="background-image: url('<?= base_url("assets/img/promo/") . $row->gambar ?>');" data-stellar-background-ratio="0.5">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                                <div class="col-md-7 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
                                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $row->judul ?></h1>
                                    <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $row->isi ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="carousel-item">
                    <div class="hero-wrap js-fullheight" style="background-image: url('<?= base_url('assets/img/promo/') . $row->gambar ?>');" data-stellar-background-ratio="0.5">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                                <div class="col-md-7 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
                                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $row->judul ?></h1>
                                    <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $row->isi ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endif;
            $i++;
        endforeach; ?>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Our Tour Package</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="project">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/images/hotel-resto-1.jpg" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="text">
                        <h4 class="price">$600</h4>
                        <span>300 per person</span>
                        <h3><a href="project.html">New Orleans Hotel</a></h3>
                        <div class="star d-flex clearfix">
                            <div class="mr-auto float-left">
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                            </div>
                            <div class="float-right">
                                <span class="rate"><a href="#">(120)</a></span>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>assets/images/hotel-resto-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="icon-expand"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="project">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/images/hotel-resto-2.jpg" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="text">
                        <h4 class="price">$600</h4>
                        <span>300 per person</span>
                        <h3><a href="project.html">New Orleans Hotel</a></h3>
                        <div class="star d-flex clearfix">
                            <div class="mr-auto float-left">
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                            </div>
                            <div class="float-right">
                                <span class="rate"><a href="#">(120)</a></span>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>assets/images/hotel-resto-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="icon-expand"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="project">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/images/hotel-resto-3.jpg" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="text">
                        <h4 class="price">$600</h4>
                        <span>300 per person</span>
                        <h3><a href="project.html">New Orleans Restaurant</a></h3>
                        <div class="star d-flex clearfix">
                            <div class="mr-auto float-left">
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                            </div>
                            <div class="float-right">
                                <span class="rate"><a href="#">(120)</a></span>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>assets/images/hotel-resto-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="icon-expand"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section services-section bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-yatch"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Activities</h3>
                        <p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-around"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Travel Arrangements</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-compass"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Private Guide</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-map-of-roads"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Location Manager</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter img" id="section-counter">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img d-flex align-self-stretch" style="background-image:url('<?= base_url() ?>assets/images/about.jpg');"></div>
            </div>
            <div class="col-md-6 pl-md-5 py-5">
                <div class="row justify-content-start pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">About Traveland</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="30">0</strong>
                                <span>Amazing Deals</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="200">0</strong>
                                <span>Sold Tours</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="2500">0</strong>
                                <span>New Tours</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="40">0</strong>
                                <span>Happy Customers</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Destinasi</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row">
            <?php $data = $this->db->query("SELECT * FROM destinasi ORDER BY id_destinasi DESC limit 3")->result();
            foreach ($data as $row) : ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="project">
                        <div class="img">

                            <img src="<?= base_url('assets/img/foto/') . $row->foto ?>" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="text">
                            <h3><a href="project.html"><?= $row->nama_destinasi ?></a></h3>
                        </div>
                        <a href="<?= base_url() ?>assets/images/destination-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="icon-expand"></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<section class="ftco-counter img" id="section-counter">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 order-md-last d-flex">
                <div class="img d-flex align-self-stretch" style="background-image:url('<?= base_url() ?>assets/images/about-1.jpg');"></div>
            </div>
            <div class="col-md-6 pr-md-5 py-5">
                <div class="row justify-content-start pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">Things to Know Before Traveling to other Places</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="ftco-animate tips"><span>1.</span> A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p class="ftco-animate tips"><span>2.</span> A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="ftco-animate tips"><span>3.</span> It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="ftco-animate mt-4"><a href="#" class="btn btn-primary py-3 px-5">Read more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-no-pb testimony-section" style="background-image: url('<?= base_url() ?>assets/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <h2 class="mb-4">Happy Traveler Says</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12 testimonial">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap img" style="background-image: url('<?= base_url() ?>assets/images/traveler-1.jpg');">
                            <div class="overlay"></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap" style="background-image: url('<?= base_url() ?>assets/images/traveler-2.jpg');">
                            <div class="overlay"></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Interface Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap" style="background-image: url('<?= base_url() ?>assets/images/traveler-3.jpg');">
                            <div class="overlay"></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">UI Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap" style="background-image: url('<?= base_url() ?>assets/images/traveler-4.jpg');">
                            <div class="overlay"></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Web Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap" style="background-image: url('<?= base_url() ?>assets/images/traveler-5.jpg');">
                            <div class="overlay"></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">System Analyst</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>News</h2>
            </div>
        </div>
        <div class="row d-flex" id="berita">
            <?php foreach ($berita as $row) : ?>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="blog-single.html" class="block-20" style="background-image: url('<?= base_url('assets/img/berita/') . $row->gambar ?>');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center pt-2 mb-4 topp">
                                <div class="one">
                                    <span class="day"><?= date('d', strtotime($row->tanggal_berita)) ?></span>
                                </div>
                                <div class="two">
                                    <span class="yr"><?= date('Y', strtotime($row->tanggal_berita)) ?></span>
                                    <span class="mos"><?= date('M', strtotime($row->tanggal_berita)) ?></span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#"><?= $row->judul_berita ?></a></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- <script>
    $(document).ready(function() {
        $.ajax({
            type: 'post',
            url: '<?= site_url('home/getDataIndex') ?>',
            dataType: 'json',
            success: function(data) {
                for(var i=0;i<data.berita.lenght;i++){
                    html='<div class="col-md-4 d-flex ftco-animate">'+
                        '<div class="blog-entry justify-content-end">'+
                            '<a href="blog-single.html" class="block-20" style="background-image: url("<?= base_url('assets/img/berita/') ?>'+data.berita[i].gambar+'");">'+
                            '</a>'+
                            '<div class="text mt-3 float-right d-block">'+
                                '<div class="d-flex align-items-center pt-2 mb-4 topp">'+
                                    // '<div class="one">'+
                                    //     '<span class="day"><?= date('d', strtotime($row->tanggal_berita)) ?></span>'+
                                    // '</div>'+
                                    // '<div class="two">'+
                                    //     '<span class="yr"><?= date('Y', strtotime($row->tanggal_berita)) ?></span>'+
                                    //     '<span class="mos"><?= date('M', strtotime($row->tanggal_berita)) ?></span>'+
                                    // '</div>'+
                                '</div>'+
                                '<h3 class="heading"><a href="#">'+data.berita[i].judul_berita+'</a></h3>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                    $('#berita').append(html);
                }
            }
        });
    });
</script> -->