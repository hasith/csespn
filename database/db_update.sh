#!/bin/bash          
echo Start Executing SQL commands
PWD="intel@123"
mysql -p -u root < csespn.sql
echo $PWD