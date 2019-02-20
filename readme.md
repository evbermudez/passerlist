# passerlist



screenshots:

https://i.imgur.com/wmT5Qkn.png

https://i.imgur.com/eSD7s8U.png

https://i.imgur.com/dTmI9Jg.png

https://i.imgur.com/wb93AUJ.png

https://www.youtube.com/watch?v=aTDDHSMQyeQ&feature=youtu.be

# exam instructions

1. Grab data coming from http://www.pshs.edu.ph/nce2018/ and import the data into a MySQL table named Passers



Used goutte, but I have difficulties in putting the data in an array to be inserted in the seeder class. Because it is time consuming already, I have used an alternative solution instead. I scraped the site using a browser extension named 'Web Scraper' and I individually gathered data for each column and placed it on a csv file with semi-colon(;) delimeter.

I have used the csv file on my seeder class

https://i.imgur.com/PiDuVHZ.png



2. Create a simple single page web app using Laravel, Bootstrap and Vuejs where the passers data are listed alphabetically.  Paginate the data by 50 records



I had trouble in doing npm install because of an error. I have to install an older version of webpack for this to work
https://github.com/xtuc/webassemblyjs/issues/486#issuecomment-464476902



3. Create a search feature that can search by name, school or division. Search must use fulltext search or any approach that can return results base on relevancy.



4. Add a feature that can add an entry to the examinee table. No need for edit and delete.




Bonus
5. Create another page that will list school names and the number of passers.  Order of the list must be most passers descending. List example:
      Ateneo de Manila           23
      Holy Infant College     20






# Requirements

- AMPPS, WAMP, XAMPP or MAMP (Optional)
- Homestead (Recommended)
- Composer 1.6.5
- PHP 7.2.7
- NodeJS - node v10.5.0 (npm v6.1.0) or Higher

# How to set up

- Run composer install
- Run php artisan key:generate
- Run npm install to install npm packages
- Run npm run dev to compile assets

# Database Setup

- create database "passers" using your SQL client (HeidiSQL, etc.)
- Run "php artisan migrate" to execute outstanding migrations
- Run "php artisan db:seed"



# Setup Homestead
Download
VirtualBox 5.2.12
Vagrant 2.1.2
Installing The Homestead Vagrant Box
Once VirtualBox and Vagrant have been installed, you should add the laravel/homestead box to your Vagrant installation using the following command in your terminal. It will take a few minutes to download the box, depending on your Internet connection speed:

$ vagrant box add laravel/homestead
# Installing Homestead
You may install Homestead by simply cloning the repository. Consider cloning the repository into a Homestead folder within your "home" directory, as the Homestead box will serve as the host to all of your Laravel projects:

$ cd
$ git clone https://github.com/laravel/homestead.git Homestead
$ cd Homestead
Once you have cloned the Homestead repository, run the bash init.sh command from the Homestead directory to create the Homestead.yaml configuration file. The Homestead.yaml file will be placed in the Homestead directory:

For Mac / Linux:
   $ bash init.sh

For Windows:
   $ init.bat

# Configuring Homestead
The folders property of the Homestead.yaml file lists all of the folders you wish to share with your Homestead environment. As files within these folders are changed, they will be kept in sync between your local machine and the Homestead environment. You may configure as many shared folders as necessary:
```
ip: "192.168.10.10"
memory: 1024
cpus: 1
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    -
    map: '~\Projects\web\laravel\passerlist'
    to: /home/vagrant/code

sites:
    -
    map: passerlist.com
    to: /home/vagrant/code/public

databases:
    - passers
name: passerlist
hostname: passerlist
```

# extra notes for homestead

I followed this tutorial to set up my homestead:

https://www.youtube.com/watch?v=rs2Hzx4qBm8

```
 composer create-project --prefer-dist laravel/laravel passerlist
 cd passerlist
 composer require laravel/homestead --dev
 vendor/bin/homestead make
 ssh-keygen  -t rsa -C "youremail@test.com"
 vagrant up
```

# The Hosts File
You must add the "domains" for your Nginx sites to the hosts file on your machine. The hosts file will redirect requests for your Homestead sites into your Homestead machine. On Mac and Linux, this file is located at /etc/hosts. On Windows, it is located at C:\Windows\System32\drivers\etc\hosts. The lines you add to this file will look like the following:

192.168.10.10  passerlist.com

Launching The Vagrant Box
Once you have edited the Homestead.yaml to your liking, run these command from your Homestead directory:

$ vagrant up



