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
            <article class="event-detail">
                <h1><?= htmlspecialchars($event['title']) ?></h1>
                <p class="muted"><?= htmlspecialchars($event['date'] ?? '') ?> • <?= htmlspecialchars($event['type'] ?? '') ?></p>
                <p><?= nl2br(htmlspecialchars($event['description'] ?? '')) ?></p>
                <p><strong>Capacity:</strong> <?= htmlspecialchars($event['capacity'] ?? '—') ?></p>

                <h3>Register</h3>
                <form action="register_event.php" method="post" class="register-event" style="max-width: 500px; margin: 0 auto; display: grid; gap: 12px;">
                    <input type="hidden" name="event_id" value="<?= htmlspecialchars($event['id']) ?>">
                    <input name="name" placeholder="Full name" required style="padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff;">
                    <input name="email" type="email" placeholder="Email" required style="padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff;">
                    <input name="department" placeholder="Department" style="padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff;">
                    <input name="year" placeholder="Year" style="padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff;">
                    <input name="phone" placeholder="Phone (optional)" style="padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff;">
                    <select name="role" style="padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff;">
                        <option value="participant">Participant</option>
                        <option value="volunteer">Volunteer</option>
                    </select>
                    <textarea name="why" placeholder="Why do you want to join this event?" rows="4" style="padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff;"></textarea>
                    <button class="btn btn-primary" type="submit">Register</button>
                </form>
            </article>
        <?php else: ?>
            <section class="events-list">
                <h1>All Events</h1>
                <div class="filters">
                    <label>Type:
                        <select id="filterType">
                            <option value="all">All</option>
                            <option value="workshop">Workshop</option>
                            <option value="hackathon">Hackathon</option>
                            <option value="seminar">Seminar</option>
                        </select>
                    </label>
                </div>

                <div id="eventsGrid" class="events-grid">
                    <?php foreach ($events as $e): ?>
                        <article class="event-card" data-type="<?= htmlspecialchars(strtolower($e['type'] ?? '')) ?>">
                            <img src="<?= htmlspecialchars($e['image'] ?? 'assets/img/BFL.jpg') ?>" alt="<?= htmlspecialchars($e['title']) ?>" style="width:100%; height:150px; object-fit:cover; border-radius:8px; margin-bottom:10px;">
                            <span class="event-type-badge" style="background: var(--accent1); color: #fff; padding: 4px 8px; border-radius: 4px; font-size: 12px; text-transform: uppercase;"><?= htmlspecialchars($e['type'] ?? '') ?></span>
                            <h3><?= htmlspecialchars($e['title']) ?></h3>
                            <p class="muted"><?= htmlspecialchars($e['date'] ?? '') ?></p>
                            <p><?= htmlspecialchars($e['short'] ?? '') ?></p>
                            <a class="btn btn-small" href="events.php?id=<?= urlencode($e['id']) ?>">View</a>
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

    <script src="assets/js/main.js"></script>
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