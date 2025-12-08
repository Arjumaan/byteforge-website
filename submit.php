<?php
// submit.php - Final Version (TLS/587 Optimized for Localhost)
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json; charset=utf-8');

// 1. SETUP & DEPENDENCIES
require_once __DIR__ . '/tcpdf/tcpdf.php';

// Load Environment Variables if file exists
if (file_exists(__DIR__ . '/env_loader.php')) {
    require_once __DIR__ . '/env_loader.php';
}

$hasPHPMailer = file_exists(__DIR__ . '/phpmailer/PHPMailer.php');
if ($hasPHPMailer) {
    require_once __DIR__ . '/phpmailer/PHPMailer.php';
    require_once __DIR__ . '/phpmailer/SMTP.php';
    require_once __DIR__ . '/phpmailer/Exception.php';
}

function json_exit($arr)
{
    if (ob_get_length()) ob_clean();
    echo json_encode($arr);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_exit(['status' => 'error', 'message' => 'Invalid request method']);
}

// 2. DATA COLLECTION
function getPost($k)
{
    return isset($_POST[$k]) ? trim($_POST[$k]) : '';
}
function getArr($k)
{
    if (isset($_POST[$k]) && is_array($_POST[$k])) return $_POST[$k];
    if (isset($_POST[$k])) return explode(',', $_POST[$k]);
    return [];
}
function getCheckboxes($k)
{
    $arr = getArr($k);
    return implode(', ', $arr);
}

