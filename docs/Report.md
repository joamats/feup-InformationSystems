# **cBooking** Development Report 

Welcome to the documentation pages of **cBooking**.

This project consists of the development of a small dynamic website, using the technologies studied during Systems Engineering Software.

You can find here detailed documentation about **cBooking**:

  * [Product Vision](#Product-Vision)
  * [Description of the Topic](#Description-of-the-topic)
  * [UML Classes Diagram](#UML-Classes-Diagram)
  * [Relational Model of the Database](#Relational-Model-of-the-Database)
  * [User Stories](#User-Stories)
  * [UI Mockups](#UI-Mockups)
  * [Project Management](#Project-Management)

The most recent versions of Topic Description, UML Classes Diagram, and Relational Model of the Database are updated here.


  ## Product Vision
  Most event organizers are faced with the need to work with loads of different technologies for the management of people and entities who participate in their events. **cBooking** gathers it all in a single plataform, providing the organizer with tools to register, track and manage whoever is going to participante in their event.

  ## Description of the Topic
  A tech company wants to create a platform to automate the management of conferences. The platform is expected to announce events and support the logistics of conferences, by allowing the registration of participants, speakers, partners, sponsors and staff. Taking these features in consideration, the company elaborated the following list of requirements:

* The website must have a public interface, for announcement of events and registration, and a private one, exclusive for the event organizer and staff members, for management of the conference.
    
* The private interface must display relevant data, such as payments tracking, and lists of participants, speakers, staff, sponsors, partners. 

* The **organizer** must have a name, email, password, address, and VAT number. A logotype is optional. A unique identifying number should be generated to each one of them.

* Each organizer can create as many events as wished. 

* Each **event** must have an organizer, name, date, location, theme, price range, (current) number of participants. A maximum number of participants can also exist, as well as an image for description. A unique identifying number should be given to each event

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

* Upon registering in an event, each speaker, partner and staff member will have to insert a pre-defined and exclusive code, according to the role, provided by the organizer.

* If an event is deleted, all the associated classes must be deleted too, except the organizer.

* The public announcement of the event should include a list of speakers, staff, validated sponsors and partners, as well as the date, location and available registration packages.

* As an extra, it would be nice to have a public interface with a search feature implemented, with the possibility of looking for all existing events, sorted by theme, organizer, speaker, dates, localization and price range.

## UML Classes Diagram

The editable diagram can be found [here](https://app.diagrams.net/?fbclid=IwAR1a7G6Dzc8LV772jwXzXuobzEi9GBw6hw7QulK5O39BuPO0flrY2Vo14QI#Hjoamats%2FProjetoESIN%2Fmain%2Fdocs%2Fdrawio%2FUML%20Classes).

![UML-Classes-Diagram](docs/UML-Classes.png)

# Relational Model of the Database

**Organizer**(ID_num, name, email, password, logotype, address, VAT_num )

NOT NULL(name, email, password, address, VAT_number)

UNIQUE(email, VAT_number)

**Event**(ID_num, name, date, local, theme, price_range_min, price_range_max, num_participants, maxNum_participants, daysTill_event, image, codeForSpeakers, codeForStaff, codeForPartners, organizer -> Organizer)

NOT NULL( name, date, local, theme, price_range_min, organizer)

UNIQUE ( codeForSpeakers, codeForStaff, codeForPartners )

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


## User Stories

| Description |  Importance | Effort |
| :------------- | :----------: | :-----------: |
| As an organizer, I want to be able to announce  my event, defining all the details for it, so that whoever will be involved in it can register himself. | Must Have | L | 
| As a cBooking user, I want to see all the existing events, so that I can register in the ones I am interested in. | Must Have | XL |
| As a cBooking user, I want to be able to select the role I will take in an event, so that I am treated accordingly to my role in the event, and I can provide the event organizer with relevant information. | Must Have | M |
| As an organizer, I want Speakers, Partners and Staff to enter a code (provided by the organization), upon registration, so that only authorized persons and entities can register in my event. | Must Have | S |
| As an organizer, I want to be able to define registration packages for participants, sponsors and partners, so that different prices, features and perks can be applied to different persons or entities. | Must Have | S |
| As a cBooking user, I want to see the details about each event, namely date, location, available registration packages, featured speakers, staff, validated sponsors and partners, so that I can be better informed. | Must Have | XL | 
| As a cBooking user, I want to search events, sorted by a specific detail, so that I can easily find events that I like. | Should Have | S | 


## UI Mockups

User Interface Mockups were developed to plan the website's design, using Adobe XD.

![](docs/uiMockups/índex-cbooking.png)
![](docs/uiMockups/about-philosophy.png)
![](docs/uiMockups/about-contacts.png)
![](docs/uiMockups/events.png)
![](docs/uiMockups/events-details.png)
![](docs/uiMockups/events-roleSelection.png)
![](docs/uiMockups/events-Person-EntityCreation.png)
![](docs/uiMockups/events-FinalRegistrationCreation.png)
![](docs/uiMockups/events-Confirmation.png)
![](docs/uiMockups/createEvent.png)
![](docs/uiMockups/createEvent-corporateDetails.png)
![](docs/uiMockups/createEvent-Confirmation.png)
![](docs/uiMockups/signIn.png)
![](docs/uiMockups/signIn-ConferenceDashboard.png)

## Project Management

The flow of work of this project is being done with the tool GitHub Projects. The board with tasks can be found [here](https://github.com/joamats/ProjetoESIN/projects/1).

The logic behing the flow followed was suggested by Prof. João Silva, synthetised in the following diagram.

<br> </br>

![](docs/project_management_ProfJoaoSilva.png)


