<?php include 'lib/crud.php'; ?>
<?php
// Data berita terbaru
$newsData = [
    [
        "_id" => "67500a24143dfb866067fa0d",
        "Judul" => "Jelang Pelantikan Prabowo-Gibran, Muncul Spanduk dan Baliho Terima Kasih Jokowi",
        "Konten" => "Jelang transisi kepemimpinan politik nasional pada 20 Oktober 2024 mendatang, muncul spanduk dan baliho bertuliskan Terima Kasih Jokowi. ...",
        "Ringkasan" => "Terimakasih Jokowi",
        "Penulis" => "Sophia Reynolds",
        "Kategori" => "Politik",
        "img" => "https://cdn0-production-images-kly.akamaized.net/JRqc2z_kzcX3kWumlzblNQaKiCM=/1231x710/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4971385/original/036182400_1729146906-20241017-Baliho-ANG_1.jpg",
        "view" => 0,
        "Dibuat" => "2024-12-04T08:11:37.843Z",
    ],
    [
        "_id" => "67500a24143dfb866067fa0e",
        "Judul" => "Panasnya Face Off di Byon Combat Showbiz Volume 4 Indonesia vs Malaysia",
        "Konten" => "Fight antara jagoan Indonesia kontra Malaysia ini bakal bertarung dalam Byon Combat Showbiz Volume 4 di Tennis Indoor Senayan, ...",
        "Ringkasan" => "Jagoan Indonesia vs Malaysia",
        "Penulis" => "Oliver Bennett",
        "Kategori" => "Sport",
        "img" => "https://cdn1-production-images-kly.akamaized.net/q9HTHo28cITdXXrsjuP_cnI02TE=/0x0:3000x1688/1231x710/filters:quality(75):strip_icc():format(webp):watermark(kly-media-production/assets/images/watermarks/bola/watermark-color-landscape-new.png,1156,20,0)/kly-media-production/medias/5028430/original/044513900_1732879471-Indonesia_vs_Malaysia-08.jpg",
        "view" => 0,
        "Dibuat" => "2024-12-04T08:11:37.843Z",
    ],
    [
        "_id" => "67500a24143dfb866067fa0f",
        "Judul" => "Detik-detik Mesin Roket Epsilon S Meledak Saat Uji Coba",
        "Konten" => "Api dan asap mengepul ke udara setelah mesin roket berbahan bakar padat Epsilon S meledak tak lama setelah uji pembakaran, ...",
        "Ringkasan" => "Meledaknya mesin roket Epsilon S saat uji pembakaran",
        "Penulis" => "Emma Johnson",
        "Kategori" => "Science",
        "img" => "https://cdn.medcom.id/dynamic/photos/2024/11/27/68728/000_36N98LB.jpg?w=1111",
        "view" => 0,
        "Dibuat" => "2024-12-04T08:11:37.843Z",
    ],
    [
        "_id" => "67500a24143dfb866067fa10",
        "Judul" => "Presiden Dukung Film Women From Rote Island di Oscar 2025",
        "Konten" => "Presiden Prabowo Subianto menyampaikan dukungannya terhadap film Women From Rote Island yang berhasil masuk nominasi di ajang Piala Oscar 2025 ...",
        "Ringkasan" => "Presiden Prabowo Subianto menyampaikan dukungannya terhadap film Women From Rote Island.",
        "Penulis" => "Alice Walker",
        "Kategori" => "Hiburan",
        "img" => "https://cdn.medcom.id/dynamic/photos/2024/11/30/68768/Snapinsta_app_468772371_440528182213965_6786151356800615383_n_1080.jpg?w=1111",
        "view" => 0,
        "Dibuat" => "2024-12-04T08:16:38.391Z",
    ],
    [
        "_id" => "6758ddb4eae29b8a1df108a7",
        "Judul" => "11 Provinsi Ini Jadi Penyumbang Terbesar Kasus HIV di Indonesia",
        "Konten" => "Temuan kasus HIV terus mengalami peningkatan selama satu dekade. Teranyar, Kementerian Kesehatan (Kemenkes) RI mencatat 47.896 kasus HIV baru sepanjang Januari-September 2024 ...",
        "Ringkasan" => "Peningkatan HIV selama satu dekade.",
        "Penulis" => "Emma Johnson",
        "Kategori" => "Kesehatan",
        "img" => "https://akcdn.detik.net.id/community/media/visual/2022/08/31/ilustrasi-hiv-1_169.jpeg?w=620",
        "view" => 0,
        "Dibuat" => "2024-12-04T08:11:37.843Z",
    ],
];

?>

<!-- Membuat Carousel Berita -->
<div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($newsData as $index => $news): ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <img src="<?php echo $news['img']; ?>" class="d-block w-100" alt="<?php echo $news['Judul']; ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $news['Judul']; ?></h5>
                    <p><?php echo $news['Ringkasan']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?