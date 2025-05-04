<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <link rel="stylesheet" href="css/faq.css">

    <?php
    // Include the header
    include 'header.php';
    ?>
</head>
<body>
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Frequently Asked Questions</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- faq-area -->
            <section class="faq-area section-py-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="faq-content">
                                <h3 class="section-title">SaveSathwa FAQ</h3>
                                <p>Find answers to common questions about using the SaveSathwa platform to report and assist animals in distress.</p>

                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                What is SaveSathwa?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                SaveSathwa is an AI-Powered Animal Rescue and Assistance Platform that allows users to report animals in distress, view and interact with reports, and coordinate rescue efforts. It uses AI to identify snake species from uploaded images and provides location-based search and community support features.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                How do I report an animal in need?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                To report an animal, register or log in to your SaveSathwa account. Navigate to the "Report Animal" section, upload an image (optional), provide location details, and describe the animal’s condition (e.g., injured, sick, abandoned). Submit the report, and it will be visible to other users for assistance.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                How does the AI snake identification work?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                When you upload an image of a snake, our AI model analyzes it to identify the species. The AI provides information to help you decide on appropriate rescue actions or safety precautions. Note that AI results are for guidance only, and you should verify them before acting.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Can I use SaveSathwa without registering?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                You can view animal reports and educational resources without registering. However, to report animals, comment, share, or offer assistance, you must create an account for security and verification purposes.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                How can I help animals reported on the platform?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                You can offer help by commenting on reports, sharing them to increase visibility, or indicating your willingness to provide medical help, transportation, or adoption. Coordinate with other users or animal welfare organizations through the platform.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                Is my personal information secure?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                Yes, we use encryption, access controls, and regular security audits to protect your data. For more details, please review our <a href="privacy_policy.php">Privacy Policy</a>.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                How do I receive notifications about nearby animals?
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                Enable notifications in your account settings to receive alerts about animals in distress near your location or updates on reports you’ve engaged with. Ensure your browser allows notifications from SaveSathwa.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEight">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                How can I contact SaveSathwa for support?
                                            </button>
                                        </h2>
                                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                You can reach us at <a href="mailto:support@savesathwa.com">support@savesathwa.com</a> or write to SaveSathwa, Faculty of Computing, Saegis Campus, Sri Lanka. We aim to respond within 48 hours.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="contact-support">
                                    <p>Still have questions? <a href="mailto:support@savesathwa.com">Contact our support team</a> for assistance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- faq-area-end -->
        </main>
        <!-- main-area-end -->

        <?php
        // Include the footer at the bottom
        include 'footer.php';
        ?>

        <!-- JS here -->
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
        <script src="js/faq.js"></script>
    </body>
</html>