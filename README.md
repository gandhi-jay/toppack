# TopPack Github Application

Devs @ TapClicks are trying to figure out which JavaScript libraries are currently trending in the market. Instead of just Googling and trusting some *random* blog’s opinions, they decided to build the TopPack app to help them see some real numbers.

TopPack app helps developers search GitHub for interesting JavaScript projects, find what libraries these projects use and show what are the most popular ones among them. The user can then choose to import the projects he likes. Our app has a cool feature that it detect all the top libraries used in the interested projects. This helps our developer find which libraries are behind the success of these other projects. 


## Install the Application

Create .env file before starting any development or deployment.

To run the application in development, you can run these commands 

	cd toppack
	php composer.phar start
	
or install Composer globally, for mac

    sudo mv composer.phar /usr/local/bin/composer

Run this command in the application directory to run the test suite

	php composer.phar test

That's it! Now go build something TopPacks.
