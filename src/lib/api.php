<?php
/*
                               _                 _             _                             __ _                
                              (_)               | |           | |                           / /| |               
 _ __ ___  ___ _   _ _ __ _ __ _ _ __   __ _ ___| |_ __ _  ___| | __  ___ ___  _ __ ___    / /_| | ___   ___ ___ 
| '__/ _ \/ __| | | | '__| '__| | '_ \ / _` / __| __/ _` |/ __| |/ / / __/ _ \| '_ ` _ \  / / _` |/ _ \ / __/ __|
| | |  __/ (__| |_| | |  | |  | | | | | (_| \__ \ || (_| | (__|   < | (_| (_) | | | | | |/ / (_| | (_) | (__\__ \
|_|  \___|\___|\__,_|_|  |_|  |_|_| |_|\__, |___/\__\__,_|\___|_|\_(_)___\___/|_| |_| |_/_/ \__,_|\___/ \___|___/
                                        __/ |                                                                    
                                       |___/                                                                     
*/    
namespace recurringstack;

use GuzzleHttp\Client;

//Handles custom exceptions.
require 'ExceptionController.php';

class api {
  
    public function __construct($auth = array()) {

        $this->response_format = strtolower($auth['response_format']);
        $this->key = $auth['key'];
        $this->user_key = $auth['user_key'];
        $this->brand_id = $auth['brand_id'];
        $this->response_type = strtolower($auth['response_type']); //When set to 'clean' it returns PHP object otherwise the raw XML or JSON.
        $this->checkConfiguration();
  
      }


                /****
                 
                ### List/Account

                  ::: List all customer accounts connected to a specific brand or provide any of the search criteria to narrow your results. The maximum number of returned results is 300.
                               

			$clientParameters = array(
			"customer_account_id" => '',
 			"email_address" => '',
 			"first_name" => '',
 			"last_name" => '',
 			"company_name" => '',
 			"custom_field_1" => '',
 			"custom_field_2" => '',
 			"limit" => '',
 			"order" => '',
 			"offset" => '');

                ****/

