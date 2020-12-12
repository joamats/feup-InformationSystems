PRAGMA foreign_keys = ON;

-- -- ORGANIZERS 

-- INSERT INTO Person(name, email, phone_num) 
-- VALUES('João Matos', 'joaocarlosm00@gmail.com', 938709463);

-- INSERT INTO organizer(id, password, address, vat_num) 
-- VALUES(1, 'password', 'Rua', 123456789);

-- INSERT INTO Person(name, email, phone_num) 
-- VALUES('Guilherme Peralta', 'guilucasperalta1991@gmail.com', 123456789);

-- INSERT INTO organizer(id, password, address, vat_num) 
-- VALUES(2, 'password', 'Rua', 987654321);


-- -- CREATE EVENTS

-- INSERT INTO event(name, date_start, date_end, local, theme, organizer)
-- VALUES("Web Summit 2020", "01/01/2020", "03/01/2020", "Online", "Technology", 1);

-- INSERT INTO event(name, date_start, date_end, local, theme, organizer)
-- VALUES("Cooking Workshop", "02/01/2020", "04/01/2020", "Berlin", "Skills", 1);

-- INSERT INTO event(name, date_start, date_end, local, theme, organizer)
-- VALUES("LEGO Fanatics Meetup", "03/02/2020", "10/02/2020", "California", "Fun", 1);

-- INSERT INTO event(name, date_start, date_end, local, theme, organizer)
-- VALUES("Symbio 2021", "26/03/2021", "28/03/2021", "FEUP", "Bioengineering", 1);

-- INSERT INTO event(name, date_start, date_end, local, theme, organizer)
-- VALUES("TED Talk: Books", "05/11/2020", "05/11/2020", "Porto", "Literature", 1);




-- -- UPDATE EVENTS with maxNum_participants

-- -- UPDATE event SET maxNum_participants = 10000 WHERE id = 1;
-- -- UPDATE event SET maxNum_participants = 20 WHERE id = 2;
-- -- UPDATE event SET maxNum_participants = 50 WHERE id = 3;
-- -- UPDATE event SET maxNum_participants = 500 WHERE id = 4;
-- -- UPDATE event SET maxNum_participants = 200 WHERE id = 5;



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

-- UPDATE event SET image = '1.jpg' WHERE id = 1;
-- UPDATE event SET image = '2.jpg' WHERE id = 2;
-- UPDATE event SET image = '3.jpg' WHERE id = 3;
-- UPDATE event SET image = '4.jpg' WHERE id = 4;
-- UPDATE event SET image = '5.jpg' WHERE id = 5;

-- -- Participant Packages for Event #1

-- INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
-- VALUES ('Basic', 1, 10, "Access to Main Stage", 500);

-- INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
-- VALUES ('Premium', 1, 100, "Access to Main Stage, Access to Startups Fair", 100);

-- INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
-- VALUES ('Diamond', 1, 500, "Access to Main Stage, Access to Startups Fair, Entry to VIP zone", 50);

-- -- -- Partner Packages for Event #1

-- INSERT INTO PartnerPackage(name, event, perks)
-- VALUES ('Institucional', 1, "Pitch during Starting Session, Logotype on website");

-- INSERT INTO PartnerPackage(name, event, perks)
-- VALUES ('Conferences', 1, "Logotype on website");

-- -- -- Sponsor Packages for Event #1

-- INSERT INTO SponsorPackage(name, event, financialSupport_range_min, financialSupport_range_max, perks)
-- VALUES ('Bronze', 1, 200, 400, "Logotype in Website");

-- INSERT INTO SponsorPackage(name, event, financialSupport_range_min, financialSupport_range_max, perks)
-- VALUES ('Silver', 1, 500, 1000, "Logotype in Website, Coffee-Break Adverts");

-- INSERT INTO SponsorPackage(name, event, financialSupport_range_min, financialSupport_range_max, perks)
-- VALUES ('Gold', 1, 1200, 2500, "Logotype in Website, Coffee-Break Adverts, Lunch with Speaker");

-- -- Participant Packages for Event #2

-- INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
-- VALUES ('Basic', 2, 0, "Access to Workshop", 25);

-- -- -- Partner Packages for Event #2

-- INSERT INTO PartnerPackage(name, event, perks)
-- VALUES ('Ingredients Partnership', 2, "Short Presentation of the Company during Workshop");

-- -- Participant Packages for Event #3

-- INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
-- VALUES ('Basic', 3, 0, "Access to Meetup", 50);

-- -- -- Sponsor Packages for Event #3

-- INSERT INTO SponsorPackage(name, event, financialSupport_range_min, financialSupport_range_max, perks)
-- VALUES ('Main Sponsor', 3, 500, 1000, "Naming sponsor for the Meetup");



SELECT * FROM organizer JOIN Person USING (id);
SELECT * FROM event;
SELECT * FROM ParticipantPackage;
SELECT * FROM PartnerPackage;
SELECT * FROM SponsorPackage;
