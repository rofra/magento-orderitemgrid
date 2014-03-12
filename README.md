# Sales Order Items Grid
New Grid for viewing the content of the sales/order_item table, the item lines of the orders. It permits you to consult core datas. It allows to you directly save in order items lines custom datas in three custom columns (may be usefull for a tiny ERP).

Module fully configurable from "Configuration > ROFRA Extensions > Sales Order Items Grid"

## Requirements
  * Magento 1.7.0.2 (or higher)
  * Modman for Auto deployment from Git repository

## Installation
  * Install it from Magento connect OR modman
  * Clear all the caches
  * Logout
  * Log in again

If you are using modman, go to System => Configuration => Developer => Template Settings Tab
  Set Allow Symlinks to "Yes"

## How to Use
A new entry in "Sales" menu will appear as "Order Items".
A new tab is available in System > Configuration > ROFRA Extensions where you can customize your tabs options.

For Extra columns (Columns 1 to 3), autosaving is available on Blur Event, for saving you can
  * Type "Enter" 
  * Click on any other part of the page

## License

   Copyright 2014 Rodolphe Franceschi

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