                public function listAccount($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Account/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Account
            
                              ::: Create a new customer account and associate it with a brand. The initial user will be created based on the information and e-mail address provided.
                                           
            
                        $clientParameters = array(
                        "company_name" => '',
                         "cc_email_address" => '',
                         "phone_number_country_code" => '',
                         "phone_number" => '',
                         "address" => '',
                         "address_2" => '',
                         "unit" => '',
                         "unit_type" => '',
                         "city" => '',
                         "state" => '',
                         "zip_code" => '',
                         "tax_id" => '',
                         "tax_exempt" => '',
                         "tax_exempt_reason" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '',
                         "password" => '',
                         "skip_notification" => '');
            
                            ****/
            
                            public function createAccount($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "timezone_id" => $clientParameters['timezone_id'],
                             "locale" => $clientParameters['locale'],
                             "country" => $clientParameters['country'],
                             "email_address" => $clientParameters['email_address'],
                             "last_name" => $clientParameters['last_name'],
                             "first_name" => $clientParameters['first_name']		);
                            
                            $http = $this->http('POST','Account/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Account
            
                              ::: Update information on an existing customers account.	
                                           
            
                        $clientParameters = array(
                        "company_name" => '',
                         "first_name" => '',
                         "last_name" => '',
                         "email_address" => '',
                         "cc_email_address" => '',
                         "phone_number_country_code" => '',
                         "phone_number" => '',
                         "address" => '',
                         "address_2" => '',
                         "unit" => '',
                         "unit_type" => '',
                         "city" => '',
                         "state" => '',
                         "zip_code" => '',
                         "country" => '',
                         "locale" => '',
                         "timezone_id" => '',
                         "tax_id" => '',
                         "tax_exempt" => '',
                         "tax_exempt_reason" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function updateAccount($customer_account_id,$clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('PATCH','Account/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Suspend/Account
            
                              ::: Suspend a customers account.
                                           
            
                            ****/
            
                            public function suspendAccount($customer_account_id) {
                    
            
                        $req_parameters = array(
                    "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('PATCH','Account/Suspend',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Account
            
                              ::: Delete a customers account.
                                           
            
                            ****/
            
                            public function deleteAccount($customer_account_id) {
                    
            
                        $req_parameters = array(
                    "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('DELETE','Account/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/Account
            
                              ::: Restore a customer account from suspended or deleted.
                                           
            
                            ****/
            
                            public function restoreAccount($customer_account_id) {
                    
            
                        $req_parameters = array(
                    "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('PATCH','Account/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Article
            
                              ::: List one or more library articles using the specified search criteria.
                                           
            
                        $clientParameters = array(
                        "article_id" => '',
                         "category_id" => '',
                         "tags" => '');
            
                            ****/
            
                            public function listArticle($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Article/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Article
            
                              ::: Create a new article in the library under a category or sub category.
                                           
            
                        $clientParameters = array(
                        "summary" => '');
            
                            ****/
            
                            public function createArticle($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "visibility" => $clientParameters['visibility'],
                             "tags" => $clientParameters['tags'],
                             "contents" => $clientParameters['contents'],
                             "title" => $clientParameters['title'],
                             "category_id" => $clientParameters['category_id']		);
                            
                            $http = $this->http('POST','Article/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Article
            
                              ::: Update an existing library article.
                                           
            
                        $clientParameters = array(
                        "summary" => '');
            
                            ****/
            
                            public function updateArticle($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "visibility" => $clientParameters['visibility'],
                             "tags" => $clientParameters['tags'],
                             "contents" => $clientParameters['contents'],
                             "title" => $clientParameters['title'],
                             "category_id" => $clientParameters['category_id'],
                             "article_id" => $clientParameters['article_id']		);
                            
                            $http = $this->http('PATCH','Article/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Article
            
                              ::: Delete a library artcile.
                                           
            
                            ****/
            
                            public function deleteArticle($article_id) {
                    
            
                        $req_parameters = array(
                    "article_id" => $clientParameters['article_id']		);
                            
                            $http = $this->http('DELETE','Article/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/Article
            
                              ::: Restore a library article that's been previously deleted.
                                           
            
                            ****/
            
                            public function restoreArticle($article_id) {
                    
            
                        $req_parameters = array(
                    "article_id" => $clientParameters['article_id']		);
                            
                            $http = $this->http('PATCH','Article/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Brand
            
                              ::: List all of the brands connected to your RecurringStack™ account. Depending on your subscription, one RecurringStack™ account can support up to ten different brands.
                                           
            
                        $clientParameters = array(
                        "search_brand_id" => '',
                         "limit" => '');
            
                            ****/
            
                            public function listBrand($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Brand/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Brand
            
                              ::: Create a new brand or company.
                                           
            
                        $clientParameters = array(
                        "website_url" => '',
                         "website_login_url" => '',
                         "support_email" => '',
                         "support_link" => '',
                         "support_phone" => '',
                         "terms_url" => '',
                         "privacy_url" => '',
                         "social_media_facebook" => '',
                         "social_media_twitter" => '',
                         "social_media_youtube" => '',
                         "social_media_instagram" => '');
            
                            ****/
            
                            public function createBrand($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "logo_url" => $clientParameters['logo_url'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name']		);
                            
                            $http = $this->http('POST','Brand/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Brand
            
                              ::: Update an existing brand. Only pass the parameters you wish to update.
                                           
            
                        $clientParameters = array(
                        "name" => '',
                         "description" => '',
                         "logo_url" => '',
                         "website_url" => '',
                         "website_login_url" => '',
                         "support_email" => '',
                         "support_link" => '',
                         "support_phone" => '',
                         "terms_url" => '',
                         "privacy_url" => '',
                         "social_media_facebook" => '',
                         "social_media_twitter" => '',
                         "social_media_youtube" => '',
                         "social_media_instagram" => '');
            
                            ****/
            
                            public function updateBrand($update_brand_id,$clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "update_brand_id" => $clientParameters['update_brand_id']		);
                            
                            $http = $this->http('PATCH','Brand/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Brand
            
                              ::: Delete an existing brand. This operation is currently non-reversable. If you have customers with subscriptions on the brand their subscriptions will no longer be billed and the brand_id can no longer be used for authentication with the API.
                                           
            
                            ****/
            
                            public function deleteBrand($delete_brand_id) {
                    
            
                        $req_parameters = array(
                    "delete_brand_id" => $clientParameters['delete_brand_id']		);
                            
                            $http = $this->http('DELETE','Brand/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Category
            
                              ::: List all categorys in a brands knowledgebase library.
                                           
            
                        $clientParameters = array(
                        "category_id" => '',
                         "category_type" => '',
                         "parent_category_id" => '',
                         "name" => '',
                         "show_sub_categories" => '');
            
                            ****/
            
                            public function listCategory($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Category/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Category
            
                              ::: Create a primary or sub category in the knowledgebase library.
                                           
            
                        $clientParameters = array(
                        "summary" => '',
                         "parent_category_id" => '');
            
                            ****/
            
                            public function createCategory($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "visibility" => $clientParameters['visibility'],
                             "category_type" => $clientParameters['category_type'],
                             "name" => $clientParameters['name']		);
                            
                            $http = $this->http('POST','Category/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Category
            
                              ::: Update a category.
                                           
            
                        $clientParameters = array(
                        "summary" => '',
                         "parent_category_id" => '');
            
                            ****/
            
                            public function updateCategory($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "visibility" => $clientParameters['visibility'],
                             "category_type" => $clientParameters['category_type'],
                             "name" => $clientParameters['name'],
                             "category_id" => $clientParameters['category_id']		);
                            
                            $http = $this->http('PATCH','Category/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Category
            
                              ::: Delete a category.
                                           
            
                            ****/
            
                            public function deleteCategory($category_id) {
                    
            
                        $req_parameters = array(
                    "category_id" => $clientParameters['category_id']		);
                            
                            $http = $this->http('DELETE','Category/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/Category
            
                              ::: Restore a category from deleted.
                                           
            
                            ****/
            
                            public function restoreCategory($category_id) {
                    
            
                        $req_parameters = array(
                    "category_id" => $clientParameters['category_id']		);
                            
                            $http = $this->http('PATCH','Category/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Component
            
                              ::: List all components or all components nested under the specified 'product_group_id'. If no 'product_group_id' is provided then all components nested under the 'brand_id' will be returned. To retrieve a specific componet provide the 'component_id'. Max results 300.
                                           
            
                        $clientParameters = array(
                        "component_id" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function listComponent($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Component/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Component
            
                              ::: Create a new components. Components are like add-on's for an exsiting product. A customer subscribed to a product will have the ability to add components from the product group of the subscribed product. Components allow you to track usage, charge for additional services, and more. There are three types of components:<b>TRADITIONAL</b>: A traditional add-on that has a set price ('unit_price') and is billed on a recurring basis with the subscription (eg. server backup service for X/month).<b>METERED</b>: Great for services where the amount changes during the billing cycle and resets to zero at the beginning of the next cycle. (e.g. data used for IoT or cloud storage space). You can use the 'Subscription/ReportUsage' API to update the current usage amount at anytime. <b>QUANTITATIVE</b>: Recurring quantity-based components are used to bill for the number of some unit (e.g. IP addresses; SaaS users; or software licenses). Additional units can be added to the subscription at anytime (eg. customer wishes to add IP address to hosting package).
                                           
            
                        $clientParameters = array(
                        "starting_quantity" => '',
                         "maximum_units" => '',
                         "setup_fee" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function createComponent($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "taxable" => $clientParameters['taxable'],
                             "unit_price" => $clientParameters['unit_price'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name'],
                             "product_group_id" => $clientParameters['product_group_id'],
                             "component_type" => $clientParameters['component_type']		);
                            
                            $http = $this->http('POST','Component/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Component
            
                              ::: Update an existing component.
                                           
            
                        $clientParameters = array(
                        "starting_quantity" => '',
                         "maximum_units" => '',
                         "setup_fee" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function updateComponent($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "taxable" => $clientParameters['taxable'],
                             "unit_price" => $clientParameters['unit_price'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name'],
                             "product_group_id" => $clientParameters['product_group_id'],
                             "component_type" => $clientParameters['component_type'],
                             "component_id" => $clientParameters['component_id']		);
                            
                            $http = $this->http('PATCH','Component/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Suspend/Component
            
                              ::: Suspend a component.When a component is suspended it will not be available for adding to a customers active subscription but will continue to be billed for customers already utilizing the component.
                                           
            
                            ****/
            
                            public function suspendComponent($component_id) {
                    
            
                        $req_parameters = array(
                    "component_id" => $clientParameters['component_id']		);
                            
                            $http = $this->http('PATCH','Component/Suspend',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Component
            
                              ::: Delete a component.Deleteting a component makes it unavailable to existing subscriptions and new subscriptions.
                                           
            
                            ****/
            
                            public function deleteComponent($component_id) {
                    
            
                        $req_parameters = array(
                    "component_id" => $clientParameters['component_id']		);
                            
                            $http = $this->http('DELETE','Component/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/Component
            
                              ::: Restore a component.Restore a component from suspend (2) or deletion (3). Components can be restored for up to 90 days.
                                           
            
                            ****/
            
                            public function restoreComponent($component_id) {
                    
            
                        $req_parameters = array(
                    "component_id" => $clientParameters['component_id']		);
                            
                            $http = $this->http('POST','Component/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Coupon
            
                              ::: List coupons connected to a product group or for the entire brand. To list a specific coupon provide a 'coupon_id'.
                                           
            
                        $clientParameters = array(
                        "coupon_id" => '',
                         "product_group_id" => '');
            
                            ****/
            
                            public function listCoupon($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Coupon/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Coupon
            
                              ::: Create a new coupon and assign it to specific products. All coupons must be assigned to a product group, meaning they will only work with products from that group.
                                           
            
                        $clientParameters = array(
                        "restricted_products" => '',
                         "max_use" => '');
            
                            ****/
            
                            public function createCoupon($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "stackable" => $clientParameters['stackable'],
                             "expiration_time" => $clientParameters['expiration_time'],
                             "expiration_date" => $clientParameters['expiration_date'],
                             "discount_amount" => $clientParameters['discount_amount'],
                             "coupon_duration" => $clientParameters['coupon_duration'],
                             "coupon_type" => $clientParameters['coupon_type'],
                             "coupon_code" => $clientParameters['coupon_code'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name'],
                             "product_group_id" => $clientParameters['product_group_id']		);
                            
                            $http = $this->http('POST','Coupon/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Coupon
            
                              ::: Update an existing coupon.
                                           
            
                        $clientParameters = array(
                        "restricted_products" => '',
                         "max_use" => '');
            
                            ****/
            
                            public function updateCoupon($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "stackable" => $clientParameters['stackable'],
                             "expiration_time" => $clientParameters['expiration_time'],
                             "expiration_date" => $clientParameters['expiration_date'],
                             "discount_amount" => $clientParameters['discount_amount'],
                             "coupon_duration" => $clientParameters['coupon_duration'],
                             "coupon_type" => $clientParameters['coupon_type'],
                             "coupon_code" => $clientParameters['coupon_code'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name'],
                             "product_group_id" => $clientParameters['product_group_id'],
                             "coupon_id" => $clientParameters['coupon_id']		);
                            
                            $http = $this->http('PATCH','Coupon/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Coupon
            
                              ::: Delete a coupon.
                                           
            
                            ****/
            
                            public function deleteCoupon($coupon_id) {
                    
            
                        $req_parameters = array(
                    "coupon_id" => $clientParameters['coupon_id']		);
                            
                            $http = $this->http('DELETE','Coupon/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/DunningRule
            
                              ::: List all dunning rules for one or more product groups.
                                           
            
                        $clientParameters = array(
                        "product_group_id" => '');
            
                            ****/
            
                            public function listDunningRule($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','DunningRule/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/DunningRule
            
                              ::: Create a new dunning rule. Dunning rules determine when a subscription is suspended or deleted based on the status of past-due invoices linked to the subscription.
                                           
            
                        $clientParameters = array(
                        "post_url" => '');
            
                            ****/
            
                            public function createDunningRule($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "enforcement_action" => $clientParameters['enforcement_action'],
                             "overdue_amount" => $clientParameters['overdue_amount'],
                             "overdue_days" => $clientParameters['overdue_days'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name'],
                             "product_group_id" => $clientParameters['product_group_id']		);
                            
                            $http = $this->http('POST','DunningRule/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/DunningRule
            
                              ::: Update an existing dunning rule.
                                           
            
                        $clientParameters = array(
                        "post_url" => '');
            
                            ****/
            
                            public function updateDunningRule($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "enforcement_action" => $clientParameters['enforcement_action'],
                             "overdue_amount" => $clientParameters['overdue_amount'],
                             "overdue_days" => $clientParameters['overdue_days'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name'],
                             "product_group_id" => $clientParameters['product_group_id'],
                             "rule_id" => $clientParameters['rule_id']		);
                            
                            $http = $this->http('PATCH','DunningRule/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/DunningRule
            
                              ::: Deletes an pre-existing dunning rule.
                                           
            
                            ****/
            
                            public function deleteDunningRule($rule_id) {
                    
            
                        $req_parameters = array(
                    "rule_id" => $clientParameters['rule_id']		);
                            
                            $http = $this->http('DELETE','DunningRule/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Invoice
            
                              ::: List all invoices connected to a specific brand or provide any of the search criteria to narrow your results. The maximum number of returned results is 50. If a 'customer_account_id' or 'subscription_id' are provided a maximum of 400 results is returned.
                                           
            
                        $clientParameters = array(
                        "invoice_id" => '',
                         "customer_account_id" => '',
                         "subscription_id" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function listInvoice($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Invoice/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Invoice
            
                              ::: Create a manual invoice. This service allows you to send invoices to customers for services outside of any subscription. 
                                           
            
                        $clientParameters = array(
                        "attached_items" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function createInvoice($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "due_date" => $clientParameters['due_date'],
                             "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('POST','Invoice/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Invoice
            
                              ::: Update an existing invoice.
                                           
            
                        $clientParameters = array(
                        "attached_items" => '');
            
                            ****/
            
                            public function updateInvoice($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "due_date" => $clientParameters['due_date'],
                             "customer_account_id" => $clientParameters['customer_account_id'],
                             "invoice_id" => $clientParameters['invoice_id']		);
                            
                            $http = $this->http('PATCH','Invoice/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Invoice
            
                              ::: Delete a previously created invoice. This function works for invoices automatically generated for subscriptions and manual created invoices.
                                           
            
                            ****/
            
                            public function deleteInvoice() {
                    
            
                        $req_parameters = array(
                    "customer_account_id" => $clientParameters['customer_account_id'],
                             "invoice_id" => $clientParameters['invoice_id']		);
                            
                            $http = $this->http('DELETE','Invoice/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Reminder/Invoice
            
                              ::: Send the 'Invoice/Reminder' notification to a customer.
                                           
            
                        $clientParameters = array(
                        "bypass_overdue" => '');
            
                            ****/
            
                            public function reminderInvoice($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "invoice_id" => $clientParameters['invoice_id'],
                             "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('POST','Invoice/Reminder',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Key
            
                              ::: List one or more API keys or search for API keys using one or more of the parameters.
                                           
            
                        $clientParameters = array(
                        "name" => '',
                         "connected_brand_id" => '');
            
                            ****/
            
                            public function listKey($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Key/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Key
            
                              ::: Create a new API key and associate it with one or more brands.
                                           
            
                            ****/
            
                            public function createKey() {
                    
            
                        $req_parameters = array(
                    "brands" => $clientParameters['brands'],
                             "name" => $clientParameters['name']		);
                            
                            $http = $this->http('POST','Key/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Key
            
                              ::: You can utilize this service to update the name or brands associated with an API key.
                                           
            
                            ****/
            
                            public function updateKey() {
                    
            
                        $req_parameters = array(
                    "brands" => $clientParameters['brands'],
                             "name" => $clientParameters['name'],
                             "api_key_id" => $clientParameters['api_key_id']		);
                            
                            $http = $this->http('PATCH','Key/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Key
            
                              ::: Use this service to delete an existing API key. 
                                           
            
                            ****/
            
                            public function deleteKey($api_key_id) {
                    
            
                        $req_parameters = array(
                    "api_key_id" => $clientParameters['api_key_id']		);
                            
                            $http = $this->http('DELETE','Key/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Note
            
                              ::: List notes connected to an account, subscription, or invoice.
                                           
            
                        $clientParameters = array(
                        "note_id" => '',
                         "customer_account_id" => '',
                         "subscription_id" => '',
                         "invoice_id" => '');
            
                            ****/
            
                            public function listNote($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Note/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Note
            
                              ::: Notes allow you to store short messages (or notes) on the stack and connect them with a customer account, invoice, or subscription for easy cross referencing. If you have formatted data to store consider using one of 'custom_field_1' or 'custom_field_2', both of which are available on subscriptions, accounts, and invoices.
                                           
            
                        $clientParameters = array(
                        "customer_account_id" => '',
                         "subscription_id" => '',
                         "invoice_id" => '');
            
                            ****/
            
                            public function createNote($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "contents" => $clientParameters['contents'],
                             "subject" => $clientParameters['subject']		);
                            
                            $http = $this->http('POST','Note/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Note
            
                              ::: Delete an existing note.
                                           
            
                            ****/
            
                            public function deleteNote($note_id) {
                    
            
                        $req_parameters = array(
                    "note_id" => $clientParameters['note_id']		);
                            
                            $http = $this->http('DELETE','Note/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Notification
            
                              ::: Use this service to list and search for email notifications.
                                           
            
                        $clientParameters = array(
                        "notification_id" => '',
                         "notification_event" => '');
            
                            ****/
            
                            public function listNotification($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Notification/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Notification
            
                              ::: Create and customize a new email notification. Notifications can be triggered for select events on the RecurringStack™ platform. You can choose to send a customized notification to yourself (the brand) and/or the customer.Until and unless a notification is setup you or your customers will not receive any emails from the RecurringStack™ platform during the normal course of business.
                                           
            
                        $clientParameters = array(
                        "default_notify_brand_email" => '',
                         "subject_brand" => '',
                         "subject_customer" => '',
                         "html_brand" => '',
                         "html_customer" => '');
            
                            ****/
            
                            public function createNotification($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "from_email" => $clientParameters['from_email'],
                             "default_notify_customer" => $clientParameters['default_notify_customer'],
                             "default_notify_brand" => $clientParameters['default_notify_brand'],
                             "notification_event" => $clientParameters['notification_event']		);
                            
                            $http = $this->http('POST','Notification/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Notification
            
                              ::: Update an existing email notification template.
                                           
            
                        $clientParameters = array(
                        "default_notify_brand_email" => '',
                         "subject_brand" => '',
                         "subject_customer" => '',
                         "html_brand" => '',
                         "html_customer" => '');
            
                            ****/
            
                            public function updateNotification($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "from_email" => $clientParameters['from_email'],
                             "default_notify_customer" => $clientParameters['default_notify_customer'],
                             "default_notify_brand" => $clientParameters['default_notify_brand'],
                             "notification_id" => $clientParameters['notification_id']		);
                            
                            $http = $this->http('PATCH','Notification/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Notification
            
                              ::: Delete an existing email notification.
                                           
            
                            ****/
            
                            public function deleteNotification($notification_id) {
                    
            
                        $req_parameters = array(
                    "notification_id" => $clientParameters['notification_id']		);
                            
                            $http = $this->http('DELETE','Notification/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/Notification
            
                              ::: Restore a previously deleted notification.This service will be unable to restore a notification if one of the same type already exists.
                                           
            
                            ****/
            
                            public function restoreNotification($notification_id) {
                    
            
                        $req_parameters = array(
                    "notification_id" => $clientParameters['notification_id']		);
                            
                            $http = $this->http('POST','Notification/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Offer
            
                              ::: List one or more offers connected to the brand.
                                           
            
                        $clientParameters = array(
                        "offer_id" => '');
            
                            ****/
            
                            public function listOffer($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Offer/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/PayGateway
            
                              ::: List all of your previously connected real-time payment gateways associated with the brand. This service will also list all payment gateways supported by RecurringStack™ along with their required credentials (leave 'gateway_id' parameter empty). 
                                           
            
                        $clientParameters = array(
                        "gateway_id" => '',
                         "gateway_provider" => '');
            
                            ****/
            
                            public function listPayGateway($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','PayGateway/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/PayGateway
            
                              ::: Create or link a new payment gateway to process real-time payments.
                                           
            
                        $clientParameters = array(
                        "credentials_2" => '',
                         "default_cc" => '',
                         "default_ba" => '');
            
                            ****/
            
                            public function createPayGateway($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "credentials_1" => $clientParameters['credentials_1'],
                             "gateway_provider" => $clientParameters['gateway_provider'],
                             "name" => $clientParameters['name']		);
                            
                            $http = $this->http('POST','PayGateway/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/PayGateway
            
                              ::: Update a previously linked payment gateway and/or set it as the brands default credit card or ACH real-time processing gateway. 
                                           
            
                        $clientParameters = array(
                        "credentials_2" => '',
                         "default_cc" => '',
                         "default_ba" => '');
            
                            ****/
            
                            public function updatePayGateway($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "credentials_1" => $clientParameters['credentials_1'],
                             "name" => $clientParameters['name'],
                             "gateway_id" => $clientParameters['gateway_id']		);
                            
                            $http = $this->http('PATCH','PayGateway/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/PayGateway
            
                              ::: Delete an existing payment gateway. If the pay gateway is currently the default for the brand, the brand will be left without a default gateway for payment processing.
                                           
            
                            ****/
            
                            public function deletePayGateway($gateway_id) {
                    
            
                        $req_parameters = array(
                    "gateway_id" => $clientParameters['gateway_id']		);
                            
                            $http = $this->http('DELETE','PayGateway/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Payment
            
                              ::: List payments connected to a customer account, invoice, or subscription.
                                           
            
                        $clientParameters = array(
                        "payment_id" => '',
                         "invoice_id" => '',
                         "customer_account_id" => '',
                         "pay_method_id" => '',
                         "subscription_id" => '',
                         "payment_transaction_id" => '');
            
                            ****/
            
                            public function listPayment($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Payment/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Payment
            
                              ::: Post a payment to an existing invoice using a pay method on the customers account or using 'Cash' or other form of third party pay method.
                                           
            
                        $clientParameters = array(
                        "invoice_id" => '',
                         "pay_method_id" => '',
                         "payment_gateway" => '',
                         "payment_transaction_id" => '');
            
                            ****/
            
                            public function createPayment($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "amount" => $clientParameters['amount'],
                             "override_billing" => $clientParameters['override_billing'],
                             "apply_to_prepaid_balance" => $clientParameters['apply_to_prepaid_balance'],
                             "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('POST','Payment/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Payment
            
                              ::: Delete an existing payment. If the payment was processed with a real time gateway, RecurringStack™ will attempt to refund the payment using the same gatway.
                                           
            
                            ****/
            
                            public function deletePayment() {
                    
            
                        $req_parameters = array(
                    "invoice_id" => $clientParameters['invoice_id'],
                             "customer_account_id" => $clientParameters['customer_account_id'],
                             "payment_id" => $clientParameters['payment_id']		);
                            
                            $http = $this->http('DELETE','Payment/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/PayMethod
            
                              ::: Get a list or search for a specific payment method on a customer account. Max results 300.
                                           
            
                        $clientParameters = array(
                        "pay_method_id" => '',
                         "customer_account_id" => '');
            
                            ****/
            
                            public function listPayMethod($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','PayMethod/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/PayMethod
            
                              ::: Add a new payment method (credit card or bank account) to a customer account. The payment information is attached to the customer account within the brand as opposed to any individual subscription itself.
                                           
            
                        $clientParameters = array(
                        "routing_number" => '',
                         "account_type" => '',
                         "expiration_month" => '',
                         "expiration_year" => '',
                         "card_security_code" => '',
                         "plaid_account_id" => '',
                         "plaid_access_token" => '',
                         "plaid_item_id" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function createPayMethod($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "require_verification" => $clientParameters['require_verification'],
                             "account_number" => $clientParameters['account_number'],
                             "type" => $clientParameters['type'],
                             "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('POST','PayMethod/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Verify/PayMethod
            
                              ::: Utilize this endpoint to verify a payment method.
                                           
            
                        $clientParameters = array(
                        "micro_charge_amount" => '',
                         "force_verification" => '');
            
                            ****/
            
                            public function verifyPayMethod($pay_method_id,$clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "pay_method_id" => $clientParameters['pay_method_id']		);
                            
                            $http = $this->http('POST','PayMethod/Verify',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### History/PayMethod
            
                              ::: List the payment history for a specific payment method or account.
                                           
            
                        $clientParameters = array(
                        "pay_method_id" => '',
                         "customer_account_id" => '');
            
                            ****/
            
                            public function historyPayMethod($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','PayMethod/History',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/PayMethod
            
                              ::: Delete a pay method from an account. The pay method will be unassociated with any existing associated subscriptions.
                                           
            
                            ****/
            
                            public function deletePayMethod($pay_method_id) {
                    
            
                        $req_parameters = array(
                    "pay_method_id" => $clientParameters['pay_method_id']		);
                            
                            $http = $this->http('DELETE','PayMethod/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### SetDefault/PayMethod
            
                              ::: Set or unset a payment method as default on a customer account. If the payment method is already the defualt for the account, calling this service will remove it. Likewise, if the payment method is currently <i>not</i> the default payment method this service will set it as default. Default payment methods are utilized for automated recurring subscription billing / invoice payment when 'auto_renew' is set to Y on the subscription. 
                                           
            
                            ****/
            
                            public function setDefaultPayMethod() {
                    
            
                        $req_parameters = array(
                    "type" => $clientParameters['type'],
                             "customer_account_id" => $clientParameters['customer_account_id'],
                             "pay_method_id" => $clientParameters['pay_method_id']		);
                            
                            $http = $this->http('PATCH','PayMethod/SetDefault',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Product
            
                              ::: Search products for a brand. Provide a 'product_id' to find a specific product (including a deleted one).
                                           
            
                        $clientParameters = array(
                        "product_id" => '',
                         "product_group_id" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function listProduct($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Product/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Product
            
                              ::: Create a product.
                                           
            
                        $clientParameters = array(
                        "trial_interval" => '',
                         "trial_price" => '',
                         "auto_pay_discount_amount" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function createProduct($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "tax_exempt" => $clientParameters['tax_exempt'],
                             "prompt_for_variables" => $clientParameters['prompt_for_variables'],
                             "auto_pay_discount" => $clientParameters['auto_pay_discount'],
                             "trial" => $clientParameters['trial'],
                             "recurring_price" => $clientParameters['recurring_price'],
                             "setup_fee" => $clientParameters['setup_fee'],
                             "expiration_interval" => $clientParameters['expiration_interval'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name'],
                             "product_group_id" => $clientParameters['product_group_id']		);
                            
                            $http = $this->http('POST','Product/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Product
            
                              ::: Update a product.
                                           
            
                        $clientParameters = array(
                        "trial_interval" => '',
                         "trial_price" => '',
                         "auto_pay_discount_amount" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function updateProduct($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "tax_exempt" => $clientParameters['tax_exempt'],
                             "prompt_for_variables" => $clientParameters['prompt_for_variables'],
                             "auto_pay_discount" => $clientParameters['auto_pay_discount'],
                             "trial" => $clientParameters['trial'],
                             "recurring_price" => $clientParameters['recurring_price'],
                             "setup_fee" => $clientParameters['setup_fee'],
                             "expiration_interval" => $clientParameters['expiration_interval'],
                             "description" => $clientParameters['description'],
                             "name" => $clientParameters['name'],
                             "product_id" => $clientParameters['product_id']		);
                            
                            $http = $this->http('PATCH','Product/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Suspend/Product
            
                              ::: Suspend a product.A product placed in suspend cannot be part of a new subscription. Existing subscriptions will continue to be billed for the product. To remove the product from existing subscriptions use 'Product/Delete' instead.
                                           
            
                            ****/
            
                            public function suspendProduct($product_id) {
                    
            
                        $req_parameters = array(
                    "product_id" => $clientParameters['product_id']		);
                            
                            $http = $this->http('PATCH','Product/Suspend',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Product
            
                              ::: Delete a product.Deleting a product make it unavailable for new subscribcriptions and removes it from existing subscriptions. Although products can be restored up to 90 days later it will no longer be attached to subscriptions it was linked with before deletion.
                                           
            
                            ****/
            
                            public function deleteProduct($product_id) {
                    
            
                        $req_parameters = array(
                    "product_id" => $clientParameters['product_id']		);
                            
                            $http = $this->http('DELETE','Product/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/Product
            
                              ::: Restore a product.You can restore a product from suspended (2) or deleted (3) status for up to 90 days. 
                                           
            
                            ****/
            
                            public function restoreProduct($product_id) {
                    
            
                        $req_parameters = array(
                    "product_id" => $clientParameters['product_id']		);
                            
                            $http = $this->http('PATCH','Product/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/ProductGroup
            
                              ::: List product groups for a brand.
                                           
            
                        $clientParameters = array(
                        "product_group_id" => '');
            
                            ****/
            
                            public function listProductGroup($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','ProductGroup/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/ProductGroup
            
                              ::: Create and associate a new product group for a brand.
                                           
            
                        $clientParameters = array(
                        "action_url" => '',
                         "VAR1" => '',
                         "VAR2" => '',
                         "VAR3" => '',
                         "VAR4" => '',
                         "VAR5" => '',
                         "VAR6" => '',
                         "VAR7" => '',
                         "VAR8" => '',
                         "VAR9" => '',
                         "VAR10" => '');
            
                            ****/
            
                            public function createProductGroup($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "description" => $clientParameters['description'],
                             "name" => $clientParameters['name']		);
                            
                            $http = $this->http('POST','ProductGroup/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/ProductGroup
            
                              ::: Update an existing product group.
                                           
            
                        $clientParameters = array(
                        "name" => '',
                         "description" => '',
                         "action_url" => '',
                         "VAR1" => '',
                         "VAR2" => '',
                         "VAR3" => '',
                         "VAR4" => '',
                         "VAR5" => '',
                         "VAR6" => '',
                         "VAR7" => '',
                         "VAR8" => '',
                         "VAR9" => '',
                         "VAR10" => '');
            
                            ****/
            
                            public function updateProductGroup($product_group_id,$clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "product_group_id" => $clientParameters['product_group_id']		);
                            
                            $http = $this->http('PATCH','ProductGroup/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Suspend/ProductGroup
            
                              ::: Temporarily suspend a product group. 
                                           
            
                            ****/
            
                            public function suspendProductGroup($product_group_id) {
                    
            
                        $req_parameters = array(
                    "product_group_id" => $clientParameters['product_group_id']		);
                            
                            $http = $this->http('PATCH','ProductGroup/Suspend',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/ProductGroup
            
                              ::: Utilize this service to delete an existing product group.
                                           
            
                            ****/
            
                            public function deleteProductGroup($product_group_id) {
                    
            
                        $req_parameters = array(
                    "product_group_id" => $clientParameters['product_group_id']		);
                            
                            $http = $this->http('DELETE','ProductGroup/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/ProductGroup
            
                              ::: Restore a product group from suspended or deleted status.
                                           
            
                            ****/
            
                            public function restoreProductGroup($product_group_id) {
                    
            
                        $req_parameters = array(
                    "product_group_id" => $clientParameters['product_group_id']		);
                            
                            $http = $this->http('PATCH','ProductGroup/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Reference
            
                              ::: Utilize the reference endpoint to find reference data needed for other API services. 
                                           
            
                            ****/
            
                            public function listReference($reference_type) {
                    
            
                        $req_parameters = array(
                    "reference_type" => $clientParameters['reference_type']		);
                            
                            $http = $this->http('GET','Reference/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Subscription
            
                              ::: List existing subscriptions. Maximum resuts is 100 subscriptions.
                                           
            
                        $clientParameters = array(
                        "subscription_id" => '',
                         "customer_account_id" => '',
                         "status" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function listSubscription($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Subscription/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Estimate/Subscription
            
                              ::: Estimate the cost of creating a new subscription for a customer. This endpoint allows you to calculate and optionally display the up-front and future cost of a subscription to a customer.
                                           
            
                        $clientParameters = array(
                        "attached_components" => '',
                         "coupon_code" => '',
                         "pay_method_id" => '',
                         "override_initial_billing" => '');
            
                            ****/
            
                            public function estimateSubscription($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "product_id" => $clientParameters['product_id'],
                             "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('GET','Subscription/Estimate',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Subscription
            
                              ::: Create a new subscription for a customer. When creating a subscription, you must specify a product (product_id) and a customer (customer_account_id). One or more components can be attached to the subscription at the time of it's creation or you can attach components at any time in the future.
                                           
            
                        $clientParameters = array(
                        "attached_components" => '',
                         "coupon_code" => '',
                         "pay_method_id" => '',
                         "payment_gateway" => '',
                         "payment_transaction_id" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '',
                         "VAR1" => '',
                         "VAR2" => '',
                         "VAR3" => '',
                         "VAR4" => '',
                         "VAR5" => '',
                         "VAR6" => '',
                         "VAR7" => '',
                         "VAR8" => '',
                         "VAR9" => '',
                         "VAR10" => '');
            
                            ****/
            
                            public function createSubscription($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                            "auto_pay" => $clientParameters['auto_pay'],
                             "override_initial_billing" => $clientParameters['override_initial_billing'],
                             "product_id" => $clientParameters['product_id'],
                             "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('POST','Subscription/Create',$req_parameters,$clientParameters); 
                            return $http;
                            }
            
                            /****
                             
                            ### Update/Subscription
            
                              ::: Update an existing subscription.Changes made to a subscription will take effect immediately. If changes are made before the billing cycle renewal date the next payment will be calculated using the updated data (after the change), not the old data (before the change).
                                           
            
                        $clientParameters = array(
                        "attached_components" => '',
                         "coupon_code" => '',
                         "payment_transaction_id" => '',
                         "renewal_date" => '',
                         "pay_method_id" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '',
                         "VAR1" => '',
                         "VAR2" => '',
                         "VAR3" => '',
                         "VAR4" => '',
                         "VAR5" => '',
                         "VAR6" => '',
                         "VAR7" => '',
                         "VAR8" => '',
                         "VAR9" => '',
                         "VAR10" => '');
            
                            ****/
            
                            public function updateSubscription($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "auto_pay" => $clientParameters['auto_pay'],
                             "customer_account_id" => $clientParameters['customer_account_id'],
                             "subscription_id" => $clientParameters['subscription_id']		);
                            
                            $http = $this->http('POST','Subscription/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### ChangeProduct/Subscription
            
                              ::: Change the product associated with an existing subscription.
                                           
            
                        $clientParameters = array(
                        "remove_components" => '',
                         "remove_coupons" => '');
            
                            ****/
            
                            public function changeProductSubscription($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "product_id" => $clientParameters['product_id'],
                             "customer_account_id" => $clientParameters['customer_account_id'],
                             "subscription_id" => $clientParameters['subscription_id']		);
                            
                            $http = $this->http('POST','Subscription/ChangeProduct',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Suspend/Subscription
            
                              ::: Place a active subscription in a suspended state.
                                           
            
                            ****/
            
                            public function suspendSubscription($subscription_id) {
                    
            
                        $req_parameters = array(
                    "subscription_id" => $clientParameters['subscription_id']		);
                            
                            $http = $this->http('PATCH','Subscription/Suspend',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Subscription
            
                              ::: Cancel/delete a subscription.
                                           
            
                            ****/
            
                            public function deleteSubscription($subscription_id) {
                    
            
                        $req_parameters = array(
                    "subscription_id" => $clientParameters['subscription_id']		);
                            
                            $http = $this->http('DELETE','Subscription/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### ReportUsage/Subscription
            
                              ::: This service allows you to report usage <b>for a compnent already attached to a subscription</b>. You may choose to report metered or prepaid usage as you wish. If usage events occur in your system very frequently (hundreads of times an hour or more), it is best to accumulate usage into batches on your side, and then report those batches less frequently, such as daily. This will ensure you remain below any API throttling limits.
                                           
            
                            ****/
            
                            public function reportUsageSubscription() {
                    
            
                        $req_parameters = array(
                    "expression_type" => $clientParameters['expression_type'],
                             "units" => $clientParameters['units'],
                             "component_id" => $clientParameters['component_id'],
                             "customer_account_id" => $clientParameters['customer_account_id'],
                             "subscription_id" => $clientParameters['subscription_id']		);
                            
                            $http = $this->http('PATCH','Subscription/ReportUsage',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/Subscription
            
                              ::: If you suspended or paused a subscription for any reason you can utilize this service to restore it.RecurringStack™ may also suspend a subscription in accordance with your dunning rules (usually when a customer has unpaid invoices), this service may be used to override these kind of suspension as well. 
                                           
            
                            ****/
            
                            public function restoreSubscription($subscription_id) {
                    
            
                        $req_parameters = array(
                    "subscription_id" => $clientParameters['subscription_id']		);
                            
                            $http = $this->http('PATCH','Subscription/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Ticket
            
                              ::: List and search for one or multiple support tickets.
                                           
            
                        $clientParameters = array(
                        "ticket_id" => '',
                         "friendly_ticket_id" => '',
                         "direction" => '',
                         "working_status" => '',
                         "customer_account_id" => '',
                         "subscription_id" => '',
                         "limit" => '',
                         "order" => '',
                         "offset" => '');
            
                            ****/
            
                            public function listTicket($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Ticket/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/Ticket
            
                              ::: Create a new ticket or create a new message on an existing ticket.
                                           
            
                        $clientParameters = array(
                        "ticket_id" => '',
                         "attachments" => '',
                         "subject" => '',
                         "direction" => '',
                         "department" => '',
                         "customer_account_id" => '',
                         "customer_user_id" => '',
                         "subscription_id" => '',
                         "guest_email" => '');
            
                            ****/
            
                            public function createTicket($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "message" => $clientParameters['message'],
                             "type" => $clientParameters['type']		);
                            
                            $http = $this->http('POST','Ticket/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/Ticket
            
                              ::: Update an existing ticket, including the ticket status.
                                           
            
                        $clientParameters = array(
                        "subject" => '',
                         "working_status" => '',
                         "department" => '',
                         "customer_account_id" => '',
                         "subscription_id" => '');
            
                            ****/
            
                            public function updateTicket($ticket_id,$clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "ticket_id" => $clientParameters['ticket_id']		);
                            
                            $http = $this->http('PATCH','Ticket/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Merge/Ticket
            
                              ::: Merge one ticket with another ticket. Messages from both tickets will be maintained while the subject of the original ticket (ticket_id) will be maintained.
                                           
            
                            ****/
            
                            public function mergeTicket() {
                    
            
                        $req_parameters = array(
                    "merge_ticket_id" => $clientParameters['merge_ticket_id'],
                             "ticket_id" => $clientParameters['ticket_id']		);
                            
                            $http = $this->http('PATCH','Ticket/Merge',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/Ticket
            
                              ::: Delete a support ticket.
                                           
            
                            ****/
            
                            public function deleteTicket($ticket_id) {
                    
            
                        $req_parameters = array(
                    "ticket_id" => $clientParameters['ticket_id']		);
                            
                            $http = $this->http('DELETE','Ticket/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/Transaction
            
                              ::: All transactions (except 'List') are recorded in the transaction history. You can search the transaction history to find information on previous transactions.
                                           
            
                        $clientParameters = array(
                        "transaction_id" => '',
                         "customer_account_id" => '',
                         "subscription_id" => '',
                         "invoice_id" => '',
                         "user_id" => '',
                         "api_category" => '',
                         "api_service" => '',
                         "ip_address" => '');
            
                            ****/
            
                            public function listTransaction($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','Transaction/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### List/User
            
                              ::: List all users for a brand using the search criteria below. Max results 300.
                                           
            
                        $clientParameters = array(
                        "user_id" => '',
                         "customer_account_id" => '',
                         "email_address" => '',
                         "username" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '');
            
                            ****/
            
                            public function listUser($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('GET','User/List',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Create/User
            
                              ::: Create a new user connected to a customer account.
                                           
            
                        $clientParameters = array(
                        "phone_number_country_code" => '',
                         "phone_number" => '',
                         "password" => '',
                         "access_level" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '',
                         "avatar_uri" => '');
            
                            ****/
            
                            public function createUser($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "send_new_user_email" => $clientParameters['send_new_user_email'],
                             "timezone_id" => $clientParameters['timezone_id'],
                             "locale" => $clientParameters['locale'],
                             "email_address" => $clientParameters['email_address'],
                             "last_name" => $clientParameters['last_name'],
                             "first_name" => $clientParameters['first_name'],
                             "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('POST','User/Create',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Update/User
            
                              ::: Update an existing user profile. Only provide the parameters you wish to update.
                                           
            
                        $clientParameters = array(
                        "first_name" => '',
                         "last_name" => '',
                         "email_address" => '',
                         "phone_number_country_code" => '',
                         "phone_number" => '',
                         "password" => '',
                         "access_level" => '',
                         "custom_field_1" => '',
                         "custom_field_2" => '',
                         "avatar_uri" => '',
                         "locale" => '',
                         "timezone_id" => '',
                         "verified" => '');
            
                            ****/
            
                            public function updateUser($user_id,$clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "user_id" => $clientParameters['user_id']		);
                            
                            $http = $this->http('PATCH','User/Update',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Suspend/User
            
                              ::: Suspend a user and place the 'user_id' in suspended status.
                                           
            
                            ****/
            
                            public function suspendUser($user_id) {
                    
            
                        $req_parameters = array(
                    "user_id" => $clientParameters['user_id']		);
                            
                            $http = $this->http('PATCH','User/Suspend',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Delete/User
            
                              ::: Delete a specific user or 'user_id'.
                                           
            
                            ****/
            
                            public function deleteUser($user_id) {
                    
            
                        $req_parameters = array(
                    "user_id" => $clientParameters['user_id']		);
                            
                            $http = $this->http('PATCH','User/Delete',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Restore/User
            
                              ::: Restore a user from suspended or deleted.
                                           
            
                            ****/
            
                            public function restoreUser($user_id) {
                    
            
                        $req_parameters = array(
                    "user_id" => $clientParameters['user_id']		);
                            
                            $http = $this->http('PATCH','User/Restore',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### Authenticate/User
            
                              ::: Authenticate a user as part of a sign in process.
                                           
            
                        $clientParameters = array(
                        "email_address" => '',
                         "username" => '',
                         "password" => '',
                         "override_password_requirement" => '',
                         "ip_address" => '',
                         "url" => '',
                         "temporary_token" => '');
            
                            ****/
            
                            public function authenticateUser($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('POST','User/Authenticate',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### 2FARequest/User
            
                              ::: Send a two factor authentication (2FA) verification code via SMS, phone call, or email. 'SMS' and 'call' 2FA request may carry an additional fee.
                                           
            
                            ****/
            
                            public function _2FARequestUser() {
                    
            
                        $req_parameters = array(
                    "verification_method" => $clientParameters['verification_method'],
                             "verification_user_id" => $clientParameters['verification_user_id']		);
                            
                            $http = $this->http('POST','User/2FARequest',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### 2FAVerify/User
            
                              ::: Verify a users identity; email address; or phone number using the verification code sent via the 'User/2FARequest' notification. If verification is successful the users details will be returned with the 'authenticated' namespace set to 'Y'.
                                           
            
                        $clientParameters = array(
                        "force_verification" => '');
            
                            ****/
            
                            public function _2FAVerifyUser($clientParameters = array()) {
                    
            
                        $req_parameters = array(
                    "verification_method" => $clientParameters['verification_method'],
                             "verification_code" => $clientParameters['verification_code'],
                             "verification_user_id" => $clientParameters['verification_user_id']		);
                            
                            $http = $this->http('POST','User/2FAVerify',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### PasswdReset/User
            
                              ::: This service will send a temporary password good for one hour to the users e-mail address.
                                           
            
                        $clientParameters = array(
                        "email_address" => '',
                         "username" => '');
            
                            ****/
            
                            public function passwdResetUser($clientParameters = array()) {
                    $req_parameters = NULL;
                            
                            $http = $this->http('POST','User/PasswdReset',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### CreateLoginLink/User
            
                              ::: This service allows you to create a temporary link for a user to sign in to the Customer Facing Portal (CFP) without using their credentials. This service is beneficial if for example your customer is already signed in to an existing app and you'd like to direct them to the CFP for account management from within that app using either a button or link.
                                           
            
                            ****/
            
                            public function createLoginLinkUser() {
                    
            
                        $req_parameters = array(
                    "user_id" => $clientParameters['user_id'],
                             "customer_account_id" => $clientParameters['customer_account_id']		);
                            
                            $http = $this->http('POST','User/CreateLoginLink',$req_parameters,$clientParameters); 
                                return $http;
                            }
            
                            /****
                             
                            ### OAuthAuthenticate/User
            
                              ::: Creates a link allowing an end-user to sign in or create a new account with a third party identity service. Currently, Facebook and Google are supported identity providers. Upon successful authentication the end-user will be redirected to your 'redirect_uri' with a 'temporary_token' appended to the url. You can call the 'User/Authenticate' service with the 'temporary_token' to retreive the users account details.
                                           
            
                            ****/
            
                            public function oAuthAuthenticateUser() {
                    
            
                        $req_parameters = array(
                    "create_if_not_exists" => $clientParameters['create_if_not_exists'],
                             "failure_uri" => $clientParameters['failure_uri'],
                             "redirect_uri" => $clientParameters['redirect_uri'],
                             "identity_service" => $clientParameters['identity_service']		);
                            
                            $http = $this->http('POST','User/OAuthAuthenticate',$req_parameters,$clientParameters); 
                                return $http;
                            }

//http
private function http ($http_method,$api_service,$req_parameters,$optional_parameters) { 

    //Setup authentication parameters
    $auth = array('key' => $this->key,'brand_id' => $this->brand_id,'user_key' => $this->user_key);
    
    //Set the parameters to send to RecurringStack
    (is_array($optional_parameters) && is_array($req_parameters)) ? $params = array_merge($req_parameters,$optional_parameters) : "";
    (!is_array($optional_parameters) && is_array($req_parameters)) ? $params = $req_parameters : '';
    (!is_array($req_parameters) && is_array($optional_parameters)) ? $params = $optional_parameters : '';
    
    if (is_array($params)) { $params = array_merge($auth,$params); }else{ $params = $auth; }

    //Initiate Guzzle
    $guzzle_http_client = new \GuzzleHttp\Client(['base_uri' => 'https://api.recurringstack.com/' . $this->response_format . '/','timeout' => 10.0]);

    //Send Request
    if ($http_method != '') { 
      $formatted_params = ['query' => $params];
      $response = $guzzle_http_client->request($http_method,$api_service,$formatted_params); 
    };

    //Check for a successful header
    if ($response->getStatusCode() != '200') { throw new apiException("http error",strval($response->getStatusCode())); };

    //if ($this->)
    //return $response->getBody()->getContents();

    //Decode and check for errors
    if ($this->response_format == 'json') {
        $decoded = json_decode($response->getBody()->getContents());
        if ($decoded->exception != '') { throw new apiException(strval($decoded->exception),strval($decoded->exception->attributes()->code)); }; //Catch exception on Json
    }

    if ($this->response_format == 'xml') {
        libxml_use_internal_errors(true);
        $decoded = simplexml_load_string($response->getBody()->getContents());
        if ($decoded->exception != '') { throw new apiException(strval($decoded->exception),strval($decoded->exception->attributes()->code)); }; //Catch exception on XML
    if (false === $decoded) {
        foreach(libxml_get_errors() as $error) {
            $xml_errors_pre = "\t" . $error->message;
            $xml_errors = $xml_errors_pre . $xml_errors;
        }
            throw new apiException(strval($decoded->exception),strval($response->getStatusCode())); //XML Decoding Error
        }    
    }

    //Return specified format
    if ($this->response_type != 'clean') { return $response->getBody()->getContents();  }else{ return $decoded;  };

}


private function checkConfiguration() { 
    if ($this->response_format == 'xml' || $this->response_format == 'json') { }else{ throw new apiException("'response_format' must be with xml or json",400); }
    if ($this->response_type == '' || $this->response_type == 'clean') { }else{ throw new apiException("'response_type' must be empty or 'clean'.",400); }
    if ($this->user_key == '') { throw new apiException("'user_key' is required.",401); };
    if ($this->brand_id == '') { throw new apiException("Please specify a brand to work with using 'brand_id'.",401);  };       
}

}
?>