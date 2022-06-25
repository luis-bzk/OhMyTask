-- usres table
CREATE TABLE ohmytask.users (
	id INT(11) auto_increment NOT NULL,
	name VARCHAR(60) NULL,
	email VARCHAR(60) NULL,
	password VARCHAR(60) NULL,
	token VARCHAR(32) NULL,
	confirmed TINYINT(1) NULL,
	CONSTRAINT id PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

-- projects table
CREATE TABLE ohmytask.projects (
	id INT(11) auto_increment NOT NULL,
	name VARCHAR(60) NULL,
	url VARCHAR(32) NULL,
	owner_id INT(11) NULL,
	CONSTRAINT id PRIMARY KEY (id),
	CONSTRAINT owner_id FOREIGN KEY (owner_id) REFERENCES ohmytask.users(id) ON DELETE SET NULL ON UPDATE SET NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

-- tasks table
CREATE TABLE ohmytask.tasks (
	id INT(11) auto_increment NOT NULL,
	name VARCHAR(60) NULL,
	state TINYINT(1) NULL,
	project_id INT(11) NULL,
	CONSTRAINT id PRIMARY KEY (id),
	CONSTRAINT project_id FOREIGN KEY (project_id) REFERENCES ohmytask.projects(id) ON DELETE SET NULL ON UPDATE SET NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;
