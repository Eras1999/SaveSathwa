<?php
session_start();
include 'header.php';
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT * FROM blogs WHERE status = 1 ORDER BY created_at DESC");
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<!doctype html>
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
            background: url('img/bg/breadcrumb_bg.jpg') no-repeat center/cover;
            padding: 100px 0;
            color: white;
        }
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            padding: 40px 0;
        }
        .blog-card {
            background: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .blog-card:hover {
            transform: translateY(-5px);
        }
        .blog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .blog-content {
            padding: 1rem;
        }
        @media (max-width: 1024px) {
            .breadcrumb-area {
                padding: 80px 0;
            }
            .blog-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        @media (max-width: 768px) {
            .breadcrumb-area {
                padding: 60px 0;
            }
            .blog-grid {
                grid-template-columns: 1fr;
                padding: 20px 0;
            }
            .blog-card img {
                height: 150px;
            }
        }
        @media (max-width: 480px) {
            .blog-card {
                margin: 0 10px;
            }
            .blog-content h3 {
                font-size: 1.1rem;
            }
            .blog-content p {
                font-size: 0.9rem;
            }
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
                            <h2 class="title">Our Blog</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
                    <div class="col-12">
                        <div class="blog-grid">
                            <?php if (isset($error)): ?>
                                <p class="text-red-500"><?php echo htmlspecialchars($error); ?></p>
                            <?php elseif (empty($blogs)): ?>
                                <p class="text-gray-500">No blogs available.</p>
                            <?php else: ?>
                                <?php foreach ($blogs as $blog): ?>
                                    <div class="blog-card">
                                        <img src="img/blogs/<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                                        <div class="blog-content">
                                            <h3 class="text-lg font-semibold mb-2"><?php echo htmlspecialchars($blog['title']); ?></h3>
                                            <p class="text-gray-600 mb-2"><?php echo htmlspecialchars(substr($blog['content'], 0, 100)) . (strlen($blog['content']) > 100 ? '...' : ''); ?></p>
                                            <a href="blog-details.php?id=<?php echo $blog['id']; ?>" class="text-blue-600 hover:text-blue-800">Read More</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
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