// Map Data
$data = [
    'full_name' => getPost('fullName'),
    'reg_number' => getPost('regNumber'),
    'department_year' => getPost('department'),
    'batch' => getPost('batch'),
    'email_id' => getPost('emailId'),
    'college_email_id' => getPost('collegeEmail'),
    'phone_number' => getPost('phone'),
    'gender' => getPost('gender'),
    'joining_role' => getPost('joiningRole'),

    // Arrays for PDF Visuals
    'tech_domains_arr' => getArr('techDomains'),
    'non_tech_domains_arr' => getArr('nonTechDomains'),
    'design_tools_arr' => getArr('designTools'),
    'video_tools_arr' => getArr('videoTools'),
    'learning_mode_arr' => getArr('learningMode'),
    'writing_skills_arr' => getArr('writingSkills'),
    'content_plat_arr' => getArr('contentPlat'),
    'collab_plat_arr' => getArr('collabPlat'),

    // Strings for DB
    'technical_domains' => getCheckboxes('techDomains'),
    'non_technical_domains' => getCheckboxes('nonTechDomains'),
    'operating_systems' => getCheckboxes('os'),
    'database_experience' => getCheckboxes('db'),
    'content_creation_platforms' => getCheckboxes('contentPlat'),
    'design_tools' => getCheckboxes('designTools'),
    'video_editing_tools' => getCheckboxes('videoTools'),
    'writing_skills' => getCheckboxes('writingSkills'),
    'preferred_learning_mode' => getCheckboxes('learningMode'),
    'collaboration_platforms' => getCheckboxes('collabPlat'),

    // Details
    'programming_languages' => getPost('progLanguages'),
    'frameworks_tools' => getPost('frameworks'),
    'coding_proficiency' => getPost('proficiency'),
    'currently_learning' => getPost('currentlyLearning'),
    'open_source_contribution_link' => getPost('openSourceContrib'),
    'communication_skill' => getPost('commSkill'),
    'leadership_skill' => getPost('leadershipSkill'),
    'problem_solving_skill' => getPost('problemSolving'),
    'time_management_skill' => getPost('timeMgmt'),
    'teamwork_adaptability' => getPost('teamwork'),
    'languages_known' => getPost('languagesKnown'),
    'strengths_unique_qualities' => getPost('strengths'),
    'preferred_ide' => getPost('ide'),
    'git_familiarity' => getPost('gitFamiliarity'),
    'api_backend_frameworks' => getPost('apiFrameworks'),
    'hosting_experience' => getPost('hostingExp'),
    'hosting_platform_details' => getPost('hostingPlatform'),
    'public_speaking_confidence' => getPost('publicSpeaking'),
    'anchoring_experience' => getPost('anchoringExp'),
    'anchoring_event_details' => getPost('anchoringEvents'),
    'led_team_project' => getPost('ledTeam'),
    'leadership_role_details' => getPost('leadershipRoleDetail'),
    'mentored_peers' => getPost('mentoredPeers'),
    'innovative_ideas_products' => getPost('innovativeIdeas'),
    'interest_in_leadership' => getPost('leadershipInterest'),
    'domains_to_learn_this_year' => getPost('domainsToLearn'),
    'workshop_technologies_requested' => getPost('workshopTopics'),
    'comfortable_in_teams' => getPost('teamComfort'),
    'cross_dept_collaboration_interest' => getPost('crossDeptCollab'),
    'github_link' => getPost('github'),
    'linkedin_link' => getPost('linkedin'),
    'portfolio_website' => getPost('portfolio'),
    'reason_for_joining' => getPost('whyJoin'),
    'contribution_skills' => getPost('contribute'),
    'interest_in_organizing' => getPost('organizeInterest'),
    'hackathon_participation' => getPost('hackathonExp'),
    'hackathon_details' => getPost('hackathonDetails'),
    'other_clubs' => getPost('otherClubs'),
    'current_semester' => getPost('semester'),
    'attendance_percentage' => getPost('attendance'),
    'current_cgpa' => getPost('cgpa'),
    'number_of_arrears' => getPost('arrears'),
    'projects_completed_count' => getPost('projCount'),
    'certifications_completed_count' => getPost('certCount'),
    'areas_of_technical_expertise' => getPost('areasOfExpertise'),
    'open_source_experience' => getPost('openSourceExp'),
    'open_source_details' => getPost('openSourceDetails'),
    'internship_industrial_experience' => getPost('internshipExp'),
    'short_term_goal' => getPost('shortTermGoal'),
    'long_term_goal' => getPost('longTermGoal'),
    'mentor_juniors_interest' => getPost('mentorJuniors'),
    'awards_technical' => getPost('techAwards'),
    'awards_non_technical' => getPost('nonTechAwards'),
    'publications_research' => getPost('publications'),
    'requested_activities' => getPost('activitySuggestions'),
    'referral_source' => getPost('referralSource'),
    'suggestions_improvement' => getPost('improvementSuggestions'),
    'list_of_projects' => getPost('projectsList'),
    'list_of_certifications' => getPost('certList'),
    'submission_date' => getPost('submissionDate')
];

// Directories
$uploadBase = __DIR__ . '/uploads';
$dirs = [$uploadBase, "$uploadBase/photos", "$uploadBase/resumes", "$uploadBase/pdfs"];
foreach ($dirs as $d) {
    if (!is_dir($d)) mkdir($d, 0755, true);
}

// Uploads
$photoPath = '';
$photoDbPath = '';
if (isset($_FILES['photograph']) && $_FILES['photograph']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['photograph']['name'], PATHINFO_EXTENSION);
    $target = "$uploadBase/photos/" . time() . "_photo." . $ext;
    if (move_uploaded_file($_FILES['photograph']['tmp_name'], $target)) {
        $photoPath = $target;
        $photoDbPath = 'uploads/photos/' . basename($target);
    }
}
$resumeDbPath = '';
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
    $target = "$uploadBase/resumes/" . time() . "_resume." . $ext;
    if (move_uploaded_file($_FILES['resume']['tmp_name'], $target)) {
        $resumeDbPath = 'uploads/resumes/' . basename($target);
    }
}

// 3. DATABASE
$mysqli = new mysqli('localhost', 'root', '', 'byteforge');
if ($mysqli->connect_errno) json_exit(['status' => 'error', 'message' => 'DB Connect Error: ' . $mysqli->connect_error]);
$mysqli->set_charset('utf8mb4');

