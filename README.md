# KNP Taste

KNP Taste is a fake project to help us know which field you master the most. This is not a test. There is no trap. Feel free to explore technos you are not confortable with.

It will force you to learn some new tools quickly and use them in a very basic context.

`/!\` **Please follow our [GUIDELINES](GUIDELINES.md)** very very carefully.

## Context

KNP Taste is a free online learning platform for cooks launched at KNP. An admin publishes tutoring videos for cooking. The target market is PHP developers who have problems with cooking.

## Expressed needs

* Courses are composed by a name and a youtube video
  * We don't ask you to create an admin section to create them.
  * They should just be created via fixtures (dev environment) or via `Given` steps (Behat test environment)
* A user can register (email, password, username)
* A user can sign in (email, password)
* To be able to view a course page, a user has to be signed in and:
  * be an admin
  * OR have viewed less than 10 courses (different or not)
  * OR have waited a given time (say 1 day, but it should be a configuration option in `parameters.yml`) since its last view of a course - if he has already viewed more than 10 courses.
* In all other cases, the user only sees a page with the name of the course, but no video

## Extended needs

* Connected users can create a new course (only once a day to prevent flooding) ;
* Connected users can report a course for inapropriate content (just a button to click) ;
* Admins can list all reported courses (ordered by most recent report first) ;
* Admins can unpublish (no delete) a course so regular users could not see it anymore. Or mark a report as "false alert" ;
* When an admin archive/unpublish a course it add **1** reputation point to all user who reported it and remove **10** reputation points to the author ;
* When an admin mark a report as "false alert", the user (the reporter one) lose **1** reputation point ;
* Admins can list all users (ordered my most points first) ;
* Where a user has **50** or more reputation points, he can submit an application to become an admin (must be motivated) ;
* Admins can list all applications and vote for each one (`yes`, `no`, `abstain`) ;
* **7** days after the application submission, the application is granted if `yes` represents **2/3** of expressed votes. It's denied otherwise ;
* User cannot submit another application before **30** days since last closed application ;
* Admins cannot submit application ;
* Each rule with reputation points amount or vote should be configurable througth static file ;

## Expected delivery

Here are some expected milestones. Make sure to check your work regularly with someone before going further. Feel free to adapt this suggestion to a more relevant one.

### Planning

Before jumping into your favorite IDE :

* Plan your work by identifying entities/features/constraints ;
* Describe the git workflow you will use during the project ;
* Identify the docker services you will need for this project ;

At the end of this step, you should have a clear vision of what has to be done and how to lead this projet.

### Bootrapping

* Create a new public repository from your dashboard then send the link to the Slack channel [#team-mentoring](https://knplabs.slack.com/archives/C01533HBTRA) ;
* Create the docker stack you will use for this project accordingly to what you previously identified ;
* Bootstrap Symfony with a base project ;
* Make your first Pull Request with what you have done so far ;

At the end of this step, you whould be able to go to `http://localhost` and see the default Symfony page.

### Entities

* Create your entities accordingly to what you previously identified ;
* Configure the mapping between your entities properties and the database ;
* Create/Execute a Doctrine migration ;
* Create some fixtures (with `doctrine/doctrine-fixtures-bundle` or `nelmio/alice`) to fill your base with fake data ;
* Make a PR ;

At the end of this step, you should be able to restore your database to and empty state, or with fake data (an additionnal).

### Features

* Code your features accordingly to what you previously identified ;
* Test your classes with `phpspec` and functionnalities with `behat` (you can use some equivalent like `phpunit` but keep in mind that most projects at KNP use `phpspec`, so it's a good opportunity to start using it) ;
* Make a PR for each feature you estimate complete ;

At the end of each PR, you should be able to show a feature that fits with the expressed needs ;

Remember to follow these [development guidelines](GUIDELINES.md) for this project ;

## License

This project is the property of KNP International GmbH.  
You are not authorized to share it, and are expected to delete your own repository at the end of the application process.

## Thanks

Thank you for taking the time to do this little challenge!
