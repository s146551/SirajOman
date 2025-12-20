-- Drop the database if it exists to ensure a clean start
DROP DATABASE IF EXISTS siraj_oman;

-- Create the database
CREATE DATABASE siraj_oman;

-- Use the created database
USE siraj_oman;

-- Table for Team Information from contact.php
CREATE TABLE team_info (
    id INT PRIMARY KEY,
    std_name VARCHAR(100),
    email VARCHAR(100) NOT NULL
);

INSERT INTO team_info (id, std_name, email) VALUES
(146551, 'Taher Nasser Al-Fahdi', 's146551@student.squ.edu.om'),
(145073, 'Maan Mohammed Al-Aghbari', 's145073@student.squ.edu.om'),
(144635, 'Abdullah Said Al-Fahdi', 's144635@student.squ.edu.om');

-- Table for Locations from page1.js
CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    governorate VARCHAR(100) NOT NULL,
    wilaya VARCHAR(100),
    attraction VARCHAR(100) NOT NULL
);

INSERT INTO locations (governorate, wilaya, attraction) VALUES
('Muscat', 'Matrah', 'Mutrah Souq'),
('Muscat', 'Bausher', 'Royal Opera House Muscat'),
('Muscat', 'Seeb', 'Sultan Qaboos Grand Mosque'),
('Al Batinah South', 'Barka', 'Sawadi Beach'),
('Al Batinah South', 'Rustaq', 'Barka Souq'),
('Al Dakhiliya', 'Nizwa', 'Wadi Tanuf'),
('Al Dakhiliya', 'Jabal Akhdar', 'Jabel Shams'),
('Dhofar', 'Salalah', 'Al Mughsayl Beach');

-- Table for Activities from page2.js
CREATE TABLE activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    place VARCHAR(100) NOT NULL,
    tourist_attraction VARCHAR(100),
    activity VARCHAR(100) NOT NULL
);

INSERT INTO activities (place, tourist_attraction, activity) VALUES
('Deserts', 'Sharqiyah Sands', 'Camping'),
('Deserts', 'Wahiba Sands', 'Camel rides'),
('Mountains', 'Jebel Shams', 'Camping'),
('Mountains', 'Jebel Akhdar', 'Hiking'),
('Wadis', 'Wadi Bani Khalid', 'Swimming'),
('Wadis', 'Wadi Shab', 'Hiking trails'),
('Beaches and Islands', 'Daymaniyat Islands', 'Diving');

-- Table for Feedback from questionnaire.html
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visitor_name VARCHAR(255) NOT NULL,
    visitor_email VARCHAR(255) NOT NULL,
    visit_date DATE NOT NULL,
    first_time VARCHAR(3) NOT NULL,
    purpose VARCHAR(50) NOT NULL,
    likes VARCHAR(255),
    comments TEXT
);

INSERT INTO feedback (visitor_name, visitor_email, visit_date, first_time, purpose, likes, comments) VALUES
('Ahmed Al-Balushi', 'ahmed@gmail.com', '2025-10-20', 'yes', 'tourism', 'Nature, Safety', 'A wonderful experience, Oman is beautiful and safe.'),
('Fatima Al-Harthi', 'fatima@gmail.com', '2025-11-15', 'no', 'family', 'Food, Culture', 'The food was amazing, and the culture is so rich.'),
('John Smith', 'john.smith@gmail.com', '2025-11-28', 'yes', 'work', 'Cleanliness', 'I was very impressed with the cleanliness of the cities.'),
('Maria Garcia', 'maria.g@gmail.com', '2025-12-01', 'yes', 'tourism', 'Nature, weather', 'The weather was perfect for exploring the wadis.'),
('Chen Wei', 'chen.wei@gmail.com', '2025-12-05', 'no', 'study', 'Culture', 'Studying the history and culture here is fascinating.');

-- Table for Suggestions from page5.html
CREATE TABLE suggestions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    user_phone VARCHAR(15) NOT NULL,
    suggestion_text TEXT NOT NULL
);

INSERT INTO suggestions (user_name, user_phone, suggestion_text) VALUES
('Salim Al-Amri', '99887766', 'It would be great to have more details about accessibility for people with disabilities.'),
('Aisha Al-Raisi', '91234567', 'Please add a feature to book hotels and tours directly from the website.'),
('David Wilson', '77665544', 'The website is great, but the map could be a bit more interactive.'),
('Khadija Al-Saidi', '98765432', 'I suggest adding a section for traditional Omani recipes.'),
('Mohammed Al-Habsi', '95554433', 'A video gallery showcasing the beauty of Oman would be a fantastic addition.');

-- Table for Ratings from page5.html
CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT NOT NULL,
    feedback_text TEXT NOT NULL
);

INSERT INTO ratings (rating, feedback_text) VALUES
(5, 'Excellent website! Very informative and easy to use.'),
(4, 'Great resource for planning my trip to Oman. A few more pictures would be nice.'),
(5, 'I love the design and the amount of information available. Well done!'),
(3, 'Good start, but some pages are slow to load.'),
(4, 'Very helpful. I found a lot of hidden gems here that I didn''t know about.');
