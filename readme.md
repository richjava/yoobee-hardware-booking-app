Hi,

the complete project is on Github : git@github.com:beshad/yoobee-hardware-booking-app.git

sql file is in the root

usernname and password for DB is root and root

username and password for admin is beshad and 12345
username and password for students is arshia and 12345

i managed to get the calendar retrieving data from DB to work partially, so far. there are the working parts:

1 - the admin CRIUD is fully functional, admin menu only appears when you log in as admin, then you can view, add, update , upload images,
and delete any record from any table. it is using jquery-ui/grocery-crud so unfortunately the styling does not go well with angular material. i
can change it to Angular-Datatables in future if i have to

2 - the angular CRUD for students works. it uses HTTP calls to update the student details. the booking details table for students is also HTPP and
on clientside. tabel is not mobile friendly, not sure why but i can (and have to) fix that soon.

3 - database is cleaned and only have records for admin, student, and products and categories. you can start with a clean sheet and
book any device you have selected for any  days/periods. as we discussed it is only working one day so you can not return to a previous stage
to edit. an email is sent automatically to any email address containing any HTML we want after the order completion.

4 - login and sign up are fully functional and i am very pleased about them, both client-side and server-side validation, using codeifniter and
angular helpers

5 - the problem is getting the correct data form DB to populate the calendar, i can easily get all teh bookings/devices from DB but that is not
what i need, i only need the old bookings containing the records which match the devices that user is selecting at the current bookingID.
at the moment i can filter the data and get them, kind of. to be honest i have not managed to 100% understand what i am getting back from DB!!!
but i can see it is returning the CORRECT device'S' information, not one by one device. hard to explain but i can show you.

it will be a very smooth fully functional app if i can get this part to work. two way booking process will be easy and swift.

6- i have used BOWER and NPM for everything, i have created a GULPJS file as well which i have been using throughout the project.

7 - the server views are login, register, home and dashboard

8 - angular views are devices, calendar, confirmation, profile and booking (the views and controllers are managed from main.js $stateprovider

i have to delete the node_modules folder because of its size.



