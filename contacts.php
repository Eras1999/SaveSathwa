<?php
session_start();
include 'header.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!empty($name) && !empty($email) && !empty($message)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message, created_at) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$name, $email, $message]);
            $success = "Message sent successfully!";
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SaveSathwa | Contact Us</title>
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
        .contact-area {
            padding: 80px 0;
            background: #f9f9f9;
        }
        .contact-form input, .contact-form textarea {
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            padding: 0.75rem;
            width: 100%;
            margin-bottom: 1rem;
        }
        .contact-form button {
            background: #1e3a8a;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: background 0.3s;
        }
        .contact-form button:hover {
            background: #3b82f6;
        }
        @media (max-width: 768px) {
            .breadcrumb-area {
                padding: 60px 0;
            }
            .contact-area {
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
                            <h2 class="title text-3xl font-bold">Contact Us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-center">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-area">
            <div class="container">
                <div class="container-inner-wrap">
                    <div class="row justify-content-center justify-content-lg-between">
                        <div class="col-lg-6 col-md-8 order-2 order-lg-0">
                            <div class="contact-title mb-6">
                                <h5 class="sub-title text-gray-600">Contact Us</h5>
                                <h2 class="title text-3xl font-semibold">Let's Talk Question<span class="text-blue-600">.</span></h2>
                            </div>
                            <div class="contact-wrap-content">
                                <p class="text-gray-600 mb-4">The domestic is a descendant of the wolf.</p>
                                <?php if (isset($error)): ?>
                                    <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
                                <?php elseif (isset($success)): ?>
                                    <p class="text-green-500 mb-4"><?php echo htmlspecialchars($success); ?></p>
                                <?php endif; ?>
                                <form method="POST" action="" class="contact-form">
                                    <div class="form-grp">
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name <span class="text-red-500">*</span></label>
                                        <input type="text" id="name" name="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="form-grp">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Your Email <span class="text-red-500">*</span></label>
                                        <input type="email" id="email" name="email" placeholder="info@example.com" required>
                                    </div>
                                    <div class="form-grp">
                                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Your Message <span class="text-red-500">*</span></label>
                                        <textarea name="message" id="message" rows="5" placeholder="Your Opinion..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn rounded-btn">Send Now</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="contact-info-wrap">
                                <div class="contact-img mb-4">
                                    <img src="img/images/contact_img.png" alt="Contact Image" class="w-full rounded-lg">
                                </div>
                                <div class="contact-info-list">
                                    <ul class="space-y-4">
                                        <li class="flex items-center">
                                            <div class="icon text-blue-600 mr-4"><i class="fas fa-map-marker-alt"></i></div>
                                            <div class="content">
                                                <p class="text-gray-700">Sri Lanka</p>
                                            </div>
                                        </li>
                                        <li class="flex items-center">
                                            <div class="icon text-blue-600 mr-4"><i class="fas fa-phone-alt"></i></div>
                                            <div class="content">
                                                <p class="text-gray-700">07022274222</p>
                                            </div>
                                        </li>
                                        <li class="flex items-center">
                                            <div class="icon text-blue-600 mr-4"><i class="fas fa-envelope-open"></i></div>
                                            <div class="content">
                                                <p class="text-gray-700">contact@info.com</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="contact-social mt-6">
                                    <ul class="flex space-x-4">
                                        <li><a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="js/vendor/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>