$dbFields = array_keys($data);
$dbCols = [];
$dbVals = [];
$ignoreKeys = ['tech_domains_arr', 'non_tech_domains_arr', 'design_tools_arr', 'video_tools_arr', 'learning_mode_arr', 'writing_skills_arr', 'content_plat_arr', 'collab_plat_arr'];

foreach ($data as $k => $v) {
    if (!in_array($k, $ignoreKeys)) {
        $dbCols[] = $k;
        $dbVals[] = $v;
    }
}
$dbCols[] = 'photograph_path';
$dbVals[] = $photoDbPath;
$dbCols[] = 'resume_path';
$dbVals[] = $resumeDbPath;

$colsSql = implode(',', $dbCols);
$placeholders = implode(',', array_fill(0, count($dbVals), '?'));
$stmt = $mysqli->prepare("INSERT INTO registration_forms ($colsSql) VALUES ($placeholders)");

if (!$stmt) json_exit(['status' => 'error', 'message' => 'DB Prepare Error: ' . $mysqli->error]);
$types = str_repeat('s', count($dbVals));
$stmt->bind_param($types, ...$dbVals);

if (!$stmt->execute()) json_exit(['status' => 'error', 'message' => 'DB Execute Error: ' . $stmt->error]);
$insert_id = $stmt->insert_id;
$stmt->close();
$mysqli->close();


// 4. PDF GENERATION
class ByteForgePDF extends TCPDF
{
    public function Header() {}
    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'ByteForge Club | Registration Form | Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, 0, 'C');
    }
    public function DrawBorder()
    {
        $this->Rect(5, 5, 200, 287, 'D');
    }
}

