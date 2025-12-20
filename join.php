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
    <link rel="stylesheet" href="assets/css/style.css?v=1.5">
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
        <!-- Hero Section -->
        <section class="page-hero" style="text-align: center; padding: 6rem 1rem 4rem;">
            <h1 style="font-size: 3.5rem; color: #fff; margin-bottom: 20px;">Choose Your <span style="color: var(--accent1);">Battlefield</span></h1>
            <p style="color: var(--muted); max-width: 700px; margin: 0 auto; font-size: 1.15rem; line-height: 1.6;">
                At ByteForge, we don't just write code; we build the future. Select the domains that ignite your passion and get ready to innovate.
            </p>
        </section>

        <!-- Domains Grid -->
        <section class="section domains">
            <div class="container">
                
                <!-- Sector 1 -->
                <div class="domain-group" style="margin-bottom: 60px;">
                    <h2 class="sector-title"><i class="fas fa-code"></i> Core Development & Innovation</h2>
                    <div class="domain-grid">
                        <div class="domain-card">
                            <i class="fas fa-laptop-code"></i>
                            <h3>Web Development</h3>
                            <p>Master the art of full-stack engineering.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-mobile-alt"></i>
                            <h3>App Development</h3>
                            <p>Build the next big mobile experience.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-brain"></i>
                            <h3>AI / ML</h3>
                            <p>Teach machines to think and learn.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-database"></i>
                            <h3>Data Science</h3>
                            <p>Unlock insights from complex data.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-wifi"></i>
                            <h3>IoT</h3>
                            <p>Connect the physical world to the digital.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-code-branch"></i>
                            <h3>DSA & Competitive</h3>
                            <p>Crack algorithms and ace coding battles.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-robot"></i>
                            <h3>Robotics</h3>
                            <p>Design and program autonomous systems.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-pencil-ruler"></i>
                            <h3>UI/UX Design</h3>
                            <p>Craft beautiful, user-centric interfaces.</p>
                        </div>
                    </div>
                </div>

                <!-- Sector 2 -->
                <div class="domain-group" style="margin-bottom: 60px;">
                    <h2 class="sector-title"><i class="fas fa-shield-alt"></i> Advanced Tech & Security</h2>
                    <div class="domain-grid">
                        <div class="domain-card">
                            <i class="fas fa-cloud"></i>
                            <h3>Cloud Computing</h3>
                            <p>Architect scalable serverless solutions.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-user-secret"></i>
                            <h3>Cybersecurity</h3>
                            <p>Defend systems and hack responsibly.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fab fa-bitcoin"></i>
                            <h3>Blockchain</h3>
                            <p>Build decentralized web3 applications.</p>
                        </div>
                    </div>
                </div>

                <!-- Non-Tech -->
                <div class="domain-group">
                    <h2 class="sector-title"><i class="fas fa-paint-brush"></i> Creative & Management</h2>
                    <div class="domain-grid">
                        <div class="domain-card">
                            <i class="fas fa-video"></i>
                            <h3>Video Editing</h3>
                            <p>Tell compelling stories through visual media.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-camera-retro"></i>
                            <h3>Photography</h3>
                            <p>Capture the moments that define us.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-pen-nib"></i>
                            <h3>Content Creation</h3>
                            <p>Write, blog, and influence the narrative.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-bullhorn"></i>
                            <h3>Social Media</h3>
                            <p>Manage the digital voice of ByteForge.</p>
                        </div>
                        <div class="domain-card">
                            <i class="fas fa-calendar-check"></i>
                            <h3>Event Management</h3>
                            <p>Organize and lead tech summits.</p>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                 <div class="join-cta" style="margin-top: 80px; text-align: center; background: linear-gradient(135deg, rgba(31, 160, 181, 0.1), rgba(122, 30, 216, 0.1)); padding: 40px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1);">
                    <h2 style="font-size: 2rem; margin-bottom: 20px;">Found Your Calling?</h2>
                    <p style="color: #ccc; margin-bottom: 30px;">
                        Once you've decided on your domain(s), the next step is simple. 
                        Fill out the official registration form and attach your resume.
                    </p>
                    <a class="btn btn-primary" href="register.php" style="font-size: 1.2rem; padding: 15px 50px;">
                        Proceed to Registration <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
                    </a>
                 </div>

            </div>
        </section>

        <style>
            .sector-title {
                margin-top: 0;
                margin-bottom: 30px;
                color: var(--accent1);
                font-size: 1.8rem;
                border-bottom: 1px solid rgba(255,255,255,0.1);
                padding-bottom: 10px;
                display: inline-block;
            }
            .domain-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 20px;
            }
            .domain-card {
                background: linear-gradient(145deg, rgba(255,255,255,0.03) 0%, rgba(255,255,255,0.01) 100%);
                border: 1px solid rgba(255,255,255,0.05);
                border-radius: 12px;
                padding: 25px;
                text-align: center;
                transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
                cursor: default;
                position: relative;
                overflow: hidden;
            }
            .domain-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                border-color: var(--accent1);
            }
            .domain-card i {
                font-size: 2.5rem;
                color: #fff;
                margin-bottom: 15px;
                display: block;
                transition: color 0.3s ease;
            }
            .domain-card:hover i {
                color: var(--accent1);
            }
            .domain-card h3 {
                font-size: 1.2rem;
                color: #fff;
                margin-bottom: 10px;
            }
            .domain-card p {
                font-size: 0.9rem;
                color: var(--muted);
                line-height: 1.5;
                margin: 0;
            }
            /* Add a subtle glow element */
            .domain-card::after {
                content: '';
                position: absolute;
                top: 0; left: 0; right: 0; bottom: 0;
                background: radial-gradient(circle at center, rgba(31, 160, 181, 0.1), transparent 70%);
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .domain-card:hover::after {
                opacity: 1;
            }
        </style>
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

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader-content">
            <div class="loader-circle"></div>
            <div class="loader-text">BYTE FORGE</div>
        </div>
    </div>

    <!-- Floating Back to Top -->
    <div class="back-to-top-float">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="assets/js/main.js?v=1.6"></script>
</body>

</html>