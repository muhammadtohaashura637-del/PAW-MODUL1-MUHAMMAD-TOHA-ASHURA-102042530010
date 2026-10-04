<?php
$produk_list = [
    [
        "nama" => "Wireless Mechanical Keyboard 75%",
        "kategori" => "Perangkat Input",
        "harga" => 850000,
        "stok" => 12,
        "gambar" => "https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=600&q=80"
    ],
    [
        "nama" => "Mouse Gaming Lightweight Wireless",
        "kategori" => "Perangkat Input",
        "harga" => 450000,
        "stok" => 0,
        "gambar" => "https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=600&q=80"
    ],
    [
        "nama" => "Monitor LED 24 Inch 144Hz IPS",
        "kategori" => "Display",
        "harga" => 1950000,
        "stok" => 5,
        "gambar" => "https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=600&q=80"
    ],
    [
        "nama" => "Headset Gaming Surround Sound 7.1",
        "kategori" => "Audio",
        "harga" => 620000,
        "stok" => 8,
        "gambar" => "https://images.unsplash.com/photo-1546435770-a3e426bf472b?auto=format&fit=crop&w=600&q=80"
    ],
    [
        "nama" => "USB-C Hub Multifungsi 7-in-1",
        "kategori" => "Aksesoris",
        "harga" => 299000,
        "stok" => 0,
        "gambar" => "https://images.unsplash.com/photo-1625842268584-8f3296236761?auto=format&fit=crop&w=600&q=80"
    ],
    [
        "nama" => "Webcam Full HD 1080p dengan Mic",
        "kategori" => "Kamera & Video",
        "harga" => 380000,
        "stok" => 15,
        "gambar" => "https://images.unsplash.com/photo-1585060544812-6b45742d762f?auto=format&fit=crop&w=600&q=80"
    ]
];

