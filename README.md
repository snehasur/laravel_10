echo "# laravel_10" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin git@github.com:snehasur/laravel_10.git
git push -u origin main
============================
Ep35 - Booking system in laravel
1. Install laravel 
 - composer create-project laravel/laravel book2 "8.6.3"
 - composer require laravel/ui 
 - php artisan ui bootstrap --auth
 - npm install && npm run dev
 - npm run dev
2. Link the db with laravel folder
3. understanding route in laravel - login and register file
4. Convert login, register, book - html template to laravl blade
5. create 2 controller for frontend and backend
 php artisan make:controller frontend -r
 php artisan make:controller backend -r
Day2 - 
6. Create model
 php artisan make:model customer -m
7. create migration file for customers
8. form validtion in register page
9. send values from registr page to database
10. after successfull acount creation - open login page
11. check values of form of login page
12. create session variable if login is correct and send user to dashboard
13. create a middleware to restrict access to dashboard
 php artisan make:middleware CheckCustomerAuthentication
14. Create logout function
        Session::forget('customer_id');
Day 3
15. show book now button only to logged in user
16. if user logged in show dashboard and book now button
17. if user not logged in show login and register button
18. create model called book
 php artisan make:model book -m
19. validation for book form and send book data to database
20. Get the data from session and insert values to book table
21. create a new page for "show all request" in dashboard

Day 4
22. create new column custid and status in book tablr
23. send the customerid to database in book table
24. use the cusid to get data in book table
25. use datatable to display data
26. create new login page for admin
27. insert data in user for admin
28. check for admin credentials
29. create new dashboard page for admin to approve, reject and completed
30. use the update query to update status
31. create logout for admin
32. make requests in desc order
33. create middleware for admin dashboard


34. souvik commit