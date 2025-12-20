<?php
$config = require __DIR__ . '/config.php';
$eventsFile = $config->data_dir . '/events.json';
$events = [];
if (file_exists($eventsFile)) $events = json_decode(file_get_contents($eventsFile), true) ?: [];

$id = $_GET['id'] ?? null;
$event = null;
if ($id) {
    foreach ($events as $e) if ($e['id'] == $id) {
        $event = $e;
        break;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Events — ByteForge</title>
    <meta name="description" content="ByteForge is a student-led tech innovation and peer-learning club where experimentation, collaboration, and real-world projects drive skill-building. We run workshops, hackathons, and mentor-driven projects that help members turn ideas into deployable software and hardware prototypes.">
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=1.6">
</head>

<body>

    <header class="header">
        <div class="logo-container">
            <h1 class="site-title">BYTE FORGE</h1>
        </div>
        <div class="header-inner">
            <div class="nav-container">
                <nav class="nav">
                    <a href="index.php">Home</a>
                    <a href="index.php#about">About</a>
                    <a href="index.php#activities">Activities</a>
                    <a href="events.php">Events</a>
                    <a href="index.php#team">Team</a>
                    <a href="index.php#join">Join</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="container">
        <?php if ($event): ?>
            <?php
            // Calculate Capacity
            $regFile = $config->data_dir . '/registrations.json';
            $registrations = [];
            if (file_exists($regFile)) {
                $registrations = json_decode(file_get_contents($regFile), true) ?: [];
            }
            $currentCount = 0;
            if (!empty($registrations)) {
                foreach ($registrations as $r) {
                    if (($r['event_id'] ?? '') == $event['id']) {
                        $currentCount++;
                    }
                }
            }
            $capacity = intval($event['capacity'] ?? 0);
            $isFull = ($capacity > 0 && $currentCount >= $capacity);
            
            // Image
            $imgSrc = htmlspecialchars($event['image'] ?? '');
            if (empty($imgSrc) || !file_exists($imgSrc)) {
                $imgSrc = 'assets/img/event.jpg';
            }
            ?>
            <article class="event-detail" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; padding: 40px; margin-bottom: 40px;">
                <div class="detail-layout" style="display: flex; gap: 40px; align-items: flex-start; margin-bottom: 40px; flex-wrap: wrap;">
                    
                    <!-- Left: Image -->
                    <div class="detail-image" style="flex: 0 0 350px; max-width: 100%;">
                        <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($event['title']) ?>" style="width: 100%; height: auto; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); object-fit: cover; aspect-ratio: 16/9;">
                    </div>

                    <!-- Right: Info -->
                    <div class="detail-info" style="flex: 1; min-width: 300px;">
                        <h1 style="font-size: 2.5rem; line-height: 1.2; margin-bottom: 15px; color: #fff; text-shadow: 0 0 10px rgba(76, 201, 240, 0.4); text-align: left;"><?= htmlspecialchars($event['title']) ?></h1>
                        
                        <div class="meta" style="display: flex; gap: 20px; color: var(--accent2); font-size: 1rem; margin-bottom: 20px;">
                            <span><i class="far fa-calendar-alt"></i> <?= htmlspecialchars($event['date'] ?? '') ?></span>
                            <span><i class="fas fa-tag"></i> <?= htmlspecialchars($event['type'] ?? '') ?></span>
                        </div>

                        <div class="description" style="font-size: 1.05rem; line-height: 1.7; color: #ccc; margin-bottom: 25px;">
                            <?= nl2br(htmlspecialchars($event['description'] ?? '')) ?>
                        </div>

                        <div class="capacity-status" style="display: inline-block; padding: 10px 20px; background: rgba(255,255,255,0.05); border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                            <strong style="color:#fff;">Availability:</strong> 
                            <?php if ($isFull): ?>
                                <span style="color: #ff4d4d; font-weight: bold; margin-left: 10px;">SOLD OUT (<?= $currentCount ?>/<?= $capacity ?>)</span>
                            <?php else: ?>
                                <span style="color: #00ff66; font-weight: bold; margin-left: 10px;">OPEN (<?= $capacity - $currentCount ?> seats left)</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <style>
                    @media (max-width: 768px) {
                        .detail-layout {
                            flex-direction: column;
                        }
                        .detail-image {
                            flex: 1 1 auto !important;
                            width: 100%;
                        }
                    }
                </style>

                <?php if (!$isFull): ?>
                <div class="registration-section">
                    <h3 style="text-align: center; margin-bottom: 30px; color: var(--accent1);">Register for Event</h3>
                    <form action="register_event.php" method="post" class="register-event" style="max-width: 700px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <input type="hidden" name="event_id" value="<?= htmlspecialchars($event['id']) ?>">
                        
                        <!-- Row 1 -->
                        <div class="form-group" style="grid-column: span 2;">
                            <label>Full Name</label>
                            <input name="name" placeholder="John Doe" required>
                        </div>

                        <!-- Row 2 -->
                        <div class="form-group">
                            <label>Register Number</label>
                            <input name="reg_no" placeholder="e.g. 720721104001" required>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input name="department" placeholder="e.g. CSE" required>
                        </div>

                        <!-- Row 3 -->
                        <div class="form-group">
                            <label>Year</label>
                            <select name="year" required>
                                <option value="" disabled selected>Select Year</option>
                                <option value="I">I Year</option>
                                <option value="II">II Year</option>
                                <option value="III">III Year</option>
                                <option value="IV">IV Year</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Batch</label>
                            <input name="batch" placeholder="e.g. 2023-2027" required>
                        </div>

                        <!-- Row 4 -->
                        <div class="form-group">
                            <label>Mode of Stay</label>
                            <select name="mode_of_stay" required>
                                <option value="" disabled selected>Select Mode</option>
                                <option value="DayScholar">DayScholar</option>
                                <option value="Hosteller">Hosteller</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Row 5 -->
                        <div class="form-group">
                            <label>Date of Enrollment</label>
                            <input type="date" name="enrollment_date" required style="color-scheme: dark;">
                        </div>
                         <div class="form-group">
                            <label>Participate As</label>
                            <select name="role" required>
                                <option value="participant">Participant</option>
                                <option value="volunteer">Volunteer</option>
                            </select>
                        </div>

                        <!-- Row 6 -->
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input name="mobile" type="tel" placeholder="+91 XXXXX XXXXX" required>
                        </div>
                        <div class="form-group">
                            <label>College Mail ID</label>
                            <input name="email" type="email" placeholder="student@college.edu" required>
                        </div>

                        <div class="form-group" style="grid-column: span 2; margin-top: 10px;">
                            <button class="btn btn-primary" type="submit" style="width: 100%; justify-content: center;">Confirm Registration</button>
                        </div>
                    </form>
                </div>
                <?php else: ?>
                    <div class="full-message" style="text-align: center; padding: 40px; background: rgba(255,0,0,0.1); border: 1px solid rgba(255,0,0,0.3); border-radius: 12px; color: #ff9999;">
                        <h3><i class="fas fa-ban"></i> Registrations Closed</h3>
                        <p>Sorry, all seats for this event have been filled. Please stay tuned for future events!</p>
                        <a href="events.php" class="btn btn-outline" style="margin-top: 20px; display: inline-flex;">Back to Events</a>
                    </div>
                <?php endif; ?>
            </article>

            <style>
                /* Scoped styles for the form */
                .register-event .form-group {
                    display: flex;
                    flex-direction: column;
                    gap: 8px;
                }
                .register-event label {
                    font-size: 0.9rem;
                    color: var(--text-gray);
                    margin-left: 4px;
                }
                .register-event input, .register-event select {
                    padding: 12px 16px;
                    border-radius: 10px;
                    border: 1px solid rgba(255,255,255,0.1);
                    background: rgba(255,255,255,0.05);
                    color: #fff;
                    font-family: inherit;
                    width: 100%;
                    outline: none;
                    transition: all 0.3s ease;
                }
                .register-event input:focus, .register-event select:focus {
                    border-color: var(--accent1);
                    background: rgba(255,255,255,0.08);
                    box-shadow: 0 0 10px rgba(76, 201, 240, 0.2);
                }
                .register-event option {
                    background: #0a0a0f;
                }
                @media (max-width: 600px) {
                    .register-event { grid-template-columns: 1fr !important; }
                    .register-event .form-group { grid-column: span 1 !important; }
                }
            </style>
        <?php else: ?>
            <section class="events-list">
                <h1>All Events</h1>
                <div class="filters">
                    <label for="filterType">Filter by Type:</label>
                    <div class="custom-select-wrapper">
                        <select id="filterType">
                            <option value="all">All Events</option>
                            <?php
                            // Extract unique types
                            $types = [];
                            foreach ($events as $e) {
                                if (!empty($e['type'])) {
                                    $types[$e['type']] = true;
                                }
                            }
                            ksort($types);
                            foreach (array_keys($types) as $t) {
                                echo '<option value="' . htmlspecialchars(strtolower($t)) . '">' . htmlspecialchars($t) . '</option>';
                            }
                            ?>
                        </select>
                        <span class="custom-arrow"><i class="fas fa-chevron-down"></i></span>
                    </div>
                </div>

                <div id="eventsGrid" class="events-grid">
                    <?php 
                    $in_progress = [];
                    $upcoming = [];
                    $completed = [];

                    foreach ($events as $e) {
                         $status = strtolower($e['status'] ?? 'upcoming');
                         if ($status === 'in progress' || $status === 'in_progress') {
                              $in_progress[] = $e;
                         } elseif ($status === 'completed') {
                              $completed[] = $e;
                         } else {
                              $upcoming[] = $e;
                         }
                    }

                    usort($in_progress, function($a, $b) { return strtotime($a['date']) - strtotime($b['date']); });
                    usort($upcoming, function($a, $b) { return strtotime($a['date']) - strtotime($b['date']); });
                    usort($completed, function($a, $b) { return strtotime($b['date']) - strtotime($a['date']); });
                    
                    $sortedEvents = array_merge($in_progress, $upcoming, $completed);

                    foreach ($sortedEvents as $e): 
                        // Determine Status Badge based on field
                        $rawStatus = strtoupper($e['status'] ?? 'UPCOMING');
                        // Normalize for check
                        $sCheck = strtolower($rawStatus);
                        
                        if ($sCheck === 'in progress' || $sCheck === 'in_progress') {
                            $statusLabel = "In Progress";
                            $statusColor = "#ffdd00"; // Yellow
                        } elseif ($sCheck === 'completed') {
                            $statusLabel = "Completed";
                            $statusColor = "#00ff66"; // Green
                        } else {
                            $statusLabel = "Upcoming"; // Or "Not Yet Started"
                            $statusColor = "#4cc9f0"; // Cyan
                        }
                    ?>
                        <?php 
                        $imgSrc = htmlspecialchars($e['image'] ?? '');
                        if (empty($imgSrc) || !file_exists($imgSrc)) {
                            $imgSrc = 'assets/img/event.jpg';
                        }
                        ?>
                        <article class="event-card" data-type="<?= htmlspecialchars(strtolower($e['type'] ?? '')) ?>">
                            <div class="event-card-img">
                                <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($e['title']) ?>">
                                <div class="event-date-badge">
                                    <span style="background: <?= $statusColor ?>; color: #000; margin-right:6px; padding:2px 6px; border-radius:4px; font-size:0.7em; font-weight:800; text-transform:uppercase;"><?= $statusLabel ?></span>
                                    <span style="background: var(--accent2); margin-right:6px; padding:2px 6px; border-radius:4px; font-size:0.7em;"><?= htmlspecialchars($e['type'] ?? '') ?></span>
                                    <?= htmlspecialchars($e['date'] ?? '') ?>
                                </div>
                            </div>
                            <div class="event-content">
                                <h3><?= htmlspecialchars($e['title']) ?></h3>
                                <p><?= htmlspecialchars($e['short'] ?? '') ?></p>
                                <a class="btn btn-small btn-outline" href="events.php?id=<?= urlencode($e['id']) ?>">View Details</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
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
    <script>
        document.getElementById('filterType')?.addEventListener('change', function(e) {
            const v = e.target.value;
            document.querySelectorAll('#eventsGrid .event-card').forEach(card => {
                if (v === 'all' || card.dataset.type === v) card.style.display = '';
                else card.style.display = 'none';
            });
        });
    </script>
</body>

</html>