PRAGMA foreign_keys = ON;

CREATE TABLE Organizer (
    id integer PRIMARY KEY REFERENCES Person, 
    password text NOT NULL, 
    logotype text, 
    address text NOT NULL,
    vat_num INTEGER NOT NULL
);
 
CREATE TABLE Event (
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
    email text NOT NULL,
    phone_num integer NOT NULL
);

CREATE TABLE Participant(
    id integer PRIMARY KEY REFERENCES Person,
    address text NOT NULL,
    vat_num integer NOT NULL,
    paymentValidation_status text DEFAULT 'not paid',
    package text NOT NULL,
    event integer NOT NULL,
    FOREIGN KEY(package, event) REFERENCES ParticipantPackage
);

CREATE TABLE Speaker(
    id integer PRIMARY KEY REFERENCES Person,
    event integer REFERENCES event NOT NULL,
    title text,
    profile_pic text,
    talk_subject text NOT NULL, 
    talk_abstract text
);

CREATE TABLE Staff (
    id INTEGER REFERENCES Person PRIMARY KEY, 
    event integer REFERENCES event NOT NULL,
    profile_pic text, 
    department text NOT NULL,
    password text NOT NULL
);

CREATE TABLE Entity(
    id integer PRIMARY KEY AUTOINCREMENT,
    email text NOT NULL,
    name text NOT NULL,
    logotype text,
    website_link text
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
    event integer NOT NULL,
    FOREIGN KEY(package, event) REFERENCES PartnerPackage
);