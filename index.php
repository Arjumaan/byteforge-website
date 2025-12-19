<?php
$config = require __DIR__ . '/config.php';
$eventsFile = $config->data_dir . '/events.json';
$teamFile = $config->data_dir . '/team.json';
$events = [];
$team = [];

try {
    if (file_exists($eventsFile)) {
        $events = json_decode(file_get_contents($eventsFile), true) ?: [];
    }
} catch (Exception $e) {
    error_log("Error loading events.json: " . $e->getMessage());
    $events = [];
}

try {
    if (file_exists($teamFile)) {
        $team = json_decode(file_get_contents($teamFile), true) ?: [];
    }
} catch (Exception $e) {
    error_log("Error loading team.json: " . $e->getMessage());
    $team = [];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>ByteForge - Forging every byte of code to creation</title>
    <meta name="description" content="ByteForge is a student-led tech innovation and peer-learning club where experimentation, collaboration, and real-world projects drive skill-building. We run workshops, hackathons, and mentor-driven projects that help members turn ideas into deployable software and hardware prototypes.">
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>



<body>
    
    <!-- Background SVG Animations -->
    <div class="background-svg-animations">
        <!-- Coding Symbols -->
        <svg class="bg-svg bg-svg-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 3L5 6.99H9V14.01H5L9 18V21H15V18L19 14.01H15V6.99H19L15 3H9Z" fill="url(#codingGrad1)" />
            <defs>
                <linearGradient id="codingGrad1" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#9b6bff;stop-opacity:0.6" />
                    <stop offset="100%" style="stop-color:#6a32ff;stop-opacity:0.6" />
                </linearGradient>
            </defs>
        </svg>
        <svg class="bg-svg bg-svg-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <text x="12" y="16" text-anchor="middle" font-size="18" fill="url(#codingGrad2)">;</text>
            <defs>
                <linearGradient id="codingGrad2" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#9b6bff;stop-opacity:0.6" />
                    <stop offset="100%" style="stop-color:#6a32ff;stop-opacity:0.6" />
                </linearGradient>
            </defs>
        </svg>
        <svg class="bg-svg bg-svg-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <text x="12" y="16" text-anchor="middle" font-size="18" fill="url(#codingGrad3)">{</text>
            <defs>
                <linearGradient id="codingGrad3" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#9b6bff;stop-opacity:0.6" />
                    <stop offset="100%" style="stop-color:#6a32ff;stop-opacity:0.6" />
                </linearGradient>
            </defs>
        </svg>
        <svg class="bg-svg bg-svg-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <text x="12" y="16" text-anchor="middle" font-size="18" fill="url(#codingGrad4)">}</text>
            <defs>
                <linearGradient id="codingGrad4" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#9b6bff;stop-opacity:0.6" />
                    <stop offset="100%" style="stop-color:#6a32ff;stop-opacity:0.6" />
                </linearGradient>
            </defs>
        </svg>
        <!-- Technical Parts -->
        <svg class="bg-svg bg-svg-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="3" fill="url(#techGrad1)" />
            <path d="M12 1V5M12 19V23M5 12H1M23 12H19M7.05 7.05L4.22 4.22M19.78 19.78L16.95 16.95M16.95 7.05L19.78 4.22M4.22 19.78L7.05 16.95" stroke="url(#techGrad1)" stroke-width="2" />
            <defs>
                <linearGradient id="techGrad1" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#9b6bff;stop-opacity:0.6" />
                    <stop offset="100%" style="stop-color:#6a32ff;stop-opacity:0.6" />
                </linearGradient>
            </defs>
        </svg>
        <svg class="bg-svg bg-svg-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <text x="12" y="16" text-anchor="middle" font-size="14" fill="url(#techGrad2)">0101</text>
            <defs>
                <linearGradient id="techGrad2" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#9b6bff;stop-opacity:0.6" />
                    <stop offset="100%" style="stop-color:#6a32ff;stop-opacity:0.6" />
                </linearGradient>
            </defs>
        </svg>
        <!-- Mechanical Parts -->
        <svg class="bg-svg bg-svg-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM12 8C13.1 8 14 8.9 14 10C14 11.1 13.1 12 12 12C10.9 12 10 11.1 10 10C10 8.9 10.9 8 12 8ZM12 14C13.1 14 14 14.9 14 16C14 17.1 13.1 18 12 18C10.9 18 10 17.1 10 16C10 14.9 10.9 14 12 14ZM8 4C9.1 4 10 4.9 10 6C10 7.1 9.1 8 8 8C6.9 8 6 7.1 6 6C6 4.9 6.9 4 8 4ZM16 4C17.1 4 18 4.9 18 6C18 7.1 17.1 8 16 8C14.9 8 14 7.1 14 6C14 4.9 14.9 4 16 4ZM8 10C9.1 10 10 10.9 10 12C10 13.1 9.1 14 8 14C6.9 14 6 13.1 6 12C6 10.9 6.9 10 8 10ZM16 10C17.1 10 18 10.9 18 12C18 13.1 17.1 14 16 14C14.9 14 14 13.1 14 12C14 10.9 14.9 10 16 10ZM8 16C9.1 16 10 16.9 10 18C10 19.1 9.1 20 8 20C6.9 20 6 19.1 6 18C6 16.9 6.9 16 8 16ZM16 16C17.1 16 18 16.9 18 18C18 19.1 17.1 20 16 20C14.9 20 14 19.1 14 18C14 16.9 14.9 16 16 16Z" fill="white" />
        </svg>
        <svg class="bg-svg bg-svg-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM12 8C13.1 8 14 8.9 14 10C14 11.1 13.1 12 12 12C10.9 12 10 11.1 10 10C10 8.9 10.9 8 12 8ZM12 14C13.1 14 14 14.9 14 16C14 17.1 13.1 18 12 18C10.9 18 10 17.1 10 16C10 14.9 10.9 14 12 14ZM8 4C9.1 4 10 4.9 10 6C10 7.1 9.1 8 8 8C6.9 8 6 7.1 6 6C6 4.9 6.9 4 8 4ZM16 4C17.1 4 18 4.9 18 6C18 7.1 17.1 8 16 8C14.9 8 14 7.1 14 6C14 4.9 14.9 4 16 4ZM8 10C9.1 10 10 10.9 10 12C10 13.1 9.1 14 8 14C6.9 14 6 13.1 6 12C6 10.9 6.9 10 8 10ZM16 10C17.1 10 18 10.9 18 12C18 13.1 17.1 14 16 14C14.9 14 14 13.1 14 12C14 10.9 14.9 10 16 10ZM8 16C9.1 16 10 16.9 10 18C10 19.1 9.1 20 8 20C6.9 20 6 19.1 6 18C6 16.9 6.9 16 8 16ZM16 16C17.1 16 18 16.9 18 18C18 19.1 17.1 20 16 20C14.9 20 14 19.1 14 18C14 16.9 14.9 16 16 16Z" fill="white" />
        </svg>
    </div>

    <header class="header">
        <div class="logo-container">
            <h1 class="site-title">BYTE FORGE</h1>
        </div>
        <div class="header-inner">
            <div class="nav-container">
                <nav class="nav">
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#activities">Activities</a>
                    <a href="events.php">Events</a>
                    <a href="#team">Team</a>
                    <a href="#join">Join</a>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <!-- HERO -->
        <svg class="glow-wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <defs>
                <linearGradient id="glowGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#b472ff;stop-opacity:0.8" />
                    <stop offset="100%" style="stop-color:#7a3eff;stop-opacity:0.8" />
                </linearGradient>
            </defs>
            <path fill="url(#glowGradient)" fill-opacity="0.25">
                <animate attributeName="d" dur="12s" repeatCount="indefinite"
                    values="
      M0,192L48,186.7C96,181,192,171,288,154.7C384,139,480,117,576,133.3C672,149,768,203,864,197.3C960,192,1056,128,1152,117.3C1248,107,1344,149,1392,170.7L1440,192L1440,320L0,320Z;
      M0,160L48,165.3C96,171,192,181,288,186.7C384,192,480,192,576,181.3C672,171,768,149,864,160C960,171,1056,213,1152,213.3C1248,213,1344,171,1392,154.7L1440,138.7L1440,320L0,320Z;
      M0,192L48,186.7C96,181,192,171,288,154.7C384,139,480,117,576,133.3C672,149,768,203,864,197.3C960,192,1056,128,1152,117.3C1248,107,1344,149,1392,170.7L1440,192L1440,320L0,320Z;">
                </animate>
            </path>
        </svg>

        <section id="home" class="hero">
            <div class="hero-inner">
                <div class="hero-text">
                    <p class="motto typing-cursor" id="typingMotto"></p>
<p class="lead" id="heroLead" data-text="We are ByteForge—where code meets creation. We bridge the gap between academic theory and industry reality through hands-on innovation. From AI and Robotics to Full-Stack Engineering, we empower you to build real-world projects, collaborate with peers, and forge your future in technology. Don't just learn it. Build it."></p>
                    <div class="hero-cta">
                        <a href="#join" class="btn btn-primary">Join ByteForge</a>
                        <a href="#about" class="btn btn-outline">Learn More</a>
                    </div>
                </div>

                <div class="hero-art" aria-hidden="true">
                    <!-- small logo reflection/box right (visual) -->
                    <div class="logo-card">
                        <img src="assets/img/BFL.jpg" alt="ByteForge logo small" aria-hidden="true">
                    </div>
                </div>
                
                <div class="scroll-indicator" onclick="document.querySelector('#about').scrollIntoView({behavior:'smooth'})">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </section>

        <!-- ABOUT -->
        <section id="about" class="section about">
            <div class="container">
                <h2 style="color: white; text-align:center;">About ByteForge <br><span style="font-size:0.6em; color:var(--accent1);">Crafting the Future of Technology</span></h2>
                
                <div class="about-intro">
                    <p>ByteForge is more than just a student club; it is a dedicated ecosystem for innovation established within the Raise Smart Pro (Rathinam Technical Campus). Born from the vision of bridging the widening gap between academic theory and industrial reality, ByteForge serves as a dynamic hub where technology is not just studied, but actively created.</p>
                </div>

                <div class="about-grid">
                    <div class="about-box">
                        <h3><i class="fas fa-hammer"></i> Our Philosophy</h3>
                        <p class="highlight-text">"Forging Every Byte of Code"</p>
                        <p>Our motto is the heartbeat of our operations. It reflects our belief that coding is a craft that requires dedication, precision, and continuous refinement. At ByteForge, we do not believe in learning in isolation. We believe that knowledge grows when it is shared.</p>
                    </div>

                    <div class="about-box">
                        <h3><i class="fas fa-rocket"></i> What We Do</h3>
                        <ul class="feature-list">
                            <li><strong>Innovation & Competition:</strong> Regular Hackathons and coding challenges simulating high-pressure industry environments.</li>
                            <li><strong>Workshops & Seminars:</strong> "Moon-light Workshops" on AI, Full Stack, and Cyber Security to guide students from theory to practice.</li>
                            <li><strong>Open Source & Mentorship:</strong> Developing a culture of peer-to-peer learning and open-source contribution.</li>
                        </ul>
                    </div>

                    <div class="about-box">
                        <h3><i class="fas fa-user-graduate"></i> Developing Leaders</h3>
                        <p>We aim to produce graduates who are not only technically excellent but also confident, articulate, and ready to lead. Through active participation in events and projects, members enhance their soft skills and leadership qualities.</p>
                    </div>
                </div>

                <div class="about-footer">
                    <h3>Join the Forge</h3>
                    <p>The ByteForge Club is built on the pillars of collaboration, creativity, and technical excellence. Whether you are looking to master a new language or build a portfolio-worthy project, ByteForge is your home.</p>
                    <p class="final-motto">Come build with us. Let’s forge the future, one byte at a time.</p>
                </div>
            </div>
        </section>

        <!-- ACTIVITIES -->
        <section id="activities" class="section activities">
            <div class="container">
                <h2 style="color: white;">Our Activities</h2>
                <div class="activities-grid">
                    <?php
                    $activities = [
                        ['title' => 'Workshops', 'desc' => 'Hands-on sessions on web, ML, embedded systems.', 'image' => 'assets/img/workshops.jpg'],
                        ['title' => 'Seminars', 'desc' => 'Industry talks and guest lectures.', 'image' => 'assets/img/seminars.jpg'],
                        ['title' => 'Hackathons', 'desc' => 'Build & ship projects in sprints.', 'image' => 'assets/img/hackathons.jpg'],
                        ['title' => 'Projects', 'desc' => 'Collaborative semester-long projects.', 'image' => 'assets/img/projects.jpg'],
                        ['title' => 'Tech Challenges', 'desc' => 'Weekly coding & hardware challenges.', 'image' => 'assets/img/challenges.jpg'],
                        ['title' => 'Presentations', 'desc' => 'Showcase demos and lightning talks.', 'image' => 'assets/img/presentations.jpg'],
                        ['title' => 'Technical Training', 'desc' => 'Structured mentorship tracks.', 'image' => 'assets/img/training.jpg'],
                        ['title' => 'Inter-College Events', 'desc' => 'Competitions and collaborations.', 'image' => 'assets/img/intercollege.jpg'],
                    ];
                    foreach ($activities as $a): ?>
                        <article class="activity-card">
                            <h3>
                                <?php
                                $icon = '';
                                switch ($a['title']) {
                                    case 'Workshops':
                                        $icon = 'fa-tools';
                                        break;
                                    case 'Seminars':
                                        $icon = 'fa-microphone';
                                        break;
                                    case 'Hackathons':
                                        $icon = 'fa-trophy';
                                        break;
                                    case 'Projects':
                                        $icon = 'fa-project-diagram';
                                        break;
                                    case 'Tech Challenges':
                                        $icon = 'fa-puzzle-piece';
                                        break;
                                    case 'Presentations':
                                        $icon = 'fa-bullhorn';
                                        break;
                                    case 'Technical Training':
                                        $icon = 'fa-graduation-cap';
                                        break;
                                    case 'Inter-College Events':
                                        $icon = 'fa-users';
                                        break;
                                }
                                ?>
                                <i class="fas <?= $icon ?>"></i> <?= htmlspecialchars($a['title']) ?>
                            </h3>
                            <p><?= htmlspecialchars($a['desc']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- EVENTS PREVIEW -->
        <section id="events-preview" class="section events">
            <div class="container">
                <div class="events-head">
                    <h2 style="color: white;">Events & Registrations</h2>
                    <a class="btn btn-outline" href="events.php">View All Events</a>
                </div>

                <div class="events-grid">
                    <?php
                    // Sorting Logic based on explicit JSON 'status' field
                    // Order: In Progress -> Upcoming -> Completed
                    
                    $in_progress = [];
                    $upcoming = []; // Maps to "Not Yet Started"
                    $completed = [];

                    foreach ($events as $e) {
                        // Default to 'Upcoming' if missing
                        $status = strtolower($e['status'] ?? 'upcoming');
                        
                        if ($status === 'in progress' || $status === 'in_progress') {
                             $in_progress[] = $e;
                        } elseif ($status === 'completed') {
                             $completed[] = $e;
                        } else {
                            $upcoming[] = $e;
                        }
                    }

                    // Sort groups by date
                    // In Progress: Earliest first
                    usort($in_progress, function($a, $b) { return strtotime($a['date']) - strtotime($b['date']); });
                    
                    // Upcoming: Earliest first (Soonest)
                    usort($upcoming, function($a, $b) { return strtotime($a['date']) - strtotime($b['date']); });
                    
                    // Completed: Latest first (Most recent)
                    usort($completed, function($a, $b) { return strtotime($b['date']) - strtotime($a['date']); });

                    // Merge: In Progress -> Upcoming (Completed hidden from Home Preview)
                    $displayEvents = array_merge($in_progress, $upcoming);
                    
                    // Take top 3
                    $latestEvents = array_slice($displayEvents, 0, 3);
                    
                    if (count($latestEvents) > 0) {
                        foreach ($latestEvents as $e) {
                            $id = htmlspecialchars($e['id'] ?? '');
                            $title = htmlspecialchars($e['title'] ?? '');
                            $date = htmlspecialchars($e['date'] ?? '');
                            $short = htmlspecialchars($e['short'] ?? '');
                            // Fallback image handling
                            $imgSrc = htmlspecialchars($e['image'] ?? '');
                            if (empty($imgSrc) || !file_exists($imgSrc)) {
                                $imgSrc = 'assets/img/event.jpg'; // Default if missing
                                // In a real scenario we'd check file_exists relative to root, simplified here
                            }
                            
                            echo "
                            <div class='event-card'>
                                <div class='event-card-img'>
                                    <img src='$imgSrc' alt='$title'>
                                    <div class='event-date-badge'><i class='far fa-calendar-alt'></i> $date</div>
                                </div>
                                <div class='event-content'>
                                    <h3>$title</h3>
                                    <p>$short</p>
                                    <a class='btn btn-small btn-primary' href='events.php?id=$id'>Register Now</a>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<p class='muted'>No events yet. Stay tuned!</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- TEAM -->
        <section id="team" class="team-section">
            <h2>Meet Our Core Leaders</h2>
            <p class="team-sub">The driving minds behind ByteForge’s innovation and success.</p>

            <?php 
            $students = array_slice($team, 0, 3);
            $faculty = array_slice($team, 3);
            ?>
            
            <!-- Students Team -->
            <div class="team-grid">
                <?php foreach ($students as $member): ?>
                    <div class="team-card">
                        <div class="team-card-inner">
                            <button class="team-close-btn" aria-label="Close details">&times;</button>
                            <div class="team-img-col">
                                <img src="<?= htmlspecialchars($member['image'] ?? 'assets/img/BFL.jpg') ?>" alt="<?= htmlspecialchars($member['name'] ?? 'Team Member') ?>">
                            </div>
                            <div class="team-info-col">
                                <h3><?= htmlspecialchars($member['name'] ?? '') ?></h3>
                                <p class="team-role"><?= htmlspecialchars($member['role'] ?? '') ?></p>
                                <p class="team-desc"><?= htmlspecialchars($member['description'] ?? '') ?></p>
                                <p class="team-email"><a href="mailto:<?= htmlspecialchars($member['email'] ?? '') ?>"><?= htmlspecialchars($member['email'] ?? '') ?></a></p>
                                <div class="team-links">
                                    <a href="<?= htmlspecialchars($member['linkedin'] ?? '#') ?>" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a>
                                    <a href="<?= htmlspecialchars($member['github'] ?? '#') ?>" target="_blank" rel="noopener"><i class="fab fa-github"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Teachers/Faculty Team -->
             <div class="team-center">
                <?php foreach ($faculty as $member): ?>
                    <div class="team-card">
                        <div class="team-card-inner">
                            <button class="team-close-btn" aria-label="Close details">&times;</button>
                            <div class="team-img-col">
                                <img src="<?= htmlspecialchars($member['image'] ?? 'assets/img/BFL.jpg') ?>" alt="<?= htmlspecialchars($member['name'] ?? 'Team Member') ?>">
                            </div>
                            <div class="team-info-col">
                                <h3><?= htmlspecialchars($member['name'] ?? '') ?></h3>
                                <p class="team-role"><?= htmlspecialchars($member['role'] ?? '') ?></p>
                                <p class="team-desc"><?= htmlspecialchars($member['description'] ?? '') ?></p>
                                <p class="team-email"><a href="mailto:<?= htmlspecialchars($member['email'] ?? '') ?>"><?= htmlspecialchars($member['email'] ?? '') ?></a></p>
                                <div class="team-links">
                                    <a href="<?= htmlspecialchars($member['linkedin'] ?? '#') ?>" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a>
                                    <a href="<?= htmlspecialchars($member['github'] ?? '#') ?>" target="_blank" rel="noopener"><i class="fab fa-github"></i></a>
                                </div>
                            </div>
                         </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (empty($team)): ?>
                <div class="team-grid">
                    <p class="muted">No team members yet. Add team data in <code>/data/team.json</code>.</p>
                </div>
            <?php endif; ?>
        </section>

        <!-- JOIN -->
        <section id="join" class="section join">
            <div class="container">
                <h2 style="color: white;">To Join ByteForge</h2>
                <p>View the list of domains in our club. Choose your domain and fill the registration form available in the next page.</p>
                <p>The Registration form must be submitted with your resume to the club incharge.</p> <br>
                <a class="btn btn-primary" href="join.php">Joining Process</a>
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
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#activities">Activities</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="#team">Team</a></li>
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