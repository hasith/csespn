#!/bin/bash          
echo Start Executing SQL commands
PWD="intel@123"
mysql -u root -p< csespn.sql
echo $PWD