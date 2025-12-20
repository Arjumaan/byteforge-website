<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>ByteForge Club - Member Registration Form</title>
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            /* DARK MODE VARS (ByteForge Cyan Theme) */
            --primary-color: #1FA0B5; /* Cyan primary */
            --primary-hover: #2dd4ed;
            --accent-cyan: #1FA0B5;
            
            --bg-color: #070A13;      /* Deepest dark like index.php */
            --surface-color: #0E1422; /* Solid dark panel color, faster than glass */
            
            --text-primary: #ffffff;
            --text-secondary: #94a3b8; /* Cleaner slate grey */
            
            --border-color: rgba(31, 160, 181, 0.2); /* Cyan suble border */
            --focus-ring: rgba(31, 160, 181, 0.5);
            
            --success-color: #10b981;
            --error-color: #ef4444;
            
            --primary-gradient: linear-gradient(135deg, #1FA0B5 0%, #0ea5e9 100%); /* Blue-Cyan gradient */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(circle at top center, #1A1F35 0%, #070A13 80%); /* Matches index.php */
            background-attachment: fixed;
            color: var(--text-primary);
            padding: 40px 20px;
            overflow-x: hidden;
        }

        /* Container - Optimized for Performance (No Blur) */
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: var(--surface-color); /* Solid color instead of glass lag */
            padding: 50px;
            border-radius: 24px;
            border: 1px solid var(--border-color);
            box-shadow: 0 20px 50px rgba(0,0,0,0.4);
            position: relative;
            z-index: 10;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 30px;
        }

        .header h1 {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 10px;
            letter-spacing: -1px;
            text-transform: uppercase;
        }

        .header h3 {
            font-size: 1.1rem;
            color: var(--accent-cyan);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .header p {
            color: var(--text-secondary);
            font-style: italic;
            opacity: 0.9;
        }

        /* Form Sections */
        .form-section {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px dashed var(--border-color);
        }

        .section-title {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 25px;
            padding-left: 15px;
            border-left: 5px solid var(--accent-cyan);
            display: flex;
            align-items: center;
            background: linear-gradient(90deg, rgba(31,160,181,0.1) 0%, transparent 100%);
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 0 8px 8px 0;
        }
        
        .sector-label {
            font-size: 1.1rem;
            color: var(--accent-cyan);
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Inputs & Labels */
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        label {
            color: var(--text-secondary);
            margin-bottom: 8px;
            font-size: 0.95rem;
            font-weight: 500;
        }

        label.required::after { content: " *"; color: var(--accent-cyan); }

        input, select, textarea {
            background: rgba(15, 23, 42, 0.6) !important;
            border: 1px solid var(--border-color) !important;
            color: #fff !important;
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input::placeholder, textarea::placeholder {
            color: rgba(255,255,255,0.4);
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--accent-cyan) !important;
            box-shadow: 0 0 0 3px rgba(31,160,181,0.2) !important;
            background: rgba(15, 23, 42, 0.9) !important;
        }

        /* Grid Layout */
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 10px; }
        .form-row.full { grid-template-columns: 1fr; }
        .form-row.three-col { grid-template-columns: repeat(3, 1fr); }

        /* Custom Checkbox/Radio */
        .checkbox-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
        .radio-group { display: flex; gap: 20px; flex-wrap: wrap; }
        
        .checkbox-item, .radio-item {
            display: flex; align-items: center; gap: 10px;
            background: rgba(255,255,255,0.05);
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.1);
            transition: 0.3s;
            cursor: pointer;
        }

        .checkbox-item:hover, .radio-item:hover {
            border-color: var(--accent-cyan);
            background: rgba(31,160,181,0.15);
        }
        
        /* Increase click target for inputs inside label wrapper or next to it */
        .checkbox-label {
            cursor: pointer;
            font-size: 0.95rem;
            color: var(--text-secondary);
        }

        input[type="checkbox"], input[type="radio"] {
            accent-color: var(--accent-cyan);
            width: 20px; height: 20px;
            margin: 0;
            cursor: pointer;
        }

        /* Buttons */
        .btn-submit {
            background: var(--primary-gradient);
            color: #fff;
            padding: 16px 50px;
            border-radius: 50px;
            font-weight: 700;
            letter-spacing: 1px;
            border: none;
            box-shadow: 0 10px 30px rgba(122,30,216,0.3);
            text-transform: uppercase;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(122,30,216,0.5);
            background: linear-gradient(135deg, #24b8d1 0%, #8b2df0 100%);
        }

        .btn-reset {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            color: #ccc;
            padding: 16px 30px;
            border-radius: 50px;
            font-weight: 600;
        }

        .btn-reset:hover {
            border-color: #fff;
            color: #fff;
            background: rgba(255,255,255,0.05);
        }

        /* Declaration & Status */
        .declaration { background: rgba(31,160,181,0.1); border-left-color: var(--accent-cyan); color: #e2e8f0; padding: 20px; }
        
        .success-message { 
            background: rgba(16,185,129,0.15); 
            color: #34d399; 
            border: 1px solid #059669; 
            padding: 20px; 
            border-radius: 12px;
            margin-bottom: 30px;
            font-weight: 600;
            display: none; /* Hidden by default */
            text-align: center;
        }

        /* Button Updates */
        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .btn-submit, .btn-reset, .btn-back-top {
            padding: 16px 40px;
            border-radius: 4px; /* Slightly techier */
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.165, 0.84, 0.44, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            min-width: 220px;
            position: relative;
            overflow: hidden;
        }

        /* Techy cut corners or borders */
        .btn-submit {
            background: var(--primary-color);
            color: white;
            border: 1px solid var(--accent-cyan);
            box-shadow: 0 0 15px rgba(122, 30, 216, 0.3);
        }
        
        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transform: translateX(-100%);
            transition: 0.5s;
        }
        
        .btn-submit:hover::before {
            transform: translateX(100%);
        }

        .btn-submit:hover {
            background: var(--primary-hover);
            box-shadow: 0 0 25px rgba(122, 30, 216, 0.6);
            transform: translateY(-2px);
        }

        .btn-reset {
            background: rgba(255, 255, 255, 0.03);
            color: var(--text-secondary);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-reset:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-color: white;
        }

        .btn-back-top {
            background: transparent;
            color: var(--accent-cyan);
            border: 1px solid var(--accent-cyan);
            display: flex; /* Ensure block-level behavior for margin:auto centering */
            width: 100%;
            max-width: 460px; /* Approx width of 2 buttons + gap */
            margin: 10px auto 0 auto; /* Centered block if needed, though inline-flex helps */
        }

        .btn-back-top:hover {
            background: rgba(31, 160, 181, 0.15);
            box-shadow: 0 0 20px rgba(31, 160, 181, 0.3);
            text-shadow: 0 0 5px var(--accent-cyan);
        }

        /* Header Home Button */
        .header-home-btn {
            position: absolute;
            top: 30px;
            right: 30px;
            background: rgba(0, 0, 0, 0.3);
            color: var(--accent-cyan);
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            border: 1px solid var(--accent-cyan);
            text-transform: uppercase;
        }

        .header-home-btn:hover {
            background: var(--accent-cyan);
            color: #0f0524;
            box-shadow: 0 0 20px rgba(31,160,181,0.6);
        }
        
        .error-message { 
            background: rgba(239,68,68,0.15); 
            color: #fca5a5; 
            border: 1px solid #dc2626; 
            padding: 20px; 
            border-radius: 12px;
            margin-bottom: 30px;
            font-weight: 600;
            display: none; /* Hidden by default */
            text-align: center;
        }

        /* Responsive */
        @media(max-width: 768px) {
            .container { padding: 20px; margin-top: 20px; }
            .form-row, .form-row.three-col, .checkbox-grid { grid-template-columns: 1fr; }
            .header h1 { font-size: 2rem; }
            .btn-submit { width: 100%; margin-bottom: 10px; }
            .btn-reset { width: 100%; }
        }

        /* === GLOBAL ASSETS (Cursor, Preloader) === */
        /* Custom Cursor */
        .cursor-dot, .cursor-outline {
            position: fixed; top: 0; left: 0; transform: translate(-50%, -50%);
            border-radius: 50%; z-index: 9999; pointer-events: none;
        }
        .cursor-dot { width: 5px; height: 5px; background: var(--accent-cyan); z-index: 10000; }
        .cursor-outline { width: 30px; height: 30px; border: 1px solid rgba(255,255,255,0.5); transition: transform 0.2s; }
        .cursor-hover { transform: translate(-50%, -50%) scale(1.5); background: rgba(255,255,255,0.1); border-color: var(--accent-cyan); }
    </style>

</head>

<body>

    <div class="container">
        <!-- Home Button -->
        <a href="index.php" class="header-home-btn">
            <i class="fas fa-home"></i> Home
        </a>

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

                <label class="sector-label">Sector 1: Core Development & Innovation</label>
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

                <label class="sector-label">Sector 2: Advanced Technology & Security</label>
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
                        <p class="info-text">Upload only JPG Image - Max 5MB</p>
                        <div id="photoPreview" class="photo-preview"></div>
                    </div>
                    <div class="form-group">
                        <label for="resume" class="required">Resume / CV </label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx">
                        <p class="info-text">Upload only PDF Document - Max 10MB</p>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="declaration">
                    <h3 style="margin-bottom:10px; color:var(--primary-color);">Declaration</h3>
                    <p class="declaration-text">
                        I hereby declare that the information provided above is true and accurate to the best of my knowledge.
                        I agree to actively participate in club activities and contribute to the growth of ByteForge.
                    </p><br><br>
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
                <button type="submit" class="btn-submit">Submit Registration <i class="fas fa-paper-plane"></i></button>
                <button type="reset" class="btn-reset">Reset Form <i class="fas fa-undo"></i></button>
            </div>
            
            <div class="center-container" style="margin-top: 10px;">
                <button type="button" class="btn-back-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
                    Back to Top <i class="fas fa-arrow-up"></i>
                </button>
            </div>

    <script src="assets/js/main.js?v=1.5"></script>
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
                    // UX: Disable button (User requested removal of loading part)
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
                            field.style.borderColor = 'var(--error-color, red)';
                        } else {
                            field.style.borderColor = ''; // Reset to default CSS
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