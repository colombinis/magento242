# Goal create a new customer section
reference module Magento_Customer

### Steps add new tab customer section

* create new module e.g Sacsi_Newtabcustomer
* create new Customer Account layout e.g Sacsi/Newtabcustomer/view/frontend/layout/customer_account.xml
* create new frontend route e.g Sacsi/Newtabcustomer/etc/frontend/routes.xml
* create action for new tab action e.g sacsicustomer/newtabcustomer/
* create a new layout for the new controller e.g. Sacsi/Newtabcustomer/view/frontend/layout/sacsicustomer_newtab_index.xml
* create new phtml files defined in layout Sacsi/Newtabcustomer/view/frontend/templates/newtab/grid.phtml
* create a new view_model for new phtml e.g Sacsi/Newtabcustomer/ViewModel/Productos.php
* create controller for ajax call and json response e.g Sacsi/Newtabcustomer/Controller/Newtab/Productos.php

* NOTES
1) for frontend form validations there are use https://devdocs.magento.com/guides/v2.4/frontend-dev-guide/validations/custom-form-validation.html

2) In controller Ajax use Repository to search products
