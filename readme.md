# passerlist



screenshots:

https://i.imgur.com/wmT5Qkn.png

https://i.imgur.com/eSD7s8U.png

https://i.imgur.com/dTmI9Jg.png

https://i.imgur.com/wb93AUJ.png



1. Grab data coming from http://www.pshs.edu.ph/nce2018/ and import the data into a MySQL table named Passers

########

Used goutte, but I have difficulties in putting the data in an array to be inserted in the seeder class. Because it is time consuming already, I have used an alternative solution instead. I scraped the site using a browser extension named 'Web Scraper' and I individually gathered data for each column and placed it on a csv file with semi-colon(;) delimeter.

I have used the csv file on my seeder class

https://i.imgur.com/PiDuVHZ.png

##########

2. Create a simple single page web app using Laravel, Bootstrap and Vuejs where the passers data are listed alphabetically.  Paginate the data by 50 records


#######

I had trouble in doing npm install because of an error. I have to install an older version of webpack for this to work
https://github.com/xtuc/webassemblyjs/issues/486#issuecomment-464476902

#######

3. Create a search feature that can search by name, school or division. Search must use fulltext search or any approach that can return results base on relevancy.

#######

#######

4. Add a feature that can add an entry to the examinee table. No need for edit and delete.

#########

#########


Bonus
5. Create another page that will list school names and the number of passers.  Order of the list must be most passers descending. List example:
      Ateneo de Manila           23
      Holy Infant College     20

#######
#######
