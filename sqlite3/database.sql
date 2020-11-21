
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS organizer;
DROP TABLE IF EXISTS event;
DROP TABLE IF EXISTS ParticipantPackage;
DROP TABLE IF EXISTS PartnerPackage;
DROP TABLE IF EXISTS SponsorPackage;
DROP TABLE IF EXISTS Person;
DROP TABLE IF EXISTS Participant;
DROP TABLE IF EXISTS Speaker;
DROP TABLE IF EXISTS Staff;
DROP TABLE IF EXISTS Entity;
DROP TABLE IF EXISTS Sponsor;
DROP TABLE IF EXISTS Partner;


CREATE TABLE organizer (
    id integer PRIMARY KEY AUTOINCREMENT,
    name text NOT NULL,
    password text NOT NULL, -- to encrypt later
    logotype text, -- to be a URL or path
    address text NOT NULL,
    vat_num INTEGER NOT NULL UNIQUE
);

CREATE TABLE event (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date text NOT NULL,
    local text NOT NULL,
    theme text NOT NULL,
    price_min integer DEFAULT 0 NOT NULL,   -- different from rel. model
    price_max integer DEFAULT 0 NOT NULL,   -- different from rel. model
    num_participants integer DEFAULT 0,   -- how to compute this??
    maxNum_participants integer,
    daysTill_event integer,
    organizer integer REFERENCES organizer NOT NULL,
    CONSTRAINT availableSeats 
    CHECK(maxNum_participants IS NULL 
        OR maxNum_participants < maxNum_participants)
);

CREATE TABLE ParticipantPackage (
    name text,
    event integer REFERENCES event,
    price integer NOT NULL,
    features text NOT NULL,
    maxNum_participants integer,
    PRIMARY KEY(name, event)
);

CREATE TABLE PartnerPackage (
    name text,
    event integer REFERENCES event,
    perks text NOT NULL,
    PRIMARY KEY(name, event)
);

CREATE TABLE SponsorPackage (
    name text,
    event integer REFERENCES event,
    financialSupport_range_min integer NOT NULL,  
    financialSupport_range_max integer NOT NULL,
    perks text NOT NULL,
    constraint rangeIsCorrect 
    CHECK(financialSupport_range_min < financialSupport_range_max),
    PRIMARY KEY(name, event)
);

CREATE TABLE Person (
    id integer PRIMARY KEY AUTOINCREMENT,
    name text NOT NULL,
    email text NOT NULL UNIQUE,
    phone_num integer NOT NULL UNIQUE
);

CREATE TABLE Participant(
    id integer PRIMARY KEY REFERENCES Person,
    address text NOT NULL,
    vat_num integer NOT NULL UNIQUE,
    paymentValidation_status text DEFAULT 'not paid',
    package text,
    event integer,
    FOREIGN KEY(package, event) REFERENCES ParticipantPackage
);

CREATE TABLE Speaker(
    id integer PRIMARY KEY REFERENCES Person,
    event integer REFERENCES event NOT NULL,
    title text NOT NULL,
    profile_pic text NOT NULL,
    talk_subject text NOT NULL, 
    talk_abstract text NOT NULL
);

CREATE TABLE Staff (
    id INTEGER REFERENCES Person PRIMARY KEY,
    event integer REFERENCES event NOT NULL,
    profile_pic text, 
    department text NOT NULL,
    password text NOT NULL,
    subordinates integer REFERENCES Staff,
    hierarchical_superior integer REFERENCES Staff
);

CREATE TABLE Entity(
    id integer PRIMARY KEY AUTOINCREMENT,
    name text NOT NULL UNIQUE,
    logotype text NOT NULL UNIQUE,
    website_link text UNIQUE
);


CREATE TABLE Sponsor(
    id integer PRIMARY KEY REFERENCES Entity,
    financialSupport_amount NOT NULL 
    CHECK(financialSupport_amount > 0),
    paymentValidation_status NOT NULL DEFAULT 'not paid',
    package text NOT NULL,
    event integer NOT NULL,
    FOREIGN KEY(package, event) REFERENCES SponsorPackage
);

CREATE TABLE Partner(
    id integer PRIMARY KEY REFERENCES Entity,
    supportType text NOT NULL,
    package text NOT NULL,
    event intger NOT NULL,
    FOREIGN KEY(package, event) REFERENCES PartnerPackage
);



CHECK (Sponsor.financialSupport_amount >
	SponsorPackage.financialSupport_range_min
    AND Sponsor.financialSupport_amount <   
    SponsorPackage.financialSupport_range_max );