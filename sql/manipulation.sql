PRAGMA foreign_keys = ON;

-- -- ORGANIZERS 

INSERT INTO Person(name, email, phone_num) 
VALUES('João Matos', 'joaocarlosm00@gmail.com', 938709463);

INSERT INTO Organizer(id, password, address, vat_num) 
VALUES(1, 'password', 'Rua', 123456789);

INSERT INTO Person(name, email, phone_num) 
VALUES('Guilherme Peralta', 'guilucasperalta1991@gmail.com', 123456789);

INSERT INTO Organizer(id, password, address, vat_num) 
VALUES(2, 'password', 'Rua', 987654321);


-- CREATE EventS

INSERT INTO Event(name, date_start, date_end, local, theme, organizer)
VALUES("Web Summit 2020", "01/01/2020", "03/01/2020", "Online", "Technology", 1);

INSERT INTO Event(name, date_start, date_end, local, theme, organizer)
VALUES("Cooking Workshop", "02/01/2020", "04/01/2020", "Berlin", "Skills", 1);

INSERT INTO Event(name, date_start, date_end, local, theme, organizer)
VALUES("LEGO Fanatics Meetup", "03/02/2020", "10/02/2020", "California", "Fun", 1);

INSERT INTO Event(name, date_start, date_end, local, theme, organizer)
VALUES("Symbio 2021", "26/03/2021", "28/03/2021", "FEUP", "Bioengineering", 1);

INSERT INTO Event(name, date_start, date_end, local, theme, organizer)
VALUES("TED Talk: Books", "05/11/2020", "05/11/2020", "Porto", "Literature", 1);




-- UPDATE EventS with maxNum_participants

-- UPDATE Event SET maxNum_participants = 10000 WHERE id = 1;
-- UPDATE Event SET maxNum_participants = 20 WHERE id = 2;
-- UPDATE Event SET maxNum_participants = 50 WHERE id = 3;
-- UPDATE Event SET maxNum_participants = 500 WHERE id = 4;
-- UPDATE Event SET maxNum_participants = 200 WHERE id = 5;



UPDATE Event SET codeForSpeakers = 'iAmSpeaker1' WHERE id = 1;
UPDATE Event SET codeForSpeakers = 'iAmSpeaker2' WHERE id = 2;
UPDATE Event SET codeForSpeakers = 'iAmSpeaker3' WHERE id = 3;
UPDATE Event SET codeForSpeakers = 'iAmSpeaker4' WHERE id = 4;
UPDATE Event SET codeForSpeakers = 'iAmSpeaker5' WHERE id = 5;

UPDATE Event SET codeForPartners = 'iAmPartner1' WHERE id = 1;
UPDATE Event SET codeForPartners = 'iAmPartner2' WHERE id = 2;
UPDATE Event SET codeForPartners = 'iAmPartner3' WHERE id = 3;
UPDATE Event SET codeForPartners = 'iAmPartner4' WHERE id = 4;
UPDATE Event SET codeForPartners = 'iAmPartner5' WHERE id = 5;

UPDATE Event SET codeForStaff = 'iAmStaff1' WHERE id = 1;
UPDATE Event SET codeForStaff = 'iAmStaff2' WHERE id = 2;
UPDATE Event SET codeForStaff = 'iAmStaff3' WHERE id = 3;
UPDATE Event SET codeForStaff = 'iAmStaff4' WHERE id = 4;
UPDATE Event SET codeForStaff = 'iAmStaff5' WHERE id = 5;

UPDATE Event SET image = '1.jpg' WHERE id = 1;
UPDATE Event SET image = '2.jpg' WHERE id = 2;
UPDATE Event SET image = '3.jpg' WHERE id = 3;
UPDATE Event SET image = '4.jpg' WHERE id = 4;
UPDATE Event SET image = '5.jpg' WHERE id = 5;

-- Participant Packages for Event #1

INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
VALUES ('Basic', 1, 10, "Access to Main Stage", 500);

INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
VALUES ('Premium', 1, 100, "Access to Main Stage, Access to Startups Fair", 100);

INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
VALUES ('Diamond', 1, 500, "Access to Main Stage, Access to Startups Fair, Entry to VIP zone", 50);

-- -- Partner Packages for Event #1

INSERT INTO PartnerPackage(name, event, perks)
VALUES ('Institucional', 1, "Pitch during Starting Session, Logotype on website");

INSERT INTO PartnerPackage(name, event, perks)
VALUES ('Conferences', 1, "Logotype on website");

-- -- Sponsor Packages for Event #1

INSERT INTO SponsorPackage(name, event, financialSupport_range_min, financialSupport_range_max, perks)
VALUES ('Bronze', 1, 200, 400, "Logotype in Website");

INSERT INTO SponsorPackage(name, event, financialSupport_range_min, financialSupport_range_max, perks)
VALUES ('Silver', 1, 500, 1000, "Logotype in Website, Coffee-Break Adverts");

INSERT INTO SponsorPackage(name, event, financialSupport_range_min, financialSupport_range_max, perks)
VALUES ('Gold', 1, 1200, 2500, "Logotype in Website, Coffee-Break Adverts, Lunch with Speaker");

