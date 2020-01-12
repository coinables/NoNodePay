# NoNodePay
 Simple Bitcoin Shopping Cart No Node


# Accept Bitcoin For Free   #
#   No Node Required        #
# Open Source Shopping Cart #

# Step By Step Video Installation How To
https://www.youtube.com/watch?v=jBUnOFxe24s

I have created this shopping cart that will allow users to accept bitcoin on their website without having to use a privileged API service. 
This project does use some public API's to check the blockchain but they require no permission or API Keys. 


1. Download the files in the repository
2. Create and configure a database on your webserver (How to: http://www.fastcomet.com/tutorials/cpanel/create-database)
3. Import the included SQL database files using PHPmyadmin or similar database manager (How to: https://www.namecheap.com/support/knowledgebase/article.aspx/9143/29/how-to-import-and-export-database-in-cpanel-access-denied-create-database-dbname-error-and-how-to-fix-it
4. Open the config.php file and update the fields
5. Pre-generate 1,000 (or more) address using the tool in /js/addresses.html. Copy the output table and paste into a spreadsheet. Save as an Open Spreadsheet document.
6. Save a copy with the private keys offline, and save another copy to be imported to the database that has the private key column removed. The index or address of an order can later be used to track down the corresponding private key on the offline copy. 

That's it!

Access the admin panel to manage your orders and products with login.php
The password to access the admin page is set in your config.php
