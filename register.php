<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>ByteForge Club - Member Registration Form</title>
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">

    <style>
        :root {
            /* BRAND COLORS (Based on ByteForge Logo) */
            --primary-color: #1FA0B5;
            /* Teal core brand */
            --primary-hover: #17879A;
            /* Darker teal */
            --primary-active: #0E6B7A;
            /* Strong pressed teal */

            --accent-purple: #7A1ED8;
            /* ByteForge Purple Accent */
            --accent-blue: #243A8F;
            /* ByteForge Indigo */

            --success-color: #10b981;
            --error-color: #ef4444;
            --warning-color: #f59e0b;

            /* LIGHT MODE BACKGROUND (Logo has light canvas) */
            --bg-color: #F4F6F9;
            /* Matches logo background */
            --surface-color: #ffffff;

            /* TEXT COLORS */
            --text-primary: #1e293b;
            --text-secondary: #64748b;

            /* BORDERS + FOCUS */
            --border-color: #d8e0ea;
            --focus-ring: rgba(31, 160, 181, 0.35);
            /* tinted teal glow */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-primary);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: var(--surface-color);
            padding: 40px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        /* ======================== HEADER ======================== */

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid var(--primary-color);
            padding-bottom: 20px;
        }

        .header h1 {
            color: var(--accent-blue);
            /* Blue from logo */
            font-size: 28px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .header h3 {
            font-size: 16px;
            color: var(--accent-purple);
            margin-bottom: 5px;
            font-weight: 600;
        }

        .header p {
            color: var(--text-secondary);
            font-size: 14px;
            font-style: italic;
        }

        /* ======================== FORM SECTIONS ======================== */

        .form-section {
            margin-bottom: 35px;
            padding-bottom: 20px;
            border-bottom: 1px dashed var(--border-color);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ======================== GRID SYSTEM ======================== */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        .form-row.three-col {
            grid-template-columns: repeat(3, 1fr);
        }

        /* ======================== INPUTS ======================== */

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-primary);
            font-size: 14px;
        }

        label.required::after {
            content: " *";
            color: var(--error-color);
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        textarea,
        select {
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            background: #f9fafb;
            transition: all 0.25s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            background: #fff;
            box-shadow: 0 0 0 3px var(--focus-ring);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* ======================== CHECKBOX + RADIO ======================== */

        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .checkbox-item,
        .radio-item {
            display: flex;
            gap: 8px;
            align-items: center;
            cursor: pointer;
        }

        .checkbox-item input,
        .radio-item input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
        }

        .checkbox-label {
            font-size: 14px;
            cursor: pointer;
            user-select: none;
        }

        /* ======================== BUTTONS ======================== */

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
        }

        button {
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-submit {
            background-color: var(--primary-color);
            color: #fff;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(31, 160, 181, 0.35);
        }

        .btn-reset {
            background: #e2e8f0;
            color: var(--text-primary);
        }

        /* ======================== DECLARATION BOX ======================== */

        .declaration {
            background: #e8faff;
            border-left: 4px solid var(--primary-color);
            padding: 18px;
            border-radius: 6px;
        }

        .declaration-text {
            font-size: 13px;
            color: var(--text-primary);
            margin-bottom: 12px;
            line-height: 1.6;
            text-align: justify;
        }

        /* ======================== PHOTO PREVIEW ======================== */

        .photo-preview img {
            max-width: 150px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 5px;
        }

        /* ======================== MESSAGES ======================== */

        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid var(--success-color);
            display: none;
        }

        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid var(--error-color);
            display: none;
        }

        /* ======================== RESPONSIVE ======================== */

        @media (max-width:768px) {
            .container {
                padding: 20px;
            }

            .form-row,
            .form-row.three-col,
            .rating-grid {
                grid-template-columns: 1fr;
            }

            .checkbox-grid {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }
        }

        /* BYTEFORGE ANCHOR BUTTON (matches Submit Registration style) */
        /* Center wrapper */
        .center-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Long ByteForge anchor button */
        .btn-link-primary.long {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 720px;
            /* Adjust this width to match the Submit + Reset row */
            padding: 14px 20px;

            background: linear-gradient(135deg, #1FA0B5, #17879A, #1FA0B5);
            background-size: 200% 200%;
            color: #ffffff;

            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;

            box-shadow:
                0 4px 14px rgba(31, 160, 181, 0.3),
                0 1px 4px rgba(0, 0, 0, 0.08);

            transition: all 0.35s ease;
        }

        .btn-link-primary.long:hover {
            background-position: 100% 0%;
            transform: translateY(-3px);
            box-shadow:
                0 8px 22px rgba(31, 160, 181, 0.4),
                0 12px 30px rgba(122, 30, 216, 0.25);
        }

        .btn-link-primary.long:active {
            transform: scale(0.97);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <h3>RAISE SMART | RATHINAM</h3>
            <h1>ByteForge Club</h1>
            <h3>MEMBER REGISTRATION FORM</h3>
            <p>"Forging every byte of code to creation"</p>
        </div>

        <div id="successMessage" class="success-message">✓ Form submitted successfully! We'll be in touch soon.</div>
        <div id="errorMessage" class="error-message"></div>

        <form id="registrationForm" method="POST" enctype="multipart/form-data">

            <div class="form-section">
                <h2 class="section-title">👤 Personal Details</h2>

                <div class="form-row">
                    <div class="form-group">
                        <label for="fullName" class="required">Full Name</label>
                        <input type="text" id="fullName" name="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="regNumber" class="required">Register Number</label>
                        <input type="text" id="regNumber" name="regNumber" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="department" class="required">Department / Year</label>
                        <input type="text" id="department" name="department" placeholder="e.g. CSE / II Year" required>
                    </div>
                    <div class="form-group">
                        <label for="batch" class="required">Batch</label>
                        <input type="text" id="batch" name="batch" placeholder="e.g. 2023-2027" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="emailId" class="required">Email ID</label>
                        <input type="email" id="emailId" name="emailId" required>
                    </div>
                    <div class="form-group">
                        <label for="collegeEmail" class="required">College Mail ID</label>
                        <input type="email" id="collegeEmail" name="collegeEmail" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="phone" class="required">Phone Number</label>
                        <input type="text" id="phone" name="phone" placeholder="+91 XXXXXXXXXX" required>
                    </div>
                    <div class="form-group">
                        <label class="required">Gender</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" id="male" name="gender" value="Male" required><label for="male" class="checkbox-label">Male</label></div>
                            <div class="radio-item"><input type="radio" id="female" name="gender" value="Female"><label for="female" class="checkbox-label">Female</label></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🎯 Domain Interest</h2>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="required">Interested in Joining As:</label>
                    <div class="radio-group">
                        <div class="radio-item"><input type="radio" id="roleTechnical" name="joiningRole" value="Technical" required><label for="roleTechnical" class="checkbox-label">Technical</label></div>
                        <div class="radio-item"><input type="radio" id="roleNonTechnical" name="joiningRole" value="Non-Technical"><label for="roleNonTechnical" class="checkbox-label">Non-Technical</label></div>
                    </div>
                </div>

                <div class="sector-label">Technical Domains</div>

                <label style="margin-top: 10px; display:block; color: var(--primary-color);">Sector 1: Core Development & Innovation</label>
                <div class="checkbox-grid">
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="Web Development"><label class="checkbox-label">Web Development</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="App Development"><label class="checkbox-label">App Development</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="AI/ML"><label class="checkbox-label">Artificial Intelligence / Machine Learning</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="Data Science"><label class="checkbox-label">Data Science / Data Analytics</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="IoT"><label class="checkbox-label">Internet of Things (IoT)</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="DSA"><label class="checkbox-label">Competitive Programming / DSA</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="Robotics"><label class="checkbox-label">Robotics & Automation</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="UI/UX"><label class="checkbox-label">UI/UX Design</label></div>
                </div>

                <label style="margin-top: 20px; display:block; color: var(--primary-color);">Sector 2: Advanced Technology & Security</label>
                <div class="checkbox-grid">
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="Cloud Computing"><label class="checkbox-label">Cloud Computing</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="Cybersecurity"><label class="checkbox-label">Cybersecurity / Ethical Hacking</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="techDomains[]" value="Blockchain"><label class="checkbox-label">Blockchain</label></div>
                </div>

                <div class="sector-label" style="margin-top: 30px;">Non-Technical Domains</div>
                <div class="checkbox-grid">
                    <div class="checkbox-item"><input type="checkbox" name="nonTechDomains[]" value="Video Editing"><label class="checkbox-label">Video Editing</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="nonTechDomains[]" value="Photo Editing"><label class="checkbox-label">Photo Editing</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="nonTechDomains[]" value="Graphic Designing"><label class="checkbox-label">Graphic Designing</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="nonTechDomains[]" value="Content Writing"><label class="checkbox-label">Content Writing / Creation</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="nonTechDomains[]" value="Social Media"><label class="checkbox-label">Social Media Management</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="nonTechDomains[]" value="Event Management"><label class="checkbox-label">Event Management</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="nonTechDomains[]" value="Documentation"><label class="checkbox-label">Documentation & Reporting</label></div>
                    <div class="checkbox-item"><input type="checkbox" name="nonTechDomains[]" value="Hosting"><label class="checkbox-label">Hosting/Anchoring</label></div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">💻 Technical Competency</h2>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Programming Languages Known:</label>
                        <input type="text" name="progLanguages" placeholder="e.g. C++, Java, Python">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Frameworks / Tools Familiar With:</label>
                        <input type="text" name="frameworks" placeholder="e.g. React, Django, Git">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Level of Coding Proficiency:</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="proficiency" value="Beginner"><label class="checkbox-label">Beginner</label></div>
                            <div class="radio-item"><input type="radio" name="proficiency" value="Intermediate"><label class="checkbox-label">Intermediate</label></div>
                            <div class="radio-item"><input type="radio" name="proficiency" value="Advanced"><label class="checkbox-label">Advanced</label></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Currently Learning / Exploring:</label>
                        <input type="text" name="currentlyLearning">
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Contributions to Open Source Projects (if any):</label>
                        <input type="text" name="openSourceContrib" placeholder="Link or Description">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🧠 Soft Skills & Personal Attributes</h2>

                <div class="form-group">
                    <label>Communication Skill:</label>
                    <div class="radio-group">
                        <div class="radio-item"><input type="radio" name="commSkill" value="Excellent"><label>Excellent</label></div>
                        <div class="radio-item"><input type="radio" name="commSkill" value="Good"><label>Good</label></div>
                        <div class="radio-item"><input type="radio" name="commSkill" value="Needs Improvement"><label>Needs Improvement</label></div>
                    </div>
                </div>
                <br>
                <div class="form-row three-col">
                    <div class="form-group">
                        <label>Leadership Skill:</label>
                        <select name="leadershipSkill">
                            <option value="">Select...</option>
                            <option value="Strong">Strong</option>
                            <option value="Moderate">Moderate</option>
                            <option value="Developing">Developing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Problem-Solving:</label>
                        <select name="problemSolving">
                            <option value="">Select...</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Good">Good</option>
                            <option value="Basic">Basic</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Time Management:</label>
                        <select name="timeMgmt">
                            <option value="">Select...</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                        </select>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Adaptability / Teamwork:</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="teamwork" value="Excellent"><label>Excellent</label></div>
                            <div class="radio-item"><input type="radio" name="teamwork" value="Good"><label>Good</label></div>
                            <div class="radio-item"><input type="radio" name="teamwork" value="Average"><label>Average</label></div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Languages Known:</label>
                        <input type="text" name="languagesKnown" placeholder="e.g. English, Tamil, Hindi">
                    </div>
                    <div class="form-group">
                        <label>Strengths or Unique Qualities:</label>
                        <input type="text" name="strengths">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🛠️ Technical Exposure & Tools</h2>

                <div class="form-group">
                    <label>Operating Systems Comfortable With:</label>
                    <div class="checkbox-grid">
                        <div class="checkbox-item"><input type="checkbox" name="os[]" value="Windows"><label>Windows</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="os[]" value="Linux"><label>Linux</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="os[]" value="macOS"><label>macOS</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="os[]" value="Others"><label>Others</label></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Preferred Code Editor / IDE:</label>
                        <input type="text" name="ide">
                    </div>
                    <div class="form-group">
                        <label>Version Control Familiarity (Git/GitHub):</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="gitFamiliarity" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="gitFamiliarity" value="No"><label>No</label></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Database Experience:</label>
                    <div class="checkbox-grid">
                        <div class="checkbox-item"><input type="checkbox" name="db[]" value="MySQL"><label>MySQL</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="db[]" value="MongoDB"><label>MongoDB</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="db[]" value="PostgreSQL"><label>PostgreSQL</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="db[]" value="Firebase"><label>Firebase</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="db[]" value="Others"><label>Others</label></div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>API or Backend Frameworks Known:</label>
                        <input type="text" name="apiFrameworks">
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Experience in Hosting / Deployment:</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="hostingExp" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="hostingExp" value="No"><label>No</label></div>
                        </div>
                        <div id="hostingDetails" class="conditional-input">
                            <label>If yes, mention platform:</label>
                            <input type="text" name="hostingPlatform">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🎨 Non-Technical Skills Tools</h2>

                <div class="form-group">
                    <label>Content Creation Platforms Used:</label>
                    <div class="checkbox-grid">
                        <div class="checkbox-item"><input type="checkbox" name="contentPlat[]" value="YouTube"><label>YouTube</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="contentPlat[]" value="Instagram"><label>Instagram</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="contentPlat[]" value="Canva"><label>Canva</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="contentPlat[]" value="CapCut"><label>CapCut</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="contentPlat[]" value="Others"><label>Others</label></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Design Tools Used:</label>
                    <div class="checkbox-grid">
                        <div class="checkbox-item"><input type="checkbox" name="designTools[]" value="Photoshop"><label>Photoshop</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="designTools[]" value="Illustrator"><label>Illustrator</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="designTools[]" value="Figma"><label>Figma</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="designTools[]" value="Canva"><label>Canva</label></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Video Editing Tools Used:</label>
                    <div class="checkbox-grid">
                        <div class="checkbox-item"><input type="checkbox" name="videoTools[]" value="Premiere Pro"><label>Premiere Pro</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="videoTools[]" value="DaVinci Resolve"><label>DaVinci Resolve</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="videoTools[]" value="CapCut"><label>CapCut</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="videoTools[]" value="VN"><label>VN</label></div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Public Speaking Confidence:</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="publicSpeaking" value="Excellent"><label>Excellent</label></div>
                            <div class="radio-item"><input type="radio" name="publicSpeaking" value="Good"><label>Good</label></div>
                            <div class="radio-item"><input type="radio" name="publicSpeaking" value="Moderate"><label>Moderate</label></div>
                            <div class="radio-item"><input type="radio" name="publicSpeaking" value="Needs Practice"><label>Needs Practice</label></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Writing Skills:</label>
                    <div class="checkbox-grid">
                        <div class="checkbox-item"><input type="checkbox" name="writingSkills[]" value="Technical Writing"><label>Technical Writing</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="writingSkills[]" value="Copywriting"><label>Copywriting</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="writingSkills[]" value="Scriptwriting"><label>Scriptwriting</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="writingSkills[]" value="Blog Writing"><label>Blog Writing</label></div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Presentation / Anchoring Experience:</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="anchoringExp" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="anchoringExp" value="No"><label>No</label></div>
                        </div>
                        <div id="anchoringDetails" class="conditional-input">
                            <label>If yes, specify events:</label>
                            <input type="text" name="anchoringEvents">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🚀 Innovation & Leadership</h2>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Have you ever led a project or team?</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="ledTeam" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="ledTeam" value="No"><label>No</label></div>
                        </div>
                        <div id="leadershipRole" class="conditional-input">
                            <label>If yes, mention role:</label>
                            <input type="text" name="leadershipRoleDetail">
                        </div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Have you mentored or helped peers in technical tasks?</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="mentoredPeers" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="mentoredPeers" value="No"><label>No</label></div>
                        </div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Any innovative ideas or products you've developed?</label>
                        <textarea name="innovativeIdeas"></textarea>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Interest in taking leadership positions in ByteForge?</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="leadershipInterest" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="leadershipInterest" value="No"><label>No</label></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">📚 Learning Interests</h2>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Domains You Wish to Learn This Year:</label>
                        <input type="text" name="domainsToLearn">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Technologies You Want the Club to Organize Workshops On:</label>
                        <input type="text" name="workshopTopics">
                    </div>
                </div>

                <div class="form-group">
                    <label>Preferred Mode of Learning:</label>
                    <div class="checkbox-grid">
                        <div class="checkbox-item"><input type="checkbox" name="learningMode[]" value="Practical Workshops"><label>Practical Workshops</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="learningMode[]" value="Projects"><label>Projects</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="learningMode[]" value="Hackathons"><label>Hackathons</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="learningMode[]" value="Peer Learning"><label>Peer Learning</label></div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🤝 Networking & Collaboration</h2>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Comfortable Working in Teams:</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="teamComfort" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="teamComfort" value="No"><label>No</label></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Collaboration Platforms Used:</label>
                    <div class="checkbox-grid">
                        <div class="checkbox-item"><input type="checkbox" name="collabPlat[]" value="Slack"><label>Slack</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="collabPlat[]" value="Discord"><label>Discord</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="collabPlat[]" value="Notion"><label>Notion</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="collabPlat[]" value="Trello"><label>Trello</label></div>
                        <div class="checkbox-item"><input type="checkbox" name="collabPlat[]" value="GitHub Projects"><label>GitHub Projects</label></div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Interest in Cross-Department Collaboration:</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="crossDeptCollab" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="crossDeptCollab" value="No"><label>No</label></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🌐 Online & Professional Profiles</h2>
                <div class="form-row full">
                    <div class="form-group">
                        <label for="github">GitHub Profile Link</label>
                        <input type="text" id="github" name="github" placeholder="https://github.com/username">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label for="linkedin">LinkedIn Profile Link</label>
                        <input type="text" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/username">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label for="portfolio">Portfolio / Personal Website (if any)</label>
                        <input type="text" id="portfolio" name="portfolio" placeholder="https://yourportfolio.com">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">💡 Member Perspective</h2>
                <div class="form-row full">
                    <div class="form-group">
                        <label for="whyJoin" class="required">1. Why do you want to join the ByteForge Club?</label>
                        <textarea id="whyJoin" name="whyJoin" required></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label for="contribute" class="required">2. What skills or experiences can you contribute to the club?</label>
                        <textarea id="contribute" name="contribute" required></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label class="required">3. Are you interested in leading or organizing future events/workshops?</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="organizeInterest" value="Yes" required><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="organizeInterest" value="No"><label>No</label></div>
                            <div class="radio-item"><input type="radio" name="organizeInterest" value="Maybe"><label>Maybe</label></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🎓 Academic & Additional Info</h2>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Have you participated in any hackathons / tech events?</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="hackathonExp" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="hackathonExp" value="No"><label>No</label></div>
                        </div>
                        <div id="hackathonDetails" class="conditional-input">
                            <label>If yes, please specify:</label>
                            <input type="text" name="hackathonDetails">
                        </div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Any other clubs or committees you're part of:</label>
                        <input type="text" name="otherClubs">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Current Semester</label>
                        <input type="text" name="semester">
                    </div>
                    <div class="form-group">
                        <label>Attendance (%) as on Date</label>
                        <input type="number" name="attendance" step="0.1" min="0" max="100">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Current Semester CGPA</label>
                        <input type="number" name="cgpa" step="0.01" min="0" max="10">
                    </div>
                    <div class="form-group">
                        <label>Number of Arrears (if any)</label>
                        <input type="number" name="arrears" min="0">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">📊 Skill Overview & Experience</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label>Number of Projects Completed:</label>
                        <input type="number" name="projCount" min="0">
                    </div>
                    <div class="form-group">
                        <label>Number of Certifications Completed:</label>
                        <input type="number" name="certCount" min="0">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Areas of Technical Expertise:</label>
                        <input type="text" name="areasOfExpertise">
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Have you contributed to any open-source projects?</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="openSourceExp" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="openSourceExp" value="No"><label>No</label></div>
                        </div>
                        <div id="openSourceDetails" class="conditional-input">
                            <label>If yes, mention repository/project name:</label>
                            <input type="text" name="openSourceDetails">
                        </div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Internship / Industrial Experience (if any):</label>
                        <textarea name="internshipExp"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">🏆 Goals & Achievements</h2>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Your Short-Term Goal in the Tech/Creative Field:</label>
                        <textarea name="shortTermGoal"></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Your Long-Term Career Goal:</label>
                        <textarea name="longTermGoal"></textarea>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Would you like to mentor or assist juniors in future events?</label>
                        <div class="radio-group">
                            <div class="radio-item"><input type="radio" name="mentorJuniors" value="Yes"><label>Yes</label></div>
                            <div class="radio-item"><input type="radio" name="mentorJuniors" value="No"><label>No</label></div>
                        </div>
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label>Awards / Achievements in Technical Events:</label>
                        <textarea name="techAwards"></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Recognition in Non-Technical Fields:</label>
                        <textarea name="nonTechAwards"></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Publications / Blogs / Research Papers (if any):</label>
                        <textarea name="publications"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">📣 Feedback for Club Activities</h2>

                <div class="form-row full">
                    <div class="form-group">
                        <label>What kind of activities would you like ByteForge to conduct?</label>
                        <textarea name="activitySuggestions"></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>How did you hear about ByteForge?</label>
                        <input type="text" name="referralSource">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Suggestions for improving the club:</label>
                        <textarea name="improvementSuggestions"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">📝 Project & Certification Lists</h2>
                <div class="form-row full">
                    <div class="form-group">
                        <label>List of Projects Done:</label>
                        <textarea name="projectsList" placeholder="Project Name - Description"></textarea>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>List of Certifications Completed:</label>
                        <textarea name="certList" placeholder="Certification Name - Organization"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">📂 Uploads</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="photograph" class="required">Passport Size Photograph</label>
                        <input type="file" id="photograph" name="photograph" accept="image/*" required>
                        <p class="info-text">Upload JPG/PNG - Max 5MB</p>
                        <div id="photoPreview" class="photo-preview"></div>
                    </div>
                    <div class="form-group">
                        <label for="resume" class="required">Resume / CV </label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx">
                        <p class="info-text">Upload PDF/DOC - Max 10MB</p>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="declaration">
                    <h3 style="margin-bottom:10px; color:var(--primary-color);">Declaration</h3>
                    <p class="declaration-text">
                        I hereby declare that the information provided above is true and accurate to the best of my knowledge.
                        I agree to actively participate in club activities and contribute to the growth of ByteForge.
                    </p>
                    <div class="form-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="declaration" name="declaration" required>
                            <label for="declaration" class="checkbox-label">I agree to the declaration</label>
                        </div>
                    </div>

                    <div class="form-row" style="margin-top:20px;">
                        <div class="form-group">
                            <label for="submissionDate" class="required">Date</label>
                            <input type="date" id="submissionDate" name="submissionDate" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-submit">📤 Submit Registration</button>
                <button type="reset" class="btn-reset">🔄 Reset Form</button>
            </div>
            <div class="center-container">
                <a href="index.php" class="btn-link-primary long"> Back to Home Page 🏡 </a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. CACHED ELEMENTS
            const form = document.getElementById('registrationForm');
            const submitBtn = document.querySelector('.btn-submit'); // Ensure your button has this class
            const successMsg = document.getElementById('successMessage');
            const errorMsg = document.getElementById('errorMessage');
            const photoInput = document.getElementById('photograph');
            const photoPreview = document.getElementById('photoPreview');
            const resumeInput = document.getElementById('resume');

            // 2. HELPER FUNCTIONS
            function showError(text) {
                if (errorMsg) {
                    errorMsg.style.display = 'block';
                    errorMsg.textContent = text;
                } else {
                    alert(text); // Fallback if div missing
                }
                if (successMsg) successMsg.style.display = 'none';
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            function hideError() {
                if (errorMsg) {
                    errorMsg.style.display = 'none';
                    errorMsg.textContent = '';
                }
            }

            // 3. FILE VALIDATION (Photo Max 5MB)
            if (photoInput) {
                photoInput.addEventListener('change', e => {
                    const f = e.target.files[0];
                    if (photoPreview) photoPreview.innerHTML = '';
                    if (!f) return;

                    const sizeMB = f.size / 1024 / 1024;
                    if (sizeMB > 5) {
                        showError('⚠️ Photo file size must be less than 5MB');
                        photoInput.value = '';
                        return;
                    }
                    hideError();

                    // Preview
                    if (photoPreview) {
                        const reader = new FileReader();
                        reader.onload = () => {
                            photoPreview.innerHTML = `<img src="${reader.result}" alt="Preview" style="max-width:150px; border-radius:8px;">`;
                        };
                        reader.readAsDataURL(f);
                    }
                });
            }

            // 4. RESUME VALIDATION (Max 10MB)
            if (resumeInput) {
                resumeInput.addEventListener('change', e => {
                    const f = e.target.files[0];
                    if (!f) return;
                    if ((f.size / 1024 / 1024) > 10) {
                        showError('⚠️ Resume file size must be less than 10MB');
                        resumeInput.value = '';
                    } else {
                        hideError();
                    }
                });
            }

            // 5. TOGGLE VISIBILITY ("If yes, specify")
            function toggleVisibility(radioName, detailsId) {
                const radios = document.querySelectorAll(`input[name="${radioName}"]`);
                const detailsDiv = document.getElementById(detailsId);

                if (!detailsDiv) return;

                function update() {
                    const checked = document.querySelector(`input[name="${radioName}"]:checked`);
                    if (checked && checked.value === 'Yes') {
                        detailsDiv.style.display = 'block';
                    } else {
                        detailsDiv.style.display = 'none';
                        // Clear inputs inside so we don't submit hidden data
                        detailsDiv.querySelectorAll('input, textarea').forEach(i => i.value = '');
                    }
                }
                radios.forEach(r => r.addEventListener('change', update));
                update(); // Run on init
            }

            // Initialize Toggles (Ensure IDs match your HTML)
            toggleVisibility('hostingExp', 'hostingDetails');
            toggleVisibility('anchoringExp', 'anchoringDetails');
            toggleVisibility('ledTeam', 'leadershipRole');
            toggleVisibility('hackathonExp', 'hackathonDetails');
            toggleVisibility('openSourceExp', 'openSourceDetails');


            // 6. FETCH SUBMISSION (The Core Logic)
            if (form) {
                form.addEventListener('submit', async function(e) {
                    e.preventDefault(); // Stop page reload
                    hideError();

                    // UX: Disable button
                    const originalBtnText = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '⏳ Processing...';

                    // Basic Validation
                    const required = form.querySelectorAll('[required]');
                    let isValid = true;
                    required.forEach(field => {
                        // Skip radio/checkbox groups for simple validation logic
                        if (field.type !== 'radio' && field.type !== 'checkbox' && !field.value.trim()) {
                            isValid = false;
                            field.style.borderColor = 'red';
                        } else {
                            field.style.borderColor = '#e2e8f0'; // Reset border
                        }
                    });

                    if (!isValid) {
                        showError('⚠️ Please fill in all required fields.');
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                        return;
                    }

                    // Prepare Data
                    const formData = new FormData(form);

                    try {
                        // FETCH CALL TO SUBMIT.PHP
                        const response = await fetch('submit.php', {
                            method: 'POST',
                            body: formData
                        });

                        // Parse JSON
                        const result = await response.json();

                        if (result.status === 'success') {
                            // SUCCESS
                            if (successMsg) successMsg.style.display = 'block';
                            form.reset();
                            if (photoPreview) photoPreview.innerHTML = '';
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });

                            console.log("Success:", result);
                        } else {
                            // BACKEND ERROR
                            throw new Error(result.message || 'Unknown server error');
                        }

                    } catch (err) {
                        // NETWORK / PARSING ERROR
                        console.error('Submission error:', err);
                        showError('❌ Error: ' + err.message);
                    } finally {
                        // Reset Button
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                });
            }

            // Auto-set Date
            const dateField = document.getElementById('submissionDate');
            if (dateField) dateField.valueAsDate = new Date();
        });
    </script>
</body>

</html>