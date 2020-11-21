PRAGMA foreign_keys = ON;

INSERT INTO organizer(name, password, address, vat_num) VALUES('ola', 'boss', 'av', 222);
INSERT INTO organizer(name, password, address, vat_num) VALUES('oi', 'rrrrr', 'av', 333);
INSERT INTO event(date, local, theme, organizer) VALUES('27/02/2000','porto','eng', 1);
INSERT INTO ParticipantPackage VALUES ('premium',1,33,'coffee break', 100);
INSERT INTO PartnerPackage VALUES ('nice package',1,'social media post');
INSERT INTO SponsorPackage VALUES ('gold',1, 100, 200, 'workshop spotlight');
INSERT INTO Person(name, email, phone_num) VALUES('Joao Medium', 'joao@matos.pt', 938709463);
INSERT INTO Person(name, email, phone_num) VALUES('Joao Orador BOSS', 'joao@m.pt', 912897991);
INSERT INTO Person(name, email, phone_num) VALUES('Joao Soldadinho', 'joao@k.pt', 922388923);
INSERT INTO Participant(id, address, vat_num, package, event) VALUES (1, 'rua', 9090909, 'premium', 1);
INSERT INTO Speaker(id, event, title, profile_pic, talk_subject, talk_abstract) VALUES (1, 1, 'Prof.', 'pic','AI', 'blablabla');

INSERT INTO Staff(id, event, profile_pic, department, password) VALUES (2, 1, 'pic','COMIM', 'password');
INSERT INTO Staff(id, event, profile_pic, department, password, hierarchical_superior) VALUES (1, 1, 'pic','COMIM', 'password',2);
INSERT INTO Staff(id, event, profile_pic, department, password, subordinates, hierarchical_superior) VALUES (3, 1, 'pic','COMIM', 'password',1,2);
-- INSERT INTO Staff(id, event, profile_pic, department, password, subordinates, hierarchical_superior) VALUES (1, 1, 'pic','COMIM', 'password', 3, 2);

INSERT INTO Entity VALUES(1, 'PROZIS', 'logo', 'www.mckdkf.pt');
INSERT INTO Entity VALUES(2, 'VOU', 'log', 'www.vou.pt');
INSERT INTO Sponsor VALUES(1, 150, 'paid', 'gold', 1);
INSERT INTO Partner VALUES(2, 'logistics', 'nice package', 1);

-- SELECT * FROM organizer;
SELECT * FROM event;
-- SELECT * FROM ParticipantPackage;
-- SELECT * FROM PartnerPackage;
-- -- SELECT * FROM SponsorPackage;
-- SELECT * FROM Person;
-- -- SELECT * FROM Participant;
-- -- SELECT * FROM Speaker;
-- SELECT * FROM Staff;

-- SELECT * FROM Entity;
-- SELECT * FROM Sponsor;
-- SELECT * FROM Partner;
