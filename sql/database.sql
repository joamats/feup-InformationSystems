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
    id integer PRIMARY KEY REFERENCES Person, -- different from UML and relational model
    password text NOT NULL, -- to encrypt later
    logotype text, -- to be a URL or path
    address text NOT NULL,
    vat_num INTEGER NOT NULL UNIQUE
);
 
CREATE TABLE Event ( -- different, derived attributes gone
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name text NOT NULL,
    date_start DATE NOT NULL,
    date_end DATE NOT NULL,
    local text NOT NULL,
    aboutEvent text,
    theme text NOT NULL,   
    image text,
    codeForSpeakers UNIQUE, 
    codeForPartners UNIQUE, 
    codeForStaff UNIQUE,    
    organizer integer REFERENCES organizer NOT NULL
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
    email text NOT NULL, -- different from current UML and stuff
    phone_num integer NOT NULL -- different """"""
);

CREATE TABLE Participant(
    id integer PRIMARY KEY REFERENCES Person,
    address text NOT NULL,
    vat_num integer NOT NULL, -- different!!
    paymentValidation_status text DEFAULT 'not paid',
    package text,
    event integer,
    FOREIGN KEY(package, event) REFERENCES ParticipantPackage
);

CREATE TABLE Speaker(
    id integer PRIMARY KEY REFERENCES Person,
    event integer REFERENCES event NOT NULL,
    title text NOT NULL, --NOT NULL should not be here
    profile_pic text NOT NULL,
    talk_subject text NOT NULL, 
    talk_abstract text NOT NULL --NOT NULL should not be here
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
    name text NOT NULL, -- different
    logotype text NOT NULL, -- different
    website_link text -- different
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



-- CHECK (Sponsor.financialSupport_amount >
-- 	SponsorPackage.financialSupport_range_min
--     AND Sponsor.financialSupport_amount <   
--     SponsorPackage.financialSupport_range_max );
