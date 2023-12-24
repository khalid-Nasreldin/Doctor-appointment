CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    gender VARCHAR(100) NOT NULL,
    join_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE appointments (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    date DATE,
    address VARCHAR(100),
    feedback TEXT(255) NOT NULL,
    status VARCHAR(100) NOT NULL,
    patient_id INT,
    FOREIGN KEY (patient_id) REFERENCES users(id)
);