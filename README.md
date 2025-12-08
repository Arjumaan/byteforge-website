# ByteForge Club Website

ByteForge is a student-led tech innovation and peer-learning club at Rathinam Technical Campus, Coimbatore. This website serves as the official platform for the club, providing information about activities, events, team members, and facilitating member and event registrations.

## Features

- **Home Page**: Showcases club information, activities, upcoming events, and team members
- **Event Management**: Display and manage events with registration functionality
- **Member Registration**: Comprehensive registration form for new members with detailed skill assessment
- **Admin Panel**: Secure admin interface to view and manage registrations
- **PDF Generation**: Automatic generation of registration forms as PDFs using TCPDF
- **Email Notifications**: Send registration confirmations with PDF attachments via PHPMailer
- **File Uploads**: Support for photo and resume uploads during registration
- **Responsive Design**: Mobile-friendly interface with modern CSS styling

## Tech Stack

- **Backend**: PHP 7.4+
- **Frontend**: HTML5, CSS3, JavaScript
- **Database**: MySQL
- **Libraries**:
  - PHPMailer (for email functionality)
  - TCPDF (for PDF generation)
- **Data Storage**: JSON files for static data (events, team)
- **Server**: Apache (recommended with XAMPP for local development)

## Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server (or XAMPP for local development)
- Composer (optional, for dependency management)

## Installation

1. **Clone or Download** the repository to your web server's document root:
   ```bash
   # If using XAMPP, place in htdocs folder
   cd /path/to/xampp/htdocs
   git clone <repository-url> ByteForge
   ```

2. **Install Dependencies** (if using Composer):
   ```bash
   composer install
   ```

3. **Set up Database**:
   - Create a MySQL database named `byteforge`
   - Import the database schema from `db_setup.sql`

4. **Configure Environment**:
   - Copy `env_loader.php` and set up environment variables for SMTP (if using email functionality)
   - Update `config.php` with your database credentials and other settings

## Setup

1. **Database Configuration**:
   - Open `config.php` and update the database connection details:
     ```php
     'db_host' => 'localhost',
     'db_name' => 'byteforge',
     'db_user' => 'your_username',
     'db_pass' => 'your_password',
     ```

2. **Admin Password**:
   - Change the default admin password in `config.php`:
     ```php
     'admin_password' => 'YourSecurePassword123', // CHANGE THIS IMMEDIATELY!
     ```

3. **SMTP Configuration** (for email functionality):
   - Set up environment variables in your server or create a `.env` file:
     ```
     SMTP_HOST=smtp.gmail.com
     SMTP_USER=your-email@gmail.com
     SMTP_PASS=your-app-password
     SMTP_SECURE=tls
     SMTP_PORT=587
     ```

4. **File Permissions**:
   - Ensure the `uploads/` directory and its subdirectories are writable:
     ```bash
     chmod -R 755 uploads/
     ```

## Database Setup

Run the SQL script to set up the database:

```sql
-- Execute db_setup.sql in your MySQL client
source db_setup.sql;
```

This will create the `byteforge` database and the necessary tables for storing registration data.

## Configuration

### Static Data
- **Events**: Edit `data/events.json` to add or modify events
- **Team Members**: Update `data/team.json` to change team information

### Site Settings
- **Email**: Update `site_email` in `config.php`
- **Assets**: Modify paths in `config.php` if needed

## Usage

1. **Access the Website**:
   - Navigate to `http://localhost/ByteForge` (if using XAMPP)

2. **Member Registration**:
   - Visit the registration page via the "Join" section
   - Fill out the comprehensive form with personal, technical, and skill information
   - Upload required documents (photo and resume)

3. **Event Registration**:
   - Browse events on the home page or events page
   - Click on an event to register with basic details

4. **Admin Access**:
   - Visit `admin/registrations.php`
   - Log in with admin credentials from `config.php`

## Admin Panel

The admin panel provides:
- View all member registrations
- Search and filter registrations
- Download registration data
- Manage registration records

**Access**: `admin/registrations.php`
**Credentials**: Use the admin username and password from `config.php`

## File Structure

```
ByteForge/
├── index.php              # Home page
├── events.php             # Events listing and registration
├── join.php               # Joining process page
├── register.php           # Member registration form
├── submit.php             # Form submission handler
├── config.php             # Configuration file
├── env_loader.php         # Environment variables loader
├── db_setup.sql           # Database schema
├── admin/
│   └── registrations.php  # Admin panel
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
├── data/
│   ├── events.json        # Event data
│   ├── team.json          # Team member data
│   └── registrations.json # Registration data (backup)
├── uploads/
│   ├── photos/            # Uploaded photos
│   ├── resumes/           # Uploaded resumes
│   └── pdfs/              # Generated PDFs
├── phpmailer/             # Email library
└── tcpdf/                 # PDF generation library
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Security Notes

- Change the default admin password immediately after setup
- Ensure file upload directories have proper permissions
- Validate all user inputs on the server side
- Use HTTPS in production
- Regularly update dependencies for security patches

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support or questions, contact the ByteForge team at byteforge.groups@gmail.com

---

**ByteForge** - Forging every byte of code to creation
