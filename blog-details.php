<?php
session_start();
include 'header.php';
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    try {
        $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ? AND status = 1");
        $stmt->execute([$id]);
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
} else {
    header("Location: blog.php");
    exit();
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SaveSathwa | Blog Details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo5.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .blog-detail {
            padding: 40px 0;
            background: #f9f9f9;
        }
        .blog-detail img {
            width: 100%;
            height: auto;
            border-radius: 0.5rem;
        }
        .breadcrumb-content .title {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .breadcrumb-content nav ol li a {
            color: white;
            text-decoration: none;
        }
        .breadcrumb-content nav ol li {
            color: #ccc;
        }
        .content-paragraph {
            word-wrap: break-word;
            overflow-wrap: break-word;
            max-width: 100%;
        }
        .content-paragraph p {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        .title-paragraph {
            word-wrap: break-word;
            overflow-wrap: break-word;
            max-width: 100%;
        }
        .title-paragraph span {
            display: block;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }
        @media (max-width: 992px) {
            .breadcrumb-area {
                padding: 80px 0;
            }
            .blog-detail {
                padding: 30px 0;
            }
            .breadcrumb-content .title {
                font-size: 2rem;
            }
            .title-paragraph span {
                font-size: 1.5rem;
            }
        }
        @media (max-width: 768px) {
            .breadcrumb-area {
                padding: 60px 0;
            }
            .blog-detail {
                padding: 20px 0;
            }
            .breadcrumb-content .title {
                font-size: 1.75rem;
            }
            .title-paragraph span {
                font-size: 1.25rem;
            }
            .content-paragraph p {
                font-size: 0.9rem;
            }
        }
        @media (max-width: 576px) {
            .breadcrumb-area {
                padding: 50px 0;
            }
            .blog-detail {
                padding: 15px 0;
            }
            .breadcrumb-content .title {
                font-size: 1.5rem;
            }
            .title-paragraph span {
                font-size: 1rem;
            }
            .content-paragraph p {
                font-size: 0.85rem;
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
                            <h2 class="title">Blog Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="blog.php">Our Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog-detail">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if (isset($error)): ?>
                            <p class="text-danger"><?php echo htmlspecialchars($error); ?></p>
                        <?php elseif ($blog): ?>
                            <div class="bg-white p-4 p-md-5 rounded-lg shadow">
                                <div class="title-paragraph">
                                    <?php
                                    $title = htmlspecialchars($blog['title']);
                                    $titleWords = explode(' ', $title);
                                    $titleChunk = '';
                                    foreach ($titleWords as $word) {
                                        $titleChunk .= $word . ' ';
                                        if (strlen($titleChunk) >= 20) {
                                            echo '<span>' . trim($titleChunk) . '</span>';
                                            $titleChunk = '';
                                        }
                                    }
                                    if (!empty($titleChunk)) {
                                        echo '<span>' . trim($titleChunk) . '</span>';
                                    }
                                    ?>
                                </div>
                                <img src="img/blogs/<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="mb-4">
                                <div class="content-paragraph">
                                    <?php
                                    $content = htmlspecialchars($blog['content']);
                                    $words = explode(' ', $content);
                                    $paragraph = '';
                                    foreach ($words as $word) {
                                        $paragraph .= $word . ' ';
                                        if (strlen($paragraph) >= 100) {
                                            echo '<p>' . trim($paragraph) . '</p>';
                                            $paragraph = '';
                                        }
                                    }
                                    if (!empty($paragraph)) {
                                        echo '<p>' . trim($paragraph) . '</p>';
                                    }
                                    ?>
                                </div>
                                <p class="text-sm text-gray-500">Keyword: <?php echo htmlspecialchars($blog['keyword']); ?></p>
                                <p class="text-sm text-gray-500">Published: <?php echo htmlspecialchars($blog['created_at']); ?></p>
                            </div>
                        <?php else: ?>
                            <p class="text-gray-500">Blog not found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/jquery-3.6.0.min.js"></script>
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