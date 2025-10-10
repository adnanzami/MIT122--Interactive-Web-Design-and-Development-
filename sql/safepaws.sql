CREATE DATABASE safepaws;
USE safepaws;

-- Table: sitters
CREATE TABLE sitters (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  phone VARCHAR(20) NOT NULL,
  city VARCHAR(100) NOT NULL,
  services TEXT,
  bio TEXT,
  img VARCHAR(255) DEFAULT 'images/default.png',
  password VARCHAR(255) NOT NULL
);


-- Table: bookings
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sitter_id INT NOT NULL,
    owner_id INT NOT NULL,
    owner_name VARCHAR(100),
    owner_email VARCHAR(100),
    date DATE,
    notes TEXT,
    status VARCHAR(20) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sitter_id) REFERENCES sitters(id),
    FOREIGN KEY (owner_id) REFERENCES bookers(id)
);


-- Table: reviews
CREATE TABLE reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sitter_id INT NOT NULL,
  user_name VARCHAR(100) NOT NULL,
  rating INT NOT NULL,
  text TEXT,
  FOREIGN KEY (sitter_id) REFERENCES sitters(id) ON DELETE CASCADE
);

-- Table: Contact Us Forms
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: bookers
CREATE TABLE bookers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  phone VARCHAR(20),
  password VARCHAR(255) NOT NULL
);
