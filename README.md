# **cBooking** Development Report 

Welcome to the documentation pages of **cBooking**.

This project consists of the development of a small dynamic website, using the technologies studied during Systems Engineering Software.

You can find here detailed documentation about **cBooking**:

  * [Product Vision](#Product-Vision)
  * [Description of the Topic](#Description-of-the-topic)
  * [UML Classes Diagram](#UML-Classes-Diagram)
  * [Relational Model of the Database](#Relational-Model-of-the-Database)
  * [Website Map Diagram](#Website-Map-Diagram)
  * [User Stories](#User-Stories)
  * [UI Mockups](#UI-Mockups)

<br></br>

  ## Product Vision
  Most event organizers are faced with the need to work with loads of different technologies for the management of people and entities who participate in their events. **cBooking** gathers it all in a single plataform, providing the organizer with tools to register, track and manage whoever is going to participante in their event.

<br></br>

  ## Description of the Topic
  A tech company wants to create a platform to automate the management of conferences. The platform is expected to announce events and support the logistics of conferences, by allowing the registration of participants, speakers, partners, sponsors and staff. Taking these features in consideration, the company elaborated the following list of requirements:

* The website must have a public interface, for announcement of events and registration, and a private one, exclusive for the event organizer and staff members, for management of the conference.
    
* The private interface must display relevant data, such as payments tracking, and lists of participants, speakers, staff, sponsors, partners. 

* The **organizer** must have a name, password, address, and VAT number. A logotype is optional. A unique identifying number should be generated to each one of them.

* Each organizer can create as many events as wished. 

* Each **event** must have an organizer, date, location, theme, price range, and (current) number of participants. A maximum number of participants can also exist. A unique identifying number should be given to each event.

* If existent, the maximum number of participants must be higher than the (current) number of participants.

* The event can have as many registration packages as wished, for participants, sponsors, and partners

* Each **participant package** must be associated with an existing event, and have a unique name, price, and features. A maximum number of participants per package is optional.

* Each **sponsor package** must be associated with an existing event, and have a unique name, range of financial support (minimum and maximum values), and associated perks.

* Each **partner package** must be associated with an existing event, and have a unique name and associated perks.


* When it comes to registration, there are 3 different roles for **persons**: participant, speaker, and staff. Each person must have a unique identifying number, name, email, and phone number.

* For the registration of supportive entities, there are 2 types of **entity**: sponsor and partner. Each entity must have a unique identifying number, name, logotype. A website link may be inserted.

* Additionally, each:

    * **participant** must be associated with an existing event and have an address, a VAT number, and a chosen package. If the event is paid, a payment validation status attribute is created, set not paid as default.

    * **speaker** must be associated with an existing event and have a title, profile picture, subject of talk, and abstract.

    * **staff** member must be associated with an existing event and have a department and a password. A profile picture, existence of subordinates, and hierarchical superior are optional. 

    * **sponsor**  must be associated with an existing event, have a chosen package, a financial amount of support, and a payment validation status (initialized as not paid). The financial amount of support must be according to the chosen package.

    * **partner** must be associated with an existing event, have a chosen package, and a support type.


* If an event is deleted, all the associated classes must be deleted too, except the organizer.

* The public announcement of the event should include a list of speakers, staff, validated sponsors and partners, as well as the date, location and available registration packages.

* As an extra, it would be nice to have a public interface with a search feature implemented, with the possibility of looking for all existing events, sorted by theme, organizer, speaker, dates, localization and price range.

<br></br>

## UML Classes Diagram

The editable diagram can be found [here](https://app.diagrams.net/?fbclid=IwAR1a7G6Dzc8LV772jwXzXuobzEi9GBw6hw7QulK5O39BuPO0flrY2Vo14QI#Hjoamats%2FProjetoESIN%2Fmain%2FUML%20Classes).

![UML-Classes-Diagram](docs/UML_Classes.png)

<br></br>
# Relational Model of the Database

**Organizer**(ID_num, name, password, logotype, address, VAT_num )

NOT NULL(name, password, address, VAT_number)

UNIQUE(VAT_number)

**Event**(ID_num, date, local,  theme, price_range_min, price_range_max, num_participants, maxNum_participants, daysTill_event, organizer -> Organizer)

NOT NULL( date, local, theme, price_range_min, organizer)

DEFAULT( num_participants = 0 )

DEFAULT( price_range_min = 0 )

CHECK( price_range_min >= 0 )

CHECK( price_range_max = null OR price_range_max > price_range_min)

CHECK( maxNum_participants = null 
OR num_participants < maxNum_participants )

**ParticipantPackage**(name, event -> Event, price, features, maxNum_participants)

NOT NULL(price, features)

**PartnerPackage**(name, event -> Event, perks)

NOT NULL(perks)

**SponsorPackage**(name, event -> Event, financialSupport_range_min, financialSupport_range_max , perks)

NOT NULL(financialSupport_range_min,  financialSupport_range_max, perks)

CHECK ( financialSupport_range_min > financialSupport_range_max)

**Person**(ID_num, name, email, phone_num)

NOT NULL(name, email, phone_num)

UNIQUE(email, phone_num)

**Participant**(ID_num -> Person, address, VAT_num, paymentValidation_status, package-> ParticipantPackage, event -> ParticipantPackage)

NOT NULL ( address, VAT_num, package, event )

UNIQUE (VAT_number)

DEFAULT ( paymentValidation_status = ‘not paid’)

**Speaker**(ID_num -> Person,  event -> Event, title, profile_pic, talk_subject, talk_abstract)

NOT NULL(event, title, profile_pic,  talk_subject, talk abstract)

**Staff**(ID_num -> Person, event -> Event, profile_pic, department, password, subordinates -> Staff, hierarchical_superior -> Staff )

NOT NULL (event, department, password)

**Entity**(ID_num, name, logotype, website_link)

NOT NULL (name, logotype)

UNIQUE (name, logotype, website_link)

**Sponsor**(ID_num -> Entity, financialSupport_amount, paymentValidation_status, package -> SponsorPackage, event -> SponsorPackage)

NOT NULL (financialSupport_amount, paymentValidation_status, package, event)

CHECK(financialSupport_amount > 0)

DEFAULT ( paymentValidation_status = ‘not paid’)

CHECK ( Sponsor.financialSupport_amount >
	SponsorPackage.financialSupport_range_min
AND Sponsor.financialSupport_amount <   
SponsorPackage.financialSupport_range_max )

**Partner**(ID_num -> Entity, supportType, package -> PartnerPackage, event -> PartnerPackage)

NOT NULL ( supportType, package, event)

<br></br>

## Website Map Diagram

The editable diagram can be found [here](https://app.diagrams.net/#Hjoamats%2FProjetoESIN%2Fmain%2FWebsite%20Plan.drawio).


![Relational-Model-of-the-Database](docs/Website_Plan.png)

<br></br>

## User Stories

| Description |  Importance | Effort |
| :------------- | :----------: | :-----------: |
| As an organizer, I want to be able to announce  my event, defining all the details for it, so that whoever will be involved in it can register himself. | Must Have | L | 
| As a cBooking user, I want to see all the existing events, so that I can register in the ones I am interested in. | Must Have | S |
| As a cBooking user, I want to be able to select the role I will take in an event, so that I am treated accordingly to my role in the event, and I can provide the event organizer with relevant information. | Must Have | L |
| As an organizer, I want Speakers, Partners and Staff to enter a code (provided by the organization), upon registration, so that only authorized persons and entities can register in my event. | Must Have | S |
| As an organizer, I want to be able to define registration packages for participants, sponsors and partners, so that different prices, features and perks can be applied to different persons or entities. | Must Have | M |
| As a cBooking user, I want to see the details about each event, namely date, location, available registration packages, featured speakers, staff, validated sponsors and partners, so that I can be better informed. | Should Have | M | 
| As a cBooking user, I want to search events, sorted by a specific detail, so that I can easily find events that I like. | Could Have | S | 

<br></br>

## UI Mockups