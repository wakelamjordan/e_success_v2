MariaDB [e_success_v2]> desc people;
+-------------+-------------+------+-----+---------+----------------+
| Field       | Type        | Null | Key | Default | Extra          |
+-------------+-------------+------+-----+---------+----------------+
| id          | int(11)     | NO   | PRI | NULL    | auto_increment |
| name        | varchar(50) | NO   |     | NULL    |                |
| surname     | varchar(50) | NO   |     | NULL    |                |
| date_birth  | date        | NO   |     | NULL    |                |
| place_birth | varchar(50) | NO   |     | NULL    |                |
+-------------+-------------+------+-----+---------+----------------+

INSERT INTO
            `people` (name,       
                        surname,    
                        date_birth, 
                        place_birth)
                VALUES
                        (name,       
                        surname,    
                        date_birth, 
                        place_birth),
                        (name,       
                        surname,    
                        date_birth, 
                        place_birth),
                        (name,       
                        surname,    
                        date_birth, 
                        place_birth),
                        (name,       
                        surname,    
                        date_birth, 
                        place_birth),
                        (name,       
                        surname,    
                        date_birth, 
                        place_birth),
                        ;

INSERT INTO `people` (name, surname, date_birth, place_birth)
VALUES
    ('John', 'Doe', '1990-05-15', 'New York'),
    ('Jane', 'Smith', '1985-08-20', 'Los Angeles'),
    ('Michael', 'Johnson', '1978-03-10', 'Chicago'),
    ('Emily', 'Williams', '1992-11-25', 'Houston'),
    ('David', 'Brown', '1980-09-18', 'Miami'),
    ('Sarah', 'Jones', '1995-06-30', 'San Francisco'),
    ('Daniel', 'Garcia', '1987-04-05', 'Dallas'),
    ('Jessica', 'Martinez', '1983-12-12', 'Atlanta'),
    ('Matthew', 'Rodriguez', '1998-02-28', 'Seattle'),
    ('Ashley', 'Hernandez', '1990-07-22', 'Boston');