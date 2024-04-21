echo "# laravel_10" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin git@github.com:snehasur/laravel_10.git
git push -u origin main
============================
Student Management System in laravel
Day1 - 
1. Install laravel 
 - composer create-project laravel/laravel:^10.0 laravel_10
 - cd example-app 
 - php artisan serve
2. Link the db with laravel folder
3. Create student module
 create controller
 php artisan make:controller adminstudent -r
 php artisan make:migration create_students_table
4. Create model
 php artisan make:model student -m
5. create migration file for students
6. form validtion in student page
9. send values from student page to database
10. complete crud with back button and message show(old value show on create,use name route)
Day-2
php artisan make:migration add_field_to_students_table --table=students
php artisan make:model TeacherController -mcr
php artisan make:middleware CheckStudentAuthentication





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