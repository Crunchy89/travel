// function show_data(url, gambar) {
//     $.ajax({
//         type: 'ajax',
//         url: 'url',
//         async: false,
//         dataType: 'json',
//         success: function (data) {
//             var html = '';
//             var i;
//             for (i = 0; i < data.promo.length; i++) {
//                 html += '<div class="carousel-item active">' +
//                     '+<div class="hero-wrap js-fullheight" style="background-image: url("' + gambar + data[i].promo.gambar + '");" data-stellar-background-ratio="0.5">' +
//                     '<div class="overlay"></div>' +
//                     '<div class="container">' +
//                     '<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">' +
//                     '<div class="col-md-7 ftco-animate mt-5" data-scrollax=" properties: { translateY: "70%" }">' +
//                     '<h1 class="mb-4" data-scrollax="properties: { translateY: "30%",opacity: 1.6}    ">' + data[i].promo.judul + '</h1>' +
//                     '<p class="mb-4" data-scrollax="properties: { translateY: "30%", opacity: 1.6}            ">' + data[i].promo.isi + '</p>' +
//                     '</div>' +
//                     '</div>' +
//                     '</div>' +
//                     '</div>' +
//                     '</div>'
//             }
//             $('#show_data').html(html);
//         }

//     });
// }