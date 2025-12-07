<?php
$config = require __DIR__ . '/config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Join ByteForge - ByteForge</title>
    <meta name="description" content="Join ByteForge and choose your domain of interest.">
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700;900&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header">
        <div class="logo-container">
            <h1 class="site-title">BYTE FORGE</h1>
        </div>
        <div class="header-inner">
            <div class="nav-container">
                <nav class="nav">
                    <a href="index.php#home">Home</a>
                    <a href="index.php#about">About</a>
                    <a href="index.php#activities">Activities</a>
                    <a href="events.php">Events</a>
                    <a href="index.php#team">Team</a>
                    <a href="#join">Join</a>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <section id="join" class="section join">
            <div class="container">
                <h2 style="color: white;">Join ByteForge</h2>
                <p>Choose your domain of interest from the options below. After selecting, register
                    in the registration form at the bottom to complete your application.</p>

                <div class="domains-list">
                    <h3>Technical Domains:</h3>
                    <h4>Sector 1: Core Development & Innovation</h4>
                    <ul>
                        <li>Web Development</li>
                        <li>App Development</li>
                        <li>Artificial Intelligence / Machine Learning</li>
                        <li>Data Science / Data Analytics</li>
                        <li>Internet of Things (IoT)</li>
                        <li>Competitive Programming / DSA</li>
                        <li>Robotics & Automation</li>
                        <li>UI/UX Design</li>
                    </ul>

                    <h4>Sector 2: Advanced Technology & Security</h4>
                    <ul>
                        <li>Cloud Computing</li>
                        <li>Cybersecurity / Ethical Hacking</li>
                        <li>Blockchain</li>
                    </ul>

                    <h3>Non-Technical Domains:</h3>
                    <ul>
                        <li>Video Editing</li>
                        <li>Photo Editing</li>
                        <li>Graphic Designing</li>
                        <li>Content Writing / Creation</li>
                        <li>Social Media Management</li>
                        <li>Event Management</li>
                        <li>Documentation & Reporting</li>
                        <li>Hosting / Anchoring</li>
                    </ul>
                    <p>(You can choose multiple fields.)</p>
                </div>

                <a class="btn btn-primary" href="register.php">Register Here</a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-logo-col">
                    <img src="assets/img/BFL.jpg" alt="ByteForge logo" class="footer-logo">
                    <p class="footer-motto">Forging every byte of code to creation</p>
                </div>
                <div class="footer-brand">
                    <p><strong>Address:</strong> <br>ByteForge Community, Raise Smart, Rathinam Technical Campus, Coimbatore, Tamil Nadu, 641023</p>
                    <p><strong>Email:</strong> <br><a href="mailto:<?= htmlspecialchars($config->site_email) ?>"><?= htmlspecialchars($config->site_email) ?></a></p>
                    <p><strong>Phone:</strong> <br>+91 12345 67890</p>
                </div>
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="index.php#home">Home</a></li>
                        <li><a href="index.php#about">About</a></li>
                        <li><a href="index.php#activities">Activities</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="index.php#team">Team</a></li>
                        <li><a href="#join">Join</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-back-to-top">
                    <button class="btn btn-primary" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">Back to Top</button>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> ByteForge. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>

</html>