> The shopping cart applocation

* application that illustrates the use of sesion variables.

* Without session tracking, the code for this applocation would be much more complicated.
  
# The user interface

![Screenshot](img/add.png)

* Figure shows the user interface for the shopping Cart application. This application consists of two pages: the Add Item page and the Cart page.

* The add Item page allows the useers to add an item to the cart. In addition, it includes a link that allows the user to view the cart without adding item.

* The cart page displays all items in the user's cart along with a subtotal. From this page, the user can update the quantities for the items in the cart by changing the quantity and clicking the Update button. Or, the user can remove an item by changing the quantity to 0 and clicking the Update button. To add more items, the user can click on the Add Item link to return to the Add item page. Or, to remove all items from the cart, the user can click on the empty Cart link.

# The controller

### view the code of controller in index.php

* this code is stored in the index.php file. This file uses the functions in the **cart.php** file to add items to the cart and to update the items in the cart. In addition, it uses the **add_item_view.php** and **cart_view.php** to display the Add Item page and the Cart page.

* The controller begins by starting a session. Here, the first two statements use the **session_set_cookie_params** function to create a session that persists for two weeks. As a result, if the user closes the browser and returns within tw weeks, the user can continue his or her session.

* After starting the session, the code checks whether the cart array is empty in the $_SESSION array. if so, this code creates an empty array to store the cart. this code uses a key of **cart12** to access the cart in the $_SESSION array.

* after initializing the cart, this code will creates a multi-dimensional array of products.

* After creating a table of products, the controller loads the **cart.php** file. This file contains functions for working with cart array. These functions can add a new item to the cart or update the quantity of an existing item.

* After including the cart function, the controller gets the action to be performed based on the action parameter of the **POST** or **GET** request. if the action parameter hasn't been set, this code uses a default action of **show_add_item**.

* After getting the action, the controller uses a switch statement to perform the action. if the action is add, this code retrieves the new product key quantity from the POST request and passes it to the **add_item** fct, which add item to the Cart. Then, this case displays the Cart page.


# The model
* the **cart.php** file show the code that models the behaviours of the shopping cart. This code defines 3 fcts. thes fcts let you add an itel to the cart, update an item in the cart, and get the subtotal for the items in the cart.

## add_item()
* The add_item function takes an item key and quantity as its parameters and uses them to add specified item to the cart. To start, this code gets access to the global products array. Then, it checks if the quantity is less than 1. If so, this code exits the function.

* if the item isn't already in the cart, the add_item function gets the cost of the item from the product array and calculate the total for the item. Then, it creates an array that contains the item's name, cost , quantity, and total. Next, it stores the item array in the cart array using the item's key as the index.

# the Add Item view

* the add_item_view.php shows the code for the Add Items page. This page displays a form that lets the user add an item to the cart by selecting a product and a quantity for that item. In addition, this page displays a link that lets the user view the cart without adding an item.

* The form uses The **POST** method to submit the data back to the index.php controller for processing. This form includes a hidden field with a name of **action** and a value of **add** to indicate that the controller should add the item to the cart. 

* The first <select> tag has a name of **productKey**. this tag lets the user select a product from a dop-down list. Whithin this tag, the **PHP** code uses a foreach loop to generate the <option> tags for the drop-down list. At the begining of the loop, this code formats the cost of each item as a number with two digits, and it uses the item name and formatted cost to generate the text to display for the item.

* Whithin the loop , this code sets the value of the <option> tag to the key for the product. As a result, the key for the selected product is submitted to the the controller. This code sets the text for the <option> tag to a string that includes the name and cost of the product, so this text is displayed in the drop-down list.
* The second <select> tag has a name of "itemqty". this tag lets the user select the quantity from a frop-down list. This code uses a for loop to generate the <option> tags for the drop-down list. These tags display values from 1 to 10.
* Here, the code uses the index of the loop as both the value that's submitted to the control and the text that's displayed in the drop-down list.
* At the end of the page, the View cart link lets the user go to the Cart View page without adding an item. Here, the href attribute of the <a> tag links to the controller and submits an action parameter of show_cart. As a result, this parameter is passed to the controller as part a Get request. that's why the controller checks both POST and GET requests for the action to perform.

# The cart view
* The cart_view.php file shows the code for the Cart page. the first line of PHP code checks the cart array in session. if the cart doesn't exist or the number of items in the cart is 0, this code displays a message stating that there aren't any items in the cart. otherwise, this code displays the contents of the cart in a table.
* The cart table is contained whithin a form that lets the user update the quantity of each item in the cart. This form uses the POST method and submits the data to the index.php controller for processing. In addition, it contains hidden field with a name of **action** and a value of **update**. This tell the controller to update the quantities in the cart.
* The cart table begins with a row that displays the headers for each of the columns in the table. Whithin this table, the <th> and <td> tags include class attributes. Theses attributes allow the CSS file for this application to control the alignment of the text in these columns.

* This form uses a foreach loop to display each item in the cart. to start, the top of the the loop formats the item's cost a and total as a number with two digits