$pdfPath = '';
try {
    $pdf = new ByteForgePDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator('ByteForge');
    $pdf->SetTitle('Registration - ' . $data['full_name']);
    $pdf->SetMargins(15, 15, 15);
    $pdf->SetAutoPageBreak(TRUE, 15);
    $primaryColor = [37, 99, 235];

    function drawSection($pdf, $title, $pColor)
    {
        $pdf->Ln(6);
        $pdf->SetTextColorArray($pColor);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 8, strtoupper($title), 0, 1, 'L');
        $pdf->SetDrawColor(200, 200, 200);
        $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 180, $pdf->GetY());
        $pdf->Ln(2);
        $pdf->SetTextColor(0);
    }
    function drawField($pdf, $label, $value, $w = 60)
    {
        $pdf->SetFont('helvetica', 'B', 10);
        $xStart = $pdf->GetX();
        $yStart = $pdf->GetY();
        $pdf->MultiCell($w, 6, $label, 0, 'L', 0, 0);
        $pdf->SetXY($xStart + $w, $yStart);
        $pdf->SetFont('helvetica', '', 10);
        $val = ($value === '') ? ' ' : $value;
        $pdf->MultiCell(0, 6, $val, 0, 'L', 0, 1);
    }
    function drawFieldRes($pdf, $label, $value)
    {
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(45, 6, $label, 0, 0);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(100, 6, $value ? $value : ' ', 0, 1);
    }
    function drawCheckList($pdf, $options, $selectedArr)
    {
        $pdf->SetFont('helvetica', '', 9);
        $i = 0;
        foreach ($options as $opt) {
            $mark = in_array($opt, $selectedArr) ? '[ X ]' : '[   ]';
            $bold = in_array($opt, $selectedArr) ? 'B' : '';
            $pdf->SetFont('helvetica', $bold, 9);
            $pdf->Cell(5, 5, $mark, 0, 0);
            $pdf->Cell(55, 5, $opt, 0, 0);
            $i++;
            if ($i % 3 == 0) $pdf->Ln();
        }
        if ($i % 3 != 0) $pdf->Ln();
    }

    // PDF Pages Layout
    // Page 1
    $pdf->AddPage();
    $pdf->DrawBorder();
    $logoL = __DIR__ . '/assets/img/BFL.jpg';
    $logoR = __DIR__ . '/assets/img/rsmart.jpg';
    if (file_exists($logoL)) $pdf->Image($logoL, 10, 8, 20, 20);
    if (file_exists($logoR)) $pdf->Image($logoR, 150, 10, 50, 15);
    $pdf->SetY(10);
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->SetTextColorArray($primaryColor);
    $pdf->Cell(0, 8, 'BYTEFORGE CLUB', 0, 1, 'C');
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->SetTextColor(100);
    $pdf->Cell(0, 6, 'MEMBER REGISTRATION FORM', 0, 1, 'C');
    $pdf->SetTextColor(0);

    $pdf->SetDrawColor(0);
    $pdf->Rect(165, 45, 30, 35);
    if ($photoPath && file_exists($photoPath)) {
        $pdf->Image($photoPath, 165.5, 45.5, 29, 34, '', '', '', false, 300, '', false, false, 0, 'CM');
    } else {
        $pdf->SetXY(165, 55);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell(30, 10, 'PHOTO', 0, 0, 'C');
    }

    $pdf->SetY(40);
    drawSection($pdf, 'Personal Details', $primaryColor);
    drawFieldRes($pdf, 'Full Name:', $data['full_name']);
    drawFieldRes($pdf, 'Register Number:', $data['reg_number']);
    drawFieldRes($pdf, 'Dept / Year:', $data['department_year']);
    drawFieldRes($pdf, 'Batch:', $data['batch']);
    drawFieldRes($pdf, 'Email ID:', $data['email_id']);
    drawFieldRes($pdf, 'College Email:', $data['college_email_id']);
    drawFieldRes($pdf, 'Phone Number:', $data['phone_number']);
    drawFieldRes($pdf, 'Gender:', $data['gender']);

    $pdf->SetY(100);
    drawSection($pdf, 'Domain Interest', $primaryColor);
    drawField($pdf, 'Interested In:', $data['joining_role']);
    $pdf->Ln(2);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Technical Domains:', 0, 1);
    drawCheckList($pdf, ['Web Development', 'App Development', 'AI/ML', 'Data Science', 'IoT', 'DSA', 'Robotics', 'UI/UX', 'Cloud Computing', 'Cybersecurity', 'Blockchain'], $data['tech_domains_arr']);
    $pdf->Ln(2);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Non-Technical Domains:', 0, 1);
    drawCheckList($pdf, ['Video Editing', 'Photo Editing', 'Graphic Designing', 'Content Writing', 'Social Media', 'Event Management', 'Documentation', 'Hosting'], $data['non_tech_domains_arr']);

    drawSection($pdf, 'Technical Competency', $primaryColor);
    drawField($pdf, 'Languages:', $data['programming_languages']);
    drawField($pdf, 'Frameworks:', $data['frameworks_tools']);
    drawField($pdf, 'Proficiency:', $data['coding_proficiency']);
    drawField($pdf, 'Learning:', $data['currently_learning']);
    drawField($pdf, 'Open Source:', $data['open_source_contribution_link']);

    drawSection($pdf, 'Soft Skills', $primaryColor);
    drawField($pdf, 'Communication:', $data['communication_skill']);
    drawField($pdf, 'Leadership:', $data['leadership_skill']);
    drawField($pdf, 'Problem Solving:', $data['problem_solving_skill']);
    drawField($pdf, 'Time Mgmt:', $data['time_management_skill']);
    drawField($pdf, 'Teamwork:', $data['teamwork_adaptability']);
    drawField($pdf, 'Languages:', $data['languages_known']);
    drawField($pdf, 'Strengths:', $data['strengths_unique_qualities']);

    // Page 2
    $pdf->AddPage();
    $pdf->DrawBorder();
    
    drawSection($pdf, 'Technical Exposure', $primaryColor);
    drawField($pdf, 'OS Familiarity:', $data['operating_systems']);
    drawField($pdf, 'IDE:', $data['preferred_ide']);
    drawField($pdf, 'Git Knowledge:', $data['git_familiarity']);
    drawField($pdf, 'Databases:', $data['database_experience']);
    drawField($pdf, 'Backend/API:', $data['api_backend_frameworks']);
    drawField($pdf, 'Hosting Exp:', $data['hosting_experience']);
    drawField($pdf, 'Hosting Details:', $data['hosting_platform_details']);

    drawSection($pdf, 'Non-Technical Skills', $primaryColor);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Design Tools:', 0, 1);
    drawCheckList($pdf, ['Photoshop', 'Illustrator', 'Figma', 'Canva'], $data['design_tools_arr']);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Video Tools:', 0, 1);
    drawCheckList($pdf, ['Premiere Pro', 'DaVinci', 'CapCut', 'VN'], $data['video_tools_arr']);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Content Platforms:', 0, 1);
    drawCheckList($pdf, ['YouTube', 'Instagram', 'Canva', 'CapCut'], $data['content_plat_arr']);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Writing Skills:', 0, 1);
    drawCheckList($pdf, ['Technical Writing', 'Copywriting', 'Scriptwriting', 'Blog Writing'], $data['writing_skills_arr']);
    drawField($pdf, 'Public Speaking:', $data['public_speaking_confidence']);
    drawField($pdf, 'Anchoring Exp:', $data['anchoring_experience']);
    drawField($pdf, 'Anchoring Details:', $data['anchoring_event_details']);

    drawSection($pdf, 'Innovation & Leadership', $primaryColor);
    drawField($pdf, 'Led Team?:', $data['led_team_project']);
    drawField($pdf, 'Role Details:', $data['leadership_role_details']);
    drawField($pdf, 'Mentored Peers?:', $data['mentored_peers']);
    drawField($pdf, 'Lead Interest?:', $data['interest_in_leadership']);
    $pdf->Ln(2);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Innovative Ideas:', 0, 1);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->MultiCell(0, 5, $data['innovative_ideas_products'] ? $data['innovative_ideas_products'] : ' ');

    drawSection($pdf, 'Learning Interests', $primaryColor);
    drawField($pdf, 'Domains to Learn:', $data['domains_to_learn_this_year']);
    drawField($pdf, 'Workshop Topics:', $data['workshop_technologies_requested']);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Preferred Mode:', 0, 1);
    drawCheckList($pdf, ['Workshops', 'Projects', 'Hackathons', 'Peer Learning'], $data['learning_mode_arr']);

    // Page 3
    $pdf->AddPage();
    $pdf->DrawBorder();

    drawSection($pdf, 'Networking & Collaboration', $primaryColor);
    drawField($pdf, 'Team Comfort:', $data['comfortable_in_teams']);
    drawField($pdf, 'Cross-Dept Collab:', $data['cross_dept_collaboration_interest']);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(40, 6, 'Platforms:', 0, 0);
    $pdf->SetFont('helvetica', '', 9);
    $pdf->Cell(0, 6, $data['collaboration_platforms'], 0, 1);

    drawSection($pdf, 'Online Profiles', $primaryColor);
    drawField($pdf, 'GitHub:', $data['github_link']);
    drawField($pdf, 'LinkedIn:', $data['linkedin_link']);
    drawField($pdf, 'Portfolio:', $data['portfolio_website']);

    drawSection($pdf, 'Member Perspective', $primaryColor);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, '1. Why Join?', 0, 1);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->MultiCell(0, 5, $data['reason_for_joining'] ? $data['reason_for_joining'] : ' ', 0, 'L');
    $pdf->Ln(2);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, '2. Contribution:', 0, 1);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->MultiCell(0, 5, $data['contribution_skills'] ? $data['contribution_skills'] : ' ', 0, 'L');
    $pdf->Ln(2);
    drawField($pdf, '3. Event Org Interest:', $data['interest_in_organizing']);

  
    drawSection($pdf, 'Academic & Experience', $primaryColor);
    drawField($pdf, 'Hackathons:', $data['hackathon_participation']);
    drawField($pdf, 'Hackathon Details:', $data['hackathon_details']);
    drawField($pdf, 'Other Clubs:', $data['other_clubs']);
    $pdf->Ln(4);
    $pdf->SetFillColor(240);
    $pdf->Cell(45, 7, 'Semester', 1, 0, 'C', 1);
    $pdf->Cell(45, 7, 'Attendance %', 1, 0, 'C', 1);
    $pdf->Cell(45, 7, 'CGPA', 1, 0, 'C', 1);
    $pdf->Cell(45, 7, 'Arrears', 1, 1, 'C', 1);
    $pdf->Cell(45, 7, $data['current_semester'] ? $data['current_semester'] : ' ', 1, 0, 'C');
    $pdf->Cell(45, 7, $data['attendance_percentage'] ? $data['attendance_percentage'] : ' ', 1, 0, 'C');
    $pdf->Cell(45, 7, $data['current_cgpa'] ? $data['current_cgpa'] : ' ', 1, 0, 'C');
    $pdf->Cell(45, 7, $data['number_of_arrears'] ? $data['number_of_arrears'] : ' ', 1, 1, 'C');
    $pdf->Ln(4);
    drawField($pdf, 'Projects Count:', $data['projects_completed_count']);
    drawField($pdf, 'Certs Count:', $data['certifications_completed_count']);
    drawField($pdf, 'Tech Expertise:', $data['areas_of_technical_expertise']);
    drawField($pdf, 'Open Source Exp:', $data['open_source_experience']);
    drawField($pdf, 'Open Source Det:', $data['open_source_details']);
    $pdf->Ln(2);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 6, 'Internship / Industrial Exp:', 0, 1);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->MultiCell(0, 5, $data['internship_industrial_experience'] ? $data['internship_industrial_experience'] : ' ');
    drawSection($pdf, 'Goals & Achievements', $primaryColor);
    drawField($pdf, 'Short Term:', $data['short_term_goal']);
    drawField($pdf, 'Long Term:', $data['long_term_goal']);
    drawField($pdf, 'Mentor Juniors:', $data['mentor_juniors_interest']);
    drawField($pdf, 'Awards (Tech):', $data['awards_technical']);
    drawField($pdf, 'Awards (Non-Tech):', $data['awards_non_technical']);
    drawField($pdf, 'Publications:', $data['publications_research']);

    // Page 5
    $pdf->AddPage();
    $pdf->DrawBorder();
    drawSection($pdf, 'Lists', $primaryColor);
    $pdf->SetFont('helvetica', 'B', 11);
    $pdf->Cell(90, 8, 'Projects', 1, 0, 'C', 1);
    $pdf->Cell(5, 8, '', 0, 0);
    $pdf->Cell(90, 8, 'Certifications', 1, 1, 'C', 1);
    $pdf->SetFont('helvetica', '', 9);
    $pdf->MultiCell(90, 80, $data['list_of_projects'] ? $data['list_of_projects'] : ' ', 1, 'L', 0, 0);
    $pdf->Cell(5, 80, '', 0, 0);
    $pdf->MultiCell(90, 80, $data['list_of_certifications'] ? $data['list_of_certifications'] : ' ', 1, 'L', 0, 1);
    drawSection($pdf, 'Feedback', $primaryColor);
    drawField($pdf, 'Referral Source:', $data['referral_source']);
    drawField($pdf, 'Requested Acts:', $data['requested_activities']);
    drawField($pdf, 'Suggestions:', $data['suggestions_improvement']);
    $pdf->Ln(10);
    $pdf->SetFillColor(245, 245, 255);
    $pdf->SetDrawColor(37, 99, 235);
    $pdf->Rect($pdf->GetX(), $pdf->GetY(), 180, 40, 'DF');
    $pdf->SetXY($pdf->GetX() + 5, $pdf->GetY() + 5);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->SetTextColorArray($primaryColor);
    $pdf->Cell(0, 8, 'DECLARATION', 0, 1);
    $pdf->SetTextColor(0);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->MultiCell(170, 5, "I hereby declare that the information provided above is true and accurate. I agree to actively participate in club activities.");
    $pdf->Ln(20);
    $pdf->SetDrawColor(0);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(90, 8, 'Date: ' . ($data['submission_date'] ? $data['submission_date'] : date('Y-m-d')), 0, 0);
    $pdf->Cell(90, 8, 'Signature', 'T', 1, 'C');

    $pdf->Ln(30); // Add spacing before signatures
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->SetDrawColor(0);

    // Column width for 3 equal sections
    $colWidth = 63.5;

    // 1) Draw the TOP LINES (above signatures)
    $pdf->Cell($colWidth, 8, '', 'T', 0, 'C');  // Tutor line
    $pdf->Cell($colWidth, 8, '', 'T', 0, 'C');  // HoD line
    $pdf->Cell($colWidth, 8, '', 'T', 1, 'C');  // Dean line (end row)

    // Add spacing between line and label
    $pdf->Ln(2);

    // 2) Signature LABELS perfectly aligned
    $pdf->Cell($colWidth, 6, 'Tutor Sign', 0, 0, 'C');
    $pdf->Cell($colWidth, 6, 'HoD Sign', 0, 0, 'C');
    $pdf->Cell($colWidth, 6, 'Dean Sign', 0, 1, 'C');
    
    $safeName = preg_replace('/[^a-zA-Z0-9]/', '', $data['full_name']);
    $safeReg = preg_replace('/[^a-zA-Z0-9]/', '', $data['reg_number']);
    if (!$safeName) $safeName = "Unknown";
    if (!$safeReg) $safeReg = time();
    $fileName = "{$safeName}_{$safeReg}.pdf";
    $pdfPath = __DIR__ . "/uploads/pdfs/$fileName";
    $pdf->Output($pdfPath, 'F');
} catch (Exception $e) {
    json_exit(['status' => 'error', 'message' => 'PDF Error: ' . $e->getMessage()]);
}

