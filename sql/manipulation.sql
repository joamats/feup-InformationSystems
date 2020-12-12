PRAGMA foreign_keys = ON;

-- ORGANIZERS 

-- INSERT INTO Person(name, email, phone_num) 
-- VALUES('João Matos', 'joaocarlosm00@gmail.com', 938709463);

-- INSERT INTO organizer(id, password, address, vat_num) 
-- VALUES(1, 'password', 'Rua', 123456789);

-- INSERT INTO Person(name, email, phone_num) 
-- VALUES('Guilherme Peralta', 'guilucasperalta1991@gmail.com', 123456789);

-- INSERT INTO organizer(id, password, address, vat_num) 
-- VALUES(8, 'password', 'Rua', 987654321);


-- CREATE EVENTS

-- INSERT INTO event(name, date, local, theme, organizer)
-- VALUES("Web Summit 2020", "01/01/2020", "Online", "Technology", 1);

-- INSERT INTO event(name, date, local, theme, organizer)
-- VALUES("Cooking Workshop", "02/01/2020", "Berlin", "Skills", 1);

-- INSERT INTO event(name, date, local, theme, organizer)
-- VALUES("LEGO Fanatics Meetup", "03/01/2020", "California", "Fun", 1);

-- INSERT INTO event(name, date, local, theme, organizer)
-- VALUES("Symbio 2021", "04/01/2020", "FEUP", "Bioengineering", 1);

-- INSERT INTO event(name, date, local, theme, organizer)
-- VALUES("TED Talk: Books", "05/01/2020", "Porto", "Literature", 1);




-- UPDATE EVENTS

-- UPDATE event SET maxNum_participants = 10000 WHERE id = 1;
-- UPDATE event SET maxNum_participants = 20 WHERE id = 2;
-- UPDATE event SET maxNum_participants = 50 WHERE id = 3;
-- UPDATE event SET maxNum_participants = 500 WHERE id = 4;
-- UPDATE event SET maxNum_participants = 200 WHERE id = 5;


-- UPDATE event SET codeForSpeakers = 'iAmSpeaker1' WHERE id = 1;
-- UPDATE event SET codeForSpeakers = 'iAmSpeaker2' WHERE id = 2;
-- UPDATE event SET codeForSpeakers = 'iAmSpeaker3' WHERE id = 3;
-- UPDATE event SET codeForSpeakers = 'iAmSpeaker4' WHERE id = 4;
-- UPDATE event SET codeForSpeakers = 'iAmSpeaker5' WHERE id = 5;

-- UPDATE event SET codeForPartners = 'iAmPartner1' WHERE id = 1;
-- UPDATE event SET codeForPartners = 'iAmPartner2' WHERE id = 2;
-- UPDATE event SET codeForPartners = 'iAmPartner3' WHERE id = 3;
-- UPDATE event SET codeForPartners = 'iAmPartner4' WHERE id = 4;
-- UPDATE event SET codeForPartners = 'iAmPartner5' WHERE id = 5;

-- UPDATE event SET codeForStaff = 'iAmStaff1' WHERE id = 1;
-- UPDATE event SET codeForStaff = 'iAmStaff2' WHERE id = 2;
-- UPDATE event SET codeForStaff = 'iAmStaff3' WHERE id = 3;
-- UPDATE event SET codeForStaff = 'iAmStaff4' WHERE id = 4;
-- UPDATE event SET codeForStaff = 'iAmStaff5' WHERE id = 5;

SELECT * FROM organizer JOIN Person USING (id);
SELECT * FROM event;
