<?php
session_start();
include 'header.php';
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 3");
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SaveSathwa | Our Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo5.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/odometer.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        .breadcrumb-area {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.8), rgba(42, 82, 152, 0.8)), url('img/bg/breadcrumb_bg.jpg') no-repeat center/cover;
            padding: 120px 0;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .breadcrumb-area::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(0,0,0,0.3) 100%);
            z-index: 1;
        }
        .breadcrumb-content {
            position: relative;
            z-index: 2;
        }
        .breadcrumb-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 0.5rem;
        }
        .blog-area {
            padding: 100px 0;
            background: linear-gradient(135deg, #f9fafb, #e0eafc);
        }
        .blog-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 5px solid #10b981;
        }
        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }
        .blog-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .blog-card:hover img {
            transform: scale(1.05);
        }
        .blog-card .content {
            padding: 1.5rem;
            background: #fff;
        }
        .blog-card h3 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }
        .blog-card p {
            color: #4b5563;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        .blog-card .meta {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .btn-read {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            display: inline-block;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .btn-read:hover {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }
        @media (max-width: 768px) {
            .breadcrumb-area { padding: 80px 0; }
            .breadcrumb-content h2 { font-size: 1.8rem; }
            .blog-area { padding: 60px 0; }
            .blog-card { margin-bottom: 1.5rem; }
            .blog-card img { height: 180px; }
            .blog-card h3 { font-size: 1.2rem; }
        }
        @media (max-width: 576px) {
            .blog-card .content { padding: 1rem; }
            .btn-read { padding: 0.5rem 1rem; font-size: 0.9rem; }
        }
    </style>
</head>
<body>
    <main>
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2>Our Blog</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog-area">
            <div class="container">
                <div class="row">
                    <?php if (isset($error)): ?>
                        <p class="text-red-500"><?php echo htmlspecialchars($error); ?></p>
                    <?php else: ?>
                        <?php foreach ($blogs as $blog): ?>
                            <div class="col-md-4 mb-4">
                                <div class="blog-card">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                                    <div class="content">
                                        <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
                                        <p><?php echo htmlspecialchars(substr($blog['content'], 0, 100)) . '...'; ?></p>
                                        <div class="meta">Keywords: <?php echo htmlspecialchars($blog['keywords']); ?></div>
                                        <a href="#" class="btn-read">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="js/vendor/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.odometer.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>