// 5. EMAIL
$mailStatus = 'skipped';
$mailError = '';

if ($hasPHPMailer && file_exists($pdfPath)) {
    try {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        // ---------------------------------------------
        // USE ENV VARIABLES OR FALLBACK TO 587/TLS
        // ---------------------------------------------
        $mail->Host       = $_ENV['SMTP_HOST'] ?? 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USER']; // MUST be in .env
        $mail->Password   = $_ENV['SMTP_PASS']; // MUST be in .env

        // Force TLS/587 if not set, as it handles blocks better
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'] ?? 'tls';
        $mail->Port       = $_ENV['SMTP_PORT'] ?? 587;

        $mail->setFrom($mail->Username, 'ByteForge Club');
        $mail->addAddress($data['email_id'], $data['full_name']);
        $mail->isHTML(true);
        $mail->Subject = 'Registration Successful - ByteForge Club';
        $mail->Body    = "Dear <b>{$data['full_name']}</b>,<br><br>Thank you for registering!<br>Attached is your official registration form.<br><br>Regards,<br><b>ByteForge Team</b>";

        $mail->addAttachment($pdfPath);
        $mail->send();
        $mailStatus = 'sent';
    } catch (Exception $e) {
        $mailStatus = 'failed';
        $mailError = $mail->ErrorInfo;
    }
}

// 6. RESPONSE
json_exit([
    'status' => 'success',
    'insert_id' => $insert_id,
    'pdf_url' => 'uploads/pdfs/' . basename($pdfPath),
    'mail_status' => $mailStatus,
    'mail_error' => $mailError
]);