$total_produk = count($produk_list);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk Teknologi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --bg-body: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --card-bg: #ffffff;
            --success-bg: #dcfce7;
            --success-text: #166534;
            --danger-bg: #fee2e2;
            --danger-text: #991b1b;
            --border-color: #e2e8f0;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-dark);
            line-height: 1.5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #ffffff;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .navbar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.2rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .hero {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: #ffffff;
            text-align: center;
            padding: 4rem 1.5rem;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
        }

        .hero p {
            font-size: 1.1rem;
            color: #94a3b8;
            max-width: 600px;
            margin: 0 auto;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 1.5rem;
            width: 100%;
            flex: 1;
        }

        .catalog-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .catalog-title {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .product-count-badge {
            background-color: #eff6ff;
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid #bfdbfe;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background-color: #e2e8f0;
        }

        .product-info {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-category {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .stock-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .status-badge.tersedia {
            background-color: var(--success-bg);
            color: var(--success-text);
        }

        .status-badge.habis {
            background-color: var(--danger-bg);
            color: var(--danger-text);
        }

        .card-actions {
            margin-top: auto;
        }

        .btn-buy {
            display: block;
            width: 100%;
            padding: 0.75rem;
            text-align: center;
            background-color: var(--primary);
            color: #ffffff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-buy:hover {
            background-color: var(--primary-hover);
        }

        .btn-disabled {
            display: block;
            width: 100%;
            padding: 0.75rem;
            text-align: center;
            background-color: #e2e8f0;
            color: #94a3b8;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: not-allowed;
            text-decoration: none;
        }

        footer {
            background-color: #ffffff;
            border-top: 1px solid var(--border-color);
            text-align: center;
            padding: 1.5rem;
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-top: auto;
        }

        @media (max-width: 640px) {
            .hero h1 {
                font-size: 1.8rem;
            }

            .hero p {
                font-size: 0.95rem;
            }

            .catalog-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="navbar">

            <a href="#" class="logo">
                <span>⚡ Cia Store</span>
            </a>

            <ul class="nav-links">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Katalog</a></li>
                <li><a href="#">Tentang</a></li>
            </ul>

        </div>
    </header>


    <section class="hero">

        <h1>Selamat Datang di Cia Store</h1>

        <p>
            Pusat perangkat dan aksesoris teknologi terbaik
            dengan kualitas terjamin.
        </p>

    </section>


    <main>

        <div class="catalog-header">

            <h2 class="catalog-title">
                Daftar Produk
            </h2>

            <div class="product-count-badge">
                Total Produk:
                <?php echo $total_produk; ?>
            </div>

        </div>


        <div class="product-grid">

            <?php
            foreach ($produk_list as $produk):

                $is_available = $produk['stok'] > 0;

                $status_label = $is_available
                    ? "Tersedia"
                    : "Stok Habis";

                $status_class = $is_available
                    ? "tersedia"
                    : "habis";


                /*
                 * DISKON KHUSUS MONITOR
                 *
                 * Harga normal monitor:
                 * Rp 1.950.000
                 *
                 * Diskon:
                 * 20%
                 *
                 * Harga setelah diskon:
                 * Rp 1.560.000
                 */

                if ($produk['nama'] == "Monitor LED 24 Inch 144Hz IPS") {

                    $diskon = 20;

                    $harga_diskon =
                        $produk['harga']
                        - ($produk['harga'] * $diskon / 100);

                } else {

                    $diskon = 0;

                    $harga_diskon = $produk['harga'];
                }


                // Format harga menjadi Rupiah

                $harga_rupiah =
                    "Rp " .
                    number_format(
                        $produk['harga'],
                        0,
                        ',',
                        '.'
                    );


                $harga_diskon_rupiah =
                    "Rp " .
                    number_format(
                        $harga_diskon,
                        0,
                        ',',
                        '.'
                    );
            ?>


                <div class="product-card">


                    <img
                        src="<?php echo $produk['gambar']; ?>"
                        alt="<?php echo $produk['nama']; ?>"
                        class="product-image"
                    >


                    <div class="product-info">


                        <span class="product-category">

                            <?php
                            echo $produk['kategori'];
                            ?>

                        </span>


                        <h3 class="product-name">

                            <?php
                            echo $produk['nama'];
                            ?>

                        </h3>


                        <?php if ($diskon > 0): ?>


                            <div class="product-price">


                                <div style="
                                    text-decoration: line-through;
                                    color: #94a3b8;
                                    font-size: 0.9rem;
                                ">

                                    Harga Normal:
                                    <?php
                                    echo $harga_rupiah;
                                    ?>

                                </div>


                                <div style="
                                    color: #dc2626;
                                    font-size: 0.9rem;
                                    margin: 5px 0;
                                ">

                                    Diskon
                                    <?php
                                    echo $diskon;
                                    ?>%

                                </div>


                                <div style="
                                    color: #2563eb;
                                ">

                                    <?php
                                    echo $harga_diskon_rupiah;
                                    ?>

                                </div>


                            </div>


                        <?php else: ?>


                            <div class="product-price">

                                <?php
                                echo $harga_rupiah;
                                ?>

                            </div>


                        <?php endif; ?>


                        <div class="stock-info">


                            <span>

                                Sisa Stok:

                                <strong>

                                    <?php
                                    echo $produk['stok'];
                                    ?>

                                </strong>

                            </span>


                            <span
                                class="status-badge <?php echo $status_class; ?>"
                            >

                                <?php
                                echo $status_label;
                                ?>

                            </span>


                        </div>


                        <div class="card-actions">


                            <?php if ($is_available): ?>


                                <a
                                    href="#"
                                    class="btn-buy"
                                >

                                    Beli Sekarang

                                </a>


                            <?php else: ?>


                                <button
                                    class="btn-disabled"
                                    disabled
                                >

                                    Stok Habis

                                </button>


                            <?php endif; ?>


                        </div>


                    </div>

                </div>


            <?php endforeach; ?>

        </div>

    </main>


    <footer>

        <p>

            &copy;
            <?php echo date("Y"); ?>
            Cia Store.
            All rights reserved.

        </p>

    </footer>


</body>

</html>