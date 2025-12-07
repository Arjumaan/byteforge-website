-- db_setup.sql - Run this script to set up the MySQL database for ByteForge registrations

CREATE DATABASE IF NOT EXISTS byteforge;
USE byteforge;

CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id VARCHAR(10) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    department VARCHAR(100),
    year VARCHAR(50),
    phone VARCHAR(20),
    role ENUM('participant', 'volunteer') DEFAULT 'participant',
    why TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional: Insert sample data for testing
-- INSERT INTO registrations (event_id, name, email, department, year, role, why) VALUES
-- ('E001', 'John Doe', 'john@example.com', 'Computer Science', '3rd Year', 'participant', 'Interested in web development');
