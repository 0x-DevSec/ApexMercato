CREATE DATABASE esport_management;
USE esport_management;

-- =========================
-- TEAMS
-- =========================
CREATE TABLE teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    budget DECIMAL(15,2) NOT NULL,
    manager_name VARCHAR(100) NOT NULL
);

-- =========================
-- PLAYERS
-- =========================
CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL UNIQUE,
    role VARCHAR(50) NOT NULL,
    market_value DECIMAL(15,2) NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    team_id INT,
    FOREIGN KEY (team_id) REFERENCES teams(id)
        ON DELETE SET NULL
);

-- =========================
-- COACHES
-- =========================
CREATE TABLE coaches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    coaching_style VARCHAR(100) NOT NULL,
    experience_years INT NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    team_id INT,
    FOREIGN KEY (team_id) REFERENCES teams(id)
        ON DELETE SET NULL
);

-- =========================
-- PLAYER CONTRACTS
-- =========================
CREATE TABLE contracts (
    uuid CHAR(36) PRIMARY KEY,
    salary DECIMAL(15,2) NOT NULL,
    buyout_clause DECIMAL(15,2),
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    player_id INT NOT NULL,
    team_id INT NOT NULL,
    FOREIGN KEY (player_id) REFERENCES players(id),
    FOREIGN KEY (team_id) REFERENCES teams(id)
);

-- =========================
-- COACH CONTRACTS
-- =========================
CREATE TABLE coach_contracts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    salary DECIMAL(15,2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    coach_id INT NOT NULL,
    team_id INT NOT NULL,
    FOREIGN KEY (coach_id) REFERENCES coaches(id),
    FOREIGN KEY (team_id) REFERENCES teams(id)
);

-- =========================
-- TRANSFERS
-- =========================
CREATE TABLE transfers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    from_team_id INT NOT NULL,
    to_team_id INT NOT NULL,
    player_id INT NOT NULL,
    amount DECIMAL(15,2) NOT NULL,
    status ENUM('PENDING', 'COMPLETED', 'FAILED') NOT NULL,
    reference_code VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (from_team_id) REFERENCES teams(id),
    FOREIGN KEY (to_team_id) REFERENCES teams(id),
    FOREIGN KEY (player_id) REFERENCES players(id)
);
