# KNP Development Guidelines

The following guidelines should be carefuly met.
Even if you don't think they're the best, now is not the right time to show it.

## Docker

* You are free to use docker or not. Don't spend to much time by configuring docker if you are not confortable with it.

## Questions?

* Questions should be asked through the Github Issues of this repository. Keep in mind however that this is a dummy project, so the project details are not that important ;

## Symfony

* Make a fresh install of symfony with the currently supported version (https://symfony.com/releases)
See https://symfony.com/doc/current/setup.html#creating-symfony-applications if needed
* You can follow [our article](https://knplabs.com/fr/blog/how-to-dockerise-a-symfony-4-project) to install docker and Symfony alongside.

## Behat

* Features that provide user value should be tested in a [Behat scenario](http://behat.org/)

* Behat scenarios should not use global fixtures, but rather recreate the minimalist environement for the scenario.

* A Behat scenario should be as readable as possible by a project manager/product owner/customer => focus on the business value, not the implementation details

## Depencencies

* Feel free to add dependencies. But remember, this is a project, not a food factory (so forget FOS products or Sonata).

## Logic

* Logic should be done in services, not in models, not in controllers. Services should be specced with [phpspec](http://phpspec.net/)

* It is not required to spec obvious stuff like getters/setters!

## Testing

* You have to test components which need to be tested. Too many tests are worst than no tests at all.

## Conventions

* Code should follow Symfony2 conventions. Any obvious misuse of these conventions (tabulations, coding style, trailing spaces) will be frown upon and show that you're not really a Symfony2 coder. That would be a shame.

## Fixtures

* You should provide fixtures to demo your code in a dev environment. Please use [Alice](https://github.com/nelmio/alice) to do so.

## README

* Your README file should contain useful **basic** infos to get the project running. It should be written in proper english.

## Git

* Do not commit generated files that have no place in your project.

## HTML

* Do not spend any time on HTML - we won't probably launch your site on a server, and won't look at it. Rather do the minimum that shows that the feature is working.

## KISS

* It is always good to Keep It Simple. The best solution is the simplest solution that still works.

## Done?

* Always start by self-review your code before submitting it to us!
