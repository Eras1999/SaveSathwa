<?php
session_start();
include 'header.php';
require_once 'config.php';

$selected_keyword = $_GET['keyword'] ?? '';
$where_clause = $selected_keyword ? "WHERE keywords LIKE ?" : "";
$keyword_param = $selected_keyword ? "%$selected_keyword%" : "";

try {
    $stmt = $pdo->prepare("SELECT * FROM blogs $where_clause ORDER BY created_at DESC");
    if ($selected_keyword) {
        $stmt->execute([$keyword_param]);
    } else {
        $stmt->execute();
    }
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error fetching blogs: " . $e->getMessage();
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
    <style>
        .breadcrumb-area {
            background: url('img/bg/breadcrumb_bg.jpg') no-repeat center/cover;
            padding: 100px 0;
            color: white;
        }
        .blog-area {
            padding: 80px 0;
            background: #f9f9f9;
        }
        .blog-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .breadcrumb-area {
                padding: 60px 0;
            }
            .blog-area {
                padding: 40px 0;
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
                        <div class="breadcrumb-content text-center">
                            <h2 class="title text-3xl font-bold">Our Blog</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-center">
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
                <div class="mb-6 flex flex-wrap gap-3 justify-center">
                    <a href="blog.php" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300 <?php echo !$selected_keyword ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">All</a>
                    <a href="?keyword=dogs" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300 <?php echo $selected_keyword === 'dogs' ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">Dogs</a>
                    <a href="?keyword=cats" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300 <?php echo $selected_keyword === 'cats' ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">Cats</a>
                    <a href="?keyword=birds" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300 <?php echo $selected_keyword === 'birds' ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">Birds</a>
                    <a href="?keyword=snakes" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300 <?php echo $selected_keyword === 'snakes' ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">Snakes</a>
                    <a href="?keyword=others" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300 <?php echo $selected_keyword === 'others' ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">Others</a>
                </div>
                <?php if (isset($error)): ?>
                    <p class="text-red-500 text-center mb-4"><?php echo htmlspecialchars($error); ?></p>
                <?php elseif (empty($blogs)): ?>
                    <p class="text-gray-600 text-center">No blogs found.</p>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($blogs as $blog): ?>
                            <div class="blog-card bg-white rounded-lg overflow-hidden shadow-md">
                                <?php if ($blog['image_path']): ?>
                                    <img src="<?php echo htmlspecialchars($blog['image_path']); ?>" alt="Blog Image" class="w-full h-48 object-cover">
                                <?php endif; ?>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo htmlspecialchars($blog['topic']); ?></h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3"><?php echo htmlspecialchars($blog['content']); ?></p>
                                    <p class="text-sm text-gray-500 mb-2">Posted on: <?php echo htmlspecialchars($blog['created_at']); ?></p>
                                    <p class="text-sm text-gray-500">Keywords: <?php echo htmlspecialchars($blog['keywords']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
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