-- Participant Packages for Event #2

INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
VALUES ('Basic', 2, 0, "Access to Workshop", 25);

-- -- Partner Packages for Event #2

INSERT INTO PartnerPackage(name, event, perks)
VALUES ('Ingredients Partnership', 2, "Short Presentation of the Company during Workshop");

-- Participant Packages for Event #3

INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
VALUES ('Basic', 3, 0, "Access to Meetup", 50);

-- -- Sponsor Packages for Event #3

INSERT INTO SponsorPackage(name, Event, financialSupport_range_min, financialSupport_range_max, perks)
VALUES ('Main Sponsor', 3, 500, 1000, "Naming sponsor for the Meetup");

UPDATE Event SET date_start = '31/01/2021' WHERE id = 5;
UPDATE Event SET date_end = '02/02/2021' WHERE id = 5;

-- Participant Packages for Event #4

 INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
 VALUES ('Online', 4, 5, "Access to ClickMeeting", 5000);

INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
 VALUES ('Physical', 4, 15, "Entry Ticket to FEUP", 100);

 INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
 VALUES ('Premium', 4, 50, "Entry Ticket to FEUP, Lunches, Access to VIP zone", 100);

-- Participant Packages for Event #5

 INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
 VALUES ('Basic', 5, 500, "Entry Ticket", 250);

INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
 VALUES ('Premium', 5, 15, "Entry Ticket, Lunch with Speakers", 20);

-- Add About Sections to events
UPDATE Event SET aboutEvent = 'Web Summit is an annual technology conference held in Lisbon, Portugal, considered the largest tech event in the world. Founded in 2009, by Paddy Cosgrave, David Kelly and Daire Hickey, Web Summit was originally held in Dublin, Ireland, until 2016, when it moved permanently to Lisbon, Portugal.31/01/2021' 
WHERE id = 1;

UPDATE Event SET aboutEvent = 'Start by visiting the viewpoit of the famous Monument in honor of Cristo Rei where you can enjoy an unparalleled view of the city of Lisbon and the River Tagus, from here you will continue to the charming historical center of the city, integrated in the monumental collection of Évora, a city classified by UNESCO as world heritage. We will find several wineries, here you can not only discover the Alentejo wine tourism, but also have the opportunity to taste the best Alentejo wines, in an amazing and didactic journey through the different castes and terrariums, where we can taste wines of various varieties like Aragonês, Cabernet Sauvignon, Touriga Nacional and more. A good white Alentejo wine is always a good companion; A good red, is a good adviser and a good rosé, nice, all this accompanied by a good gastronomy Alentejo, synonymous with flavor, intensity and passion.' 
WHERE id = 2;

UPDATE Event SET aboutEvent = 'Lego System A/S is a Danish toy production company based in Billund. It is best known for the manufacture of Lego-brand toys, consisting mostly of interlocking plastic bricks. The Lego Group has also built several amusement parks around the world, each known as Legoland, and operates numerous retail stores.' 
WHERE id = 3;

UPDATE Event SET aboutEvent = 'O Symposium on Bioengineering é uma iniciativa anual organizada exclusivamente pelo Núcleo de Estudantes de Bioengenharia da Universidade do Porto (NEB-FEUP/ICBAS). A 12ª edição realizar-se-á nos dias 26, 27 e 28 de março de 2021 e será em formato híbrido: no Grande Auditório da Faculdade de Engenharia da Universidade do Porto, se as condições de saúde pública assim o permitirem, e em formato online, em simultâneo, de qualquer modo. Este evento centra-se na promoção de partilha e debate de temas dotados de uma importância imprescindível nos dias de hoje, associados às áreas de Engenharia Biomédica, Engenharia Biológica e Biotecnologia Molecular, numa simbiose entre oradores com projeção nacional e internacional e estudantes, investigadores e professores que formam uma plateia motivada e interessada.' 
WHERE id = 4;

UPDATE Event SET aboutEvent = 'TED Conferences LLC is an American media organization that posts talks online for free distribution under the slogan "ideas worth spreading". TED was conceived by Richard Saul Wurman, who co-founded it with Harry Marks in February 1984 as a conference; it has been held annually since 1990.' 
WHERE id = 5;

-- Speakers for Event 1
INSERT INTO Person(name, email, phone_num) 
VALUES('Albert Peralta', 'albert@gmail.com', 1234556789);

INSERT INTO Speaker(id, event, title, profile_pic, talk_subject, talk_abstract)
 VALUES(3, 1, 'Eng.', '3.jpg', 'The future of AI', 'abstract');

 INSERT INTO Person(name, email, phone_num) 
VALUES('Sara Sampaio', 'sara@gmail.com', 1234556789);

INSERT INTO Speaker(id, event, title, profile_pic, talk_subject, talk_abstract)
 VALUES(4, 1, 'Ms.', '4.jpg', 'The role of women in Tech', 'abstract');


SELECT * FROM Organizer JOIN Person USING (id);
SELECT * FROM Event;
SELECT * FROM ParticipantPackage;
SELECT * FROM PartnerPackage;
SELECT * FROM SponsorPackage;
SELECT * FROM Speaker JOIN Person USING (id);