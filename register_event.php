<?php
// register_event.php - Handles form submission for event registration
$config = require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: events.php');
    exit;
}

// 1. Collect and Sanitize Input
$event_id = $_POST['event_id'] ?? '';
$name =  htmlspecialchars(trim($_POST['name'] ?? ''));
$reg_no = htmlspecialchars(trim($_POST['reg_no'] ?? ''));
$department = htmlspecialchars(trim($_POST['department'] ?? ''));
$year = htmlspecialchars(trim($_POST['year'] ?? ''));
$batch = htmlspecialchars(trim($_POST['batch'] ?? ''));
$mode_of_stay = htmlspecialchars(trim($_POST['mode_of_stay'] ?? ''));
$gender = htmlspecialchars(trim($_POST['gender'] ?? ''));
$enrollment_date = htmlspecialchars(trim($_POST['enrollment_date'] ?? ''));
$role = htmlspecialchars(trim($_POST['role'] ?? ''));
$mobile = htmlspecialchars(trim($_POST['mobile'] ?? ''));
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);

// Basic Validation
if (!$event_id || !$name || !$email || !$mobile) {
    die("Error: Missing required fields.");
}

// 2. Database Connection
try {
    $dsn = "mysql:host={$config->db_host};dbname={$config->db_name};charset=utf8mb4";
    $pdo = new PDO($dsn, $config->db_user, $config->db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die("Database Connection Error: " . $e->getMessage());
}

// 3. Verify Event Capacity (still using JSON for event definitions for now, as events table might not exist or be used yet)
$eventsFile = $config->data_dir . '/events.json';
$events = file_exists($eventsFile) ? json_decode(file_get_contents($eventsFile), true) : [];

$targetEvent = null;
foreach ($events as $e) {
    if ($e['id'] === $event_id) {
        $targetEvent = $e;
        break;
    }
}

if (!$targetEvent) {
    die("Error: Event not found.");
}

// Check capacity using DB count
$stmt = $pdo->prepare("SELECT COUNT(*) FROM registrations WHERE event_id = ?");
$stmt->execute([$event_id]);
$currentCount = $stmt->fetchColumn();

$capacity = intval($targetEvent['capacity'] ?? 0);
if ($capacity > 0 && $currentCount >= $capacity) {
    die("Error: Registration full for this event.");
}

// 4. Save to Database
try {
    $sql = "INSERT INTO registrations (event_id, name, email, department, year, phone, role, why, reg_no, batch, mode_of_stay, gender, enrollment_date, mobile, created_at) 
            VALUES (:event_id, :name, :email, :department, :year, :phone, :role, :why, :reg_no, :batch, :mode_of_stay, :gender, :enrollment_date, :mobile, NOW())";
    
    $stmt = $pdo->prepare($sql);
    
    // Note: 'phone' in DB maps to 'mobile' from form? Or form has 'mobile' and 'phone'?
    // The form has 'mobile' (required) and 'phone' (optional).
    // The previous JSON had 'phone'. The image shows 'phone'.
    // The user requested: "Mobile Number". And form has input name="mobile".
    // I will map form 'mobile' to DB 'mobile' if it exists, or 'phone' if that's the primary. 
    // The user asked to ALTER the table. I will assume they add 'mobile'.
    // Let's map form 'mobile' to DB 'mobile'. And form 'phone' to DB 'phone'.
    
    $stmt->execute([
        ':event_id' => $event_id,
        ':name' => $name,
        ':email' => $email,
        ':department' => $department,
        ':year' => $year,
        ':phone' => $_POST['phone'] ?? '', // Optional phone
        ':role' => $role,
        ':why' => $_POST['why'] ?? '',
        ':reg_no' => $reg_no,
        ':batch' => $batch,
        ':mode_of_stay' => $mode_of_stay,
        ':gender' => $gender,
        ':enrollment_date' => $enrollment_date,
        ':mobile' => $mobile // Required mobile
    ]);

    // 5. Redirect on Success
    header('Location: index.php?registered=1'); 
    exit;

} catch (PDOException $e) {
    die("Registration Error: " . $e->getMessage());
}
?>
