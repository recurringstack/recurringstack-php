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


        //Check initial configuration
        private function checkConfiguration()
        {
            if ($this->response_format != 'xml' && $this->response_format != 'json') {
                throw new apiException("'response_format' must be 'xml' or 'json'", 400, '', '', '');
            }
            if ($this->response_type != '' && $this->response_type != 'clean') {
                throw new apiException("'response_type' must be empty or 'clean'.", 400, '', '', '');
            }
            if ($this->user_key == '') {
                throw new apiException("'user_key' is required.", 401, '', '', '');
            }
            if ($this->brand_id == '') {
                throw new apiException("Please specify a brand to work with using 'brand_id'.", 401, '', '', '');
            }
        }



        

/* listBrand

List all of the brands connected to your RecurringStack™ account. Depending on your subscription, one RecurringStack™ account can support up to ten different brands.

    * Optional Parameters:
    * @param search_brand_id
    * @param limit

*/

public function listBrand($parameters = array()) { return $this->http('GET','Brand/List', $parameters); }



/* createBrand

Create a new brand or company.

    * Required Parameters:
    * @param name
    * @param description
    * @param logo_url

    * Optional Parameters:
    * @param website_url
    * @param website_login_url
    * @param support_email
    * @param support_link
    * @param support_phone
    * @param terms_url
    * @param privacy_url
    * @param social_media_facebook
    * @param social_media_twitter
    * @param social_media_youtube
    * @param social_media_instagram

*/

public function createBrand($parameters = array()) { return $this->http('POST','Brand/Create', $parameters); }



/* updateBrand

Update an existing brand. Only pass the parameters you wish to update.

    * Required Parameters:
    * @param update_brand_id

    * Optional Parameters:
    * @param name
    * @param description
    * @param logo_url
    * @param website_url
    * @param website_login_url
    * @param support_email
    * @param support_link
    * @param support_phone
    * @param terms_url
    * @param privacy_url
    * @param social_media_facebook
    * @param social_media_twitter
    * @param social_media_youtube
    * @param social_media_instagram

*/

public function updateBrand($parameters = array()) { return $this->http('PATCH','Brand/Update', $parameters); }



/* deleteBrand

Delete an existing brand. This operation is currently not reversable. If you have customers with subscriptions on the brand their subscriptions will no longer be billed and the brand_id can no longer be used for authentication with the API.

    * Required Parameters:
    * @param delete_brand_id

*/

public function deleteBrand($delete_brand_id) { return $this->http('DELETE', 'Brand/Delete', ['delete_brand_id' => $delete_brand_id]); }



/* listKey

List one or more API keys or search for API keys using one or more of the parameters.

    * Optional Parameters:
    * @param name
    * @param connected_brand_id

*/

public function listKey($parameters = array()) { return $this->http('GET','Key/List', $parameters); }



/* createKey

Create a new API key and associate it with one or more brands.

    * Required Parameters:
    * @param name
    * @param brands

*/

public function createKey($parameters = array()) { return $this->http('POST','Key/Create', $parameters); }



/* updateKey

You can utilize this service to update the name or brands associated with an API key.

    * Required Parameters:
    * @param api_key_id
    * @param name
    * @param brands

*/

public function updateKey($parameters = array()) { return $this->http('PATCH','Key/Update', $parameters); }



/* deleteKey

Use this service to delete an existing API key.

    * Required Parameters:
    * @param api_key_id

*/

public function deleteKey($api_key_id) { return $this->http('DELETE', 'Key/Delete', ['api_key_id' => $api_key_id]); }



/* restoreKey

Restore a previously deleted API key.

    * Required Parameters:
    * @param api_key_id

*/

public function restoreKey($api_key_id) { return $this->http('PATCH', 'Key/Restore', ['api_key_id' => $api_key_id]); }



/* listIAMPolicy

List one or more Identity and Access Management (IAM) policies.

    * Optional Parameters:
    * @param IAM_policy_id

*/

public function listIAMPolicy($parameters = array()) { return $this->http('GET','IAMPolicy/List', $parameters); }



/* createIAMPolicy

Create a new IAM Policy

    * Required Parameters:
    * @param name
    * @param description

*/

public function createIAMPolicy($parameters = array()) { return $this->http('POST','IAMPolicy/Create', $parameters); }



/* updateIAMPolicy

Update an existing IAM Policy

    * Required Parameters:
    * @param IAM_policy_id

*/

public function updateIAMPolicy($IAM_policy_id) { return $this->http('PATCH', 'IAMPolicy/Update', ['IAM_policy_id' => $IAM_policy_id]); }



/* deleteIAMPolicy

Delete an existing IAM Policy

    * Required Parameters:
    * @param IAM_policy_id

*/

public function deleteIAMPolicy($IAM_policy_id) { return $this->http('DELETE', 'IAMPolicy/Delete', ['IAM_policy_id' => $IAM_policy_id]); }



/* restoreIAMPolicy

Restore a IAM Policy from deleted.

    * Required Parameters:
    * @param IAM_policy_id

*/

public function restoreIAMPolicy($IAM_policy_id) { return $this->http('PATCH', 'IAMPolicy/Restore', ['IAM_policy_id' => $IAM_policy_id]); }



/* listAccount

List all customer accounts connected to a specific brand or provide any of the search criteria to narrow your results. The maximum number of returned results is 300.

    * Optional Parameters:
    * @param customer_account_id
    * @param email_address
    * @param first_name
    * @param last_name
    * @param company_name
    * @param custom_field_1
    * @param custom_field_2
    * @param limit
    * @param order
    * @param offset

*/

public function listAccount($parameters = array()) { return $this->http('GET','Account/List', $parameters); }



/* createAccount

Create a new customer account and associate it with a brand. The initial user will be created based on the information and e-mail address provided.

    * Required Parameters:
    * @param first_name
    * @param last_name
    * @param email_address
    * @param country
    * @param locale
    * @param timezone_id

    * Optional Parameters:
    * @param company_name
    * @param cc_email_address
    * @param phone_number_country_code
    * @param phone_number
    * @param address
    * @param address_2
    * @param unit
    * @param unit_type
    * @param city
    * @param state
    * @param zip_code
    * @param tax_id
    * @param tax_exempt
    * @param tax_exempt_reason
    * @param custom_field_1
    * @param custom_field_2
    * @param password
    * @param skip_notification

*/

public function createAccount($parameters = array()) { return $this->http('POST','Account/Create', $parameters); }



/* updateAccount

Update information on an existing customers account.

    * Required Parameters:
    * @param customer_account_id

    * Optional Parameters:
    * @param company_name
    * @param first_name
    * @param last_name
    * @param email_address
    * @param cc_email_address
    * @param phone_number_country_code
    * @param phone_number
    * @param address
    * @param address_2
    * @param unit
    * @param unit_type
    * @param city
    * @param state
    * @param zip_code
    * @param country
    * @param locale
    * @param timezone_id
    * @param tax_id
    * @param tax_exempt
    * @param tax_exempt_reason
    * @param custom_field_1
    * @param custom_field_2

*/

public function updateAccount($parameters = array()) { return $this->http('PATCH','Account/Update', $parameters); }



/* suspendAccount

Suspend a customers account.

    * Required Parameters:
    * @param customer_account_id

*/

public function suspendAccount($customer_account_id) { return $this->http('PATCH', 'Account/Suspend', ['customer_account_id' => $customer_account_id]); }



/* deleteAccount

Delete a customers account.

    * Required Parameters:
    * @param customer_account_id

*/

public function deleteAccount($customer_account_id) { return $this->http('DELETE', 'Account/Delete', ['customer_account_id' => $customer_account_id]); }



/* restoreAccount

Restore a customer account from suspended or deleted.

    * Required Parameters:
    * @param customer_account_id

*/

public function restoreAccount($customer_account_id) { return $this->http('PATCH', 'Account/Restore', ['customer_account_id' => $customer_account_id]); }



/* listUser

List all users for a brand using the search criteria below. Max results 300.

    * Optional Parameters:
    * @param user_id
    * @param customer_account_id
    * @param email_address
    * @param username
    * @param access_level
    * @param IAM_policy_id
    * @param custom_field_1
    * @param custom_field_2
    * @param verified

*/

public function listUser($parameters = array()) { return $this->http('GET','User/List', $parameters); }



/* createUser

Create a new user connected to a customer account.

    * Required Parameters:
    * @param customer_account_id
    * @param first_name
    * @param last_name
    * @param email_address
    * @param access_level
    * @param IAM_policy_id
    * @param locale
    * @param timezone_id
    * @param send_new_user_email

    * Optional Parameters:
    * @param phone_number_country_code
    * @param phone_number
    * @param password
    * @param custom_field_1
    * @param custom_field_2
    * @param avatar_uri

*/

public function createUser($parameters = array()) { return $this->http('POST','User/Create', $parameters); }



/* updateUser

Update an existing user profile. Only provide the parameters you wish to update.

    * Required Parameters:
    * @param user_id
    * @param access_level
    * @param IAM_policy_id

    * Optional Parameters:
    * @param first_name
    * @param last_name
    * @param email_address
    * @param phone_number_country_code
    * @param phone_number
    * @param password
    * @param custom_field_1
    * @param custom_field_2
    * @param avatar_uri
    * @param locale
    * @param timezone_id

*/

public function updateUser($parameters = array()) { return $this->http('PATCH','User/Update', $parameters); }



/* suspendUser

Suspend a user and place the 'user_id' in suspended status.

    * Required Parameters:
    * @param user_id

*/

public function suspendUser($user_id) { return $this->http('PATCH', 'User/Suspend', ['user_id' => $user_id]); }



/* deleteUser

Delete a specific user or 'user_id'.

    * Required Parameters:
    * @param user_id

*/

public function deleteUser($user_id) { return $this->http('PATCH', 'User/Delete', ['user_id' => $user_id]); }



/* restoreUser

Restore a user from suspended or deleted.

    * Required Parameters:
    * @param user_id

*/

public function restoreUser($user_id) { return $this->http('PATCH', 'User/Restore', ['user_id' => $user_id]); }



/* authenticateUser

Authenticate a user as part of a sign in process.

    * Optional Parameters:
    * @param email_address
    * @param username
    * @param password
    * @param override_password_requirement
    * @param ip_address
    * @param url
    * @param temporary_token

*/

public function authenticateUser($parameters = array()) { return $this->http('POST','User/Authenticate', $parameters); }



/* _2FARequestUser

The 2FARequest service sends a two-factor authentication (2FA) verification code to the user through the specified channel: SMS, phone call, or email. Note: SMS and phone call requests may incur additional fees. When using this service to verify an email address (verification_type = 'email'), and the provided email matches a customer account's email address, the customer account will automatically be marked as verified.

    * Required Parameters:
    * @param verification_user_id
    * @param verification_method

    * Optional Parameters:
    * @param verification_email_address
    * @param verification_number_country_code
    * @param verification_number

*/

public function _2FARequestUser($parameters = array()) { return $this->http('POST','User/2FARequest', $parameters); }



/* _2FAVerifyUser

Verify a users identity; email address; or phone number using the verification code sent via the 'User/2FARequest' notification. If verification is successful the users details will be returned with the 'authenticated' namespace set to 'Y'.

    * Required Parameters:
    * @param verification_user_id
    * @param verification_code
    * @param verification_method

    * Optional Parameters:
    * @param force_verification

*/

public function _2FAVerifyUser($parameters = array()) { return $this->http('POST','User/2FAVerify', $parameters); }



/* listNote

List notes connected to an account, subscription, or invoice.

    * Optional Parameters:
    * @param note_id
    * @param customer_account_id
    * @param subscription_id
    * @param invoice_id

*/

public function listNote($parameters = array()) { return $this->http('GET','Note/List', $parameters); }



/* createNote

Notes allow you to store short messages (or notes) on the stack and connect them with a customer account, invoice, or subscription for easy cross referencing.

If you have formatted data to store consider using one of 'custom_field_1' or 'custom_field_2', both of which are available on subscriptions, accounts, and invoices.

    * Required Parameters:
    * @param subject
    * @param contents

    * Optional Parameters:
    * @param customer_account_id
    * @param subscription_id
    * @param invoice_id

*/

public function createNote($parameters = array()) { return $this->http('POST','Note/Create', $parameters); }



/* deleteNote

Delete an existing note.

    * Required Parameters:
    * @param note_id

*/

public function deleteNote($note_id) { return $this->http('DELETE', 'Note/Delete', ['note_id' => $note_id]); }



/* passwdResetUser

This service will send a temporary password good for one hour to the users e-mail address.

    * Optional Parameters:
    * @param email_address
    * @param username

*/

public function passwdResetUser($parameters = array()) { return $this->http('POST','User/PasswdReset', $parameters); }



/* createTokenUser

This service allows you to create a temporary token that can be used with the 'User/Authenticate' service allowing you to bypass the username and password requirement.

A temporary link for the user to sign in to the Customer Facing Portal (CFP) without using their credentials will also be generated. Utilize this link if for example your customer is already signed in to an existing app and you'd like to direct them to the CFP for account management from within that app using either a button or link.

    * Required Parameters:
    * @param customer_account_id
    * @param user_id

    * Optional Parameters:
    * @param expiration
    * @param cfp_redirect

*/

public function createTokenUser($parameters = array()) { return $this->http('POST','User/CreateToken', $parameters); }



/* oAuthAuthenticateUser

Creates a link allowing an end-user to sign in or create a new account with a third party identity service. Currently, Facebook and Google are supported identity providers. Upon successful authentication the end-user will be redirected to your 'redirect_uri' with a 'temporary_token' appended to the url. You can call the 'User/Authenticate' service with the 'temporary_token' to retreive the users account details.

    * Required Parameters:
    * @param identity_service
    * @param redirect_uri
    * @param failure_uri
    * @param create_if_not_exists

*/

public function oAuthAuthenticateUser($parameters = array()) { return $this->http('POST','User/OAuthAuthenticate', $parameters); }



/* listNotification

Use this service to list and search for email notifications.

    * Optional Parameters:
    * @param notification_id
    * @param notification_event

*/

public function listNotification($parameters = array()) { return $this->http('GET','Notification/List', $parameters); }



/* createNotification

Create and customize a new email notification. Notifications can be triggered for select events on the RecurringStack™ platform. You can choose to send a customized notification to yourself (the brand) and/or the customer.

Until and unless a notification is setup you or your customers will not receive any emails from the RecurringStack™ platform during the normal course of business.

    * Required Parameters:
    * @param notification_event
    * @param default_notify_brand
    * @param default_notify_customer
    * @param from_email

    * Optional Parameters:
    * @param default_notify_brand_email
    * @param subject_brand
    * @param subject_customer
    * @param html_brand
    * @param html_customer

*/

public function createNotification($parameters = array()) { return $this->http('POST','Notification/Create', $parameters); }



/* updateNotification

Update an existing email notification template.

    * Required Parameters:
    * @param notification_id
    * @param default_notify_brand
    * @param default_notify_customer
    * @param from_email

    * Optional Parameters:
    * @param default_notify_brand_email
    * @param subject_brand
    * @param subject_customer
    * @param html_brand
    * @param html_customer

*/

public function updateNotification($parameters = array()) { return $this->http('PATCH','Notification/Update', $parameters); }



/* deleteNotification

Delete an existing email notification.

    * Required Parameters:
    * @param notification_id

*/

public function deleteNotification($notification_id) { return $this->http('DELETE', 'Notification/Delete', ['notification_id' => $notification_id]); }



/* restoreNotification

Restore a previously deleted notification.

This service will be unable to restore a notification if one of the same type already exists.

    * Required Parameters:
    * @param notification_id

*/

public function restoreNotification($notification_id) { return $this->http('POST', 'Notification/Restore', ['notification_id' => $notification_id]); }



/* listInvoice

List all invoices connected to a specific brand or provide any of the search criteria to narrow your results. The maximum number of returned results is 50. If a 'customer_account_id' or 'subscription_id' are provided a maximum of 400 results is returned.

    * Optional Parameters:
    * @param invoice_id
    * @param customer_account_id
    * @param subscription_id
    * @param custom_field_1
    * @param custom_field_2

*/

public function listInvoice($parameters = array()) { return $this->http('GET','Invoice/List', $parameters); }



/* createInvoice

Create a manual invoice. This service allows you to send invoices to customers for services outside of any subscription.

    * Required Parameters:
    * @param customer_account_id
    * @param attached_items
    * @param due_date

    * Optional Parameters:
    * @param custom_field_1
    * @param custom_field_2

*/

public function createInvoice($parameters = array()) { return $this->http('POST','Invoice/Create', $parameters); }



/* updateInvoice

Update an existing invoice.

    * Required Parameters:
    * @param invoice_id
    * @param customer_account_id
    * @param due_date

    * Optional Parameters:
    * @param attached_items

*/

public function updateInvoice($parameters = array()) { return $this->http('PATCH','Invoice/Update', $parameters); }



/* deleteInvoice

Delete a previously created invoice. This function works for invoices automatically generated for subscriptions and manual created invoices.

    * Required Parameters:
    * @param invoice_id
    * @param customer_account_id

*/

public function deleteInvoice($parameters = array()) { return $this->http('DELETE','Invoice/Delete', $parameters); }



/* reminderInvoice

Send the 'Invoice/Reminder' notification to a customer.

    * Required Parameters:
    * @param customer_account_id
    * @param invoice_id

    * Optional Parameters:
    * @param bypass_overdue

*/

public function reminderInvoice($parameters = array()) { return $this->http('POST','Invoice/Reminder', $parameters); }



/* listCategory

List all category's in a brands knowledgeable library.

    * Optional Parameters:
    * @param category_id
    * @param category_type
    * @param parent_category_id
    * @param name
    * @param show_sub_categories

*/

public function listCategory($parameters = array()) { return $this->http('GET','Category/List', $parameters); }



/* createCategory

Create a primary or sub category in the knowledgebase library.

    * Required Parameters:
    * @param name
    * @param category_type
    * @param visibility

    * Optional Parameters:
    * @param summary
    * @param parent_category_id

*/

public function createCategory($parameters = array()) { return $this->http('POST','Category/Create', $parameters); }



/* updateCategory

Update a category.

    * Required Parameters:
    * @param category_id
    * @param name
    * @param category_type
    * @param visibility

    * Optional Parameters:
    * @param summary
    * @param parent_category_id

*/

public function updateCategory($parameters = array()) { return $this->http('PATCH','Category/Update', $parameters); }



/* deleteCategory

Delete a category.

    * Required Parameters:
    * @param category_id

*/

public function deleteCategory($category_id) { return $this->http('DELETE', 'Category/Delete', ['category_id' => $category_id]); }



/* restoreCategory

Restore a category from deleted.

    * Required Parameters:
    * @param category_id

*/

public function restoreCategory($category_id) { return $this->http('PATCH', 'Category/Restore', ['category_id' => $category_id]); }



/* listArticle

List one or more library articles using the specified search criteria.

    * Optional Parameters:
    * @param article_id
    * @param category_id
    * @param tags

*/

public function listArticle($parameters = array()) { return $this->http('GET','Article/List', $parameters); }



/* createArticle

Create a new article in the library under a category or sub category.

    * Required Parameters:
    * @param category_id
    * @param title
    * @param contents
    * @param tags
    * @param visibility

    * Optional Parameters:
    * @param summary

*/

public function createArticle($parameters = array()) { return $this->http('POST','Article/Create', $parameters); }



/* updateArticle

Update an existing library article.

    * Required Parameters:
    * @param article_id
    * @param category_id
    * @param title
    * @param contents
    * @param tags
    * @param visibility

    * Optional Parameters:
    * @param summary

*/

public function updateArticle($parameters = array()) { return $this->http('PATCH','Article/Update', $parameters); }



/* deleteArticle

Delete a library artcile.

    * Required Parameters:
    * @param article_id

*/

public function deleteArticle($article_id) { return $this->http('DELETE', 'Article/Delete', ['article_id' => $article_id]); }



/* restoreArticle

Restore a library article that's been previously deleted.

    * Required Parameters:
    * @param article_id

*/

public function restoreArticle($article_id) { return $this->http('PATCH', 'Article/Restore', ['article_id' => $article_id]); }



/* listPayMethod

Get a list or search for a specific payment method on a customer account. Max results 300.

    * Optional Parameters:
    * @param pay_method_id
    * @param customer_account_id

*/

public function listPayMethod($parameters = array()) { return $this->http('GET','PayMethod/List', $parameters); }



/* createPayMethod

Add a new payment method (credit card or bank account) to a customer account. The payment information is attached to the customer account within the brand as opposed to any individual subscription itself.

    * Required Parameters:
    * @param customer_account_id
    * @param type
    * @param account_number
    * @param require_verification

    * Optional Parameters:
    * @param routing_number
    * @param account_type
    * @param expiration_month
    * @param expiration_year
    * @param card_security_code
    * @param plaid_account_id
    * @param plaid_access_token
    * @param plaid_item_id
    * @param custom_field_1
    * @param custom_field_2

*/

public function createPayMethod($parameters = array()) { return $this->http('POST','PayMethod/Create', $parameters); }



/* verifyPayMethod

Utilize this endpoint to verify a payment method.

    * Required Parameters:
    * @param pay_method_id

    * Optional Parameters:
    * @param micro_charge_amount
    * @param force_verification

*/

public function verifyPayMethod($parameters = array()) { return $this->http('POST','PayMethod/Verify', $parameters); }



/* historyPayMethod

List the payment history for a specific payment method or account.

    * Optional Parameters:
    * @param pay_method_id
    * @param customer_account_id

*/

public function historyPayMethod($parameters = array()) { return $this->http('GET','PayMethod/History', $parameters); }



/* deletePayMethod

Delete a pay method from an account. The pay method will be unassociated with any existing associated subscriptions.

    * Required Parameters:
    * @param pay_method_id

*/

public function deletePayMethod($pay_method_id) { return $this->http('DELETE', 'PayMethod/Delete', ['pay_method_id' => $pay_method_id]); }



/* listPayment

List payments connected to a customer account, invoice, or subscription.

    * Optional Parameters:
    * @param payment_id
    * @param invoice_id
    * @param customer_account_id
    * @param pay_method_id
    * @param subscription_id
    * @param payment_transaction_id

*/

public function listPayment($parameters = array()) { return $this->http('GET','Payment/List', $parameters); }



/* createPayment

Post a payment to an existing invoice using a pay method on the customers account or using 'Cash' or other form of third party pay method.

    * Required Parameters:
    * @param customer_account_id
    * @param apply_to_prepaid_balance
    * @param override_billing
    * @param amount

    * Optional Parameters:
    * @param invoice_id
    * @param pay_method_id
    * @param payment_gateway
    * @param payment_transaction_id

*/

public function createPayment($parameters = array()) { return $this->http('POST','Payment/Create', $parameters); }



/* deletePayment

Delete an existing payment. If the payment was processed with a real time gateway, RecurringStack™ will attempt to refund the payment using the same gatway.

    * Required Parameters:
    * @param payment_id
    * @param customer_account_id
    * @param invoice_id

*/

public function deletePayment($parameters = array()) { return $this->http('DELETE','Payment/Delete', $parameters); }



/* listPayGateway

List all of your previously connected real-time payment gateways associated with the brand. This service will also list all payment gateways supported by RecurringStack™ along with their required credentials (leave 'gateway_id' parameter empty).

    * Optional Parameters:
    * @param gateway_id
    * @param gateway_provider

*/

public function listPayGateway($parameters = array()) { return $this->http('GET','PayGateway/List', $parameters); }



/* createPayGateway

Create or link a new payment gateway to process real-time payments.

    * Required Parameters:
    * @param name
    * @param gateway_provider
    * @param credentials_1

    * Optional Parameters:
    * @param credentials_2
    * @param default_cc
    * @param default_ba

*/

public function createPayGateway($parameters = array()) { return $this->http('POST','PayGateway/Create', $parameters); }



/* updatePayGateway

Update a previously linked payment gateway and/or set it as the brands default credit card or ACH real-time processing gateway.

    * Required Parameters:
    * @param gateway_id
    * @param name
    * @param credentials_1

    * Optional Parameters:
    * @param credentials_2
    * @param default_cc
    * @param default_ba

*/

public function updatePayGateway($parameters = array()) { return $this->http('PATCH','PayGateway/Update', $parameters); }



/* deletePayGateway

Delete an existing payment gateway. If the pay gateway is currently the default for the brand, the brand will be left without a default gateway for payment processing.

    * Required Parameters:
    * @param gateway_id

*/

public function deletePayGateway($gateway_id) { return $this->http('DELETE', 'PayGateway/Delete', ['gateway_id' => $gateway_id]); }



/* setDefaultPayMethod

Set or unset a payment method as default on a customer account. If the payment method is already the defualt for the account, calling this service will remove it. Likewise, if the payment method is currently not the default payment method this service will set it as default.

Default payment methods are utilized for automated recurring subscription billing / invoice payment when 'auto_renew' is set to Y on the subscription.

    * Required Parameters:
    * @param pay_method_id
    * @param customer_account_id
    * @param type

*/

public function setDefaultPayMethod($parameters = array()) { return $this->http('PATCH','PayMethod/SetDefault', $parameters); }



/* listProductGroup

List product groups for a brand.

    * Optional Parameters:
    * @param product_group_id

*/

public function listProductGroup($parameters = array()) { return $this->http('GET','ProductGroup/List', $parameters); }



/* createProductGroup

Create and associate a new product group for a brand.

    * Required Parameters:
    * @param name
    * @param description

    * Optional Parameters:
    * @param action_url
    * @param VAR1
    * @param VAR2
    * @param VAR3
    * @param VAR4
    * @param VAR5
    * @param VAR6
    * @param VAR7
    * @param VAR8
    * @param VAR9
    * @param VAR10

*/

public function createProductGroup($parameters = array()) { return $this->http('POST','ProductGroup/Create', $parameters); }



/* updateProductGroup

Update an existing product group.

    * Required Parameters:
    * @param product_group_id

    * Optional Parameters:
    * @param name
    * @param description
    * @param action_url
    * @param VAR1
    * @param VAR2
    * @param VAR3
    * @param VAR4
    * @param VAR5
    * @param VAR6
    * @param VAR7
    * @param VAR8
    * @param VAR9
    * @param VAR10

*/

public function updateProductGroup($parameters = array()) { return $this->http('PATCH','ProductGroup/Update', $parameters); }



/* suspendProductGroup

Temporarily suspend a product group.

    * Required Parameters:
    * @param product_group_id

*/

public function suspendProductGroup($product_group_id) { return $this->http('PATCH', 'ProductGroup/Suspend', ['product_group_id' => $product_group_id]); }



/* deleteProductGroup

Utilize this service to delete an existing product group.

    * Required Parameters:
    * @param product_group_id

*/

public function deleteProductGroup($product_group_id) { return $this->http('DELETE', 'ProductGroup/Delete', ['product_group_id' => $product_group_id]); }



/* restoreProductGroup

Restore a product group from suspended or deleted status.

    * Required Parameters:
    * @param product_group_id

*/

public function restoreProductGroup($product_group_id) { return $this->http('PATCH', 'ProductGroup/Restore', ['product_group_id' => $product_group_id]); }



/* listComponent

List all components or all components nested under the specified 'product_group_id'. If no 'product_group_id' is provided then all components nested under the 'brand_id' will be returned. To retrieve a specific componet provide the 'component_id'. Max results 300.

    * Optional Parameters:
    * @param component_id
    * @param custom_field_1
    * @param custom_field_2

*/

public function listComponent($parameters = array()) { return $this->http('GET','Component/List', $parameters); }



/* createComponent

Create a new components. Components are like add-on's for an exsiting product. A customer subscribed to a product will have the ability to add components from the product group of the subscribed product. Components allow you to track usage, charge for additional services, and more. There are three types of components: TRADITIONAL: A traditional add-on that has a set price ('unit_price') and is billed on a recurring basis with the subscription (eg. server backup service for X/month). METERED: Great for services where the amount changes during the billing cycle and resets to zero at the beginning of the next cycle. (e.g. data used for IoT or cloud storage space). You can use the 'Subscription/ReportUsage' API to update the current usage amount at anytime. QUANTITATIVE: Recurring quantity-based components are used to bill for the number of some unit (e.g. IP addresses; SaaS users; or software licenses). Additional units can be added to the subscription at anytime (eg. customer wishes to add IP address to hosting package).

    * Required Parameters:
    * @param component_type
    * @param product_group_id
    * @param name
    * @param description
    * @param unit_price
    * @param taxable

    * Optional Parameters:
    * @param starting_quantity
    * @param maximum_units
    * @param setup_fee
    * @param custom_field_1
    * @param custom_field_2

*/

public function createComponent($parameters = array()) { return $this->http('POST','Component/Create', $parameters); }



/* updateComponent

Update an existing component.

    * Required Parameters:
    * @param component_id
    * @param component_type
    * @param product_group_id
    * @param name
    * @param description
    * @param unit_price
    * @param taxable

    * Optional Parameters:
    * @param starting_quantity
    * @param maximum_units
    * @param setup_fee
    * @param custom_field_1
    * @param custom_field_2

*/

public function updateComponent($parameters = array()) { return $this->http('PATCH','Component/Update', $parameters); }



/* suspendComponent

Suspend a component. When a component is suspended it will not be available for adding to a customers active subscription but will continue to be billed for customers already utilizing the component.

    * Required Parameters:
    * @param component_id

*/

public function suspendComponent($component_id) { return $this->http('PATCH', 'Component/Suspend', ['component_id' => $component_id]); }



/* deleteComponent

Delete a component. Deleteting a component makes it unavailable to existing subscriptions and new subscriptions.

    * Required Parameters:
    * @param component_id

*/

public function deleteComponent($component_id) { return $this->http('DELETE', 'Component/Delete', ['component_id' => $component_id]); }



/* restoreComponent

Restore a component. Restore a component from suspend (2) or deletion (3). Components can be restored for up to 90 days.

    * Required Parameters:
    * @param component_id

*/

public function restoreComponent($component_id) { return $this->http('POST', 'Component/Restore', ['component_id' => $component_id]); }



/* listProduct

Search products for a brand. Provide a 'product_id' to find a specific product (including a deleted one).

    * Optional Parameters:
    * @param product_id
    * @param product_group_id
    * @param custom_field_1
    * @param custom_field_2

*/

public function listProduct($parameters = array()) { return $this->http('GET','Product/List', $parameters); }



/* createProduct

Create a product.

    * Required Parameters:
    * @param product_group_id
    * @param name
    * @param description
    * @param expiration_interval
    * @param setup_fee
    * @param recurring_price
    * @param trial
    * @param auto_pay_discount
    * @param prompt_for_variables
    * @param tax_exempt

    * Optional Parameters:
    * @param trial_interval
    * @param trial_price
    * @param auto_pay_discount_amount
    * @param custom_field_1
    * @param custom_field_2

*/

public function createProduct($parameters = array()) { return $this->http('POST','Product/Create', $parameters); }



/* updateProduct

Update a product.

    * Required Parameters:
    * @param product_id
    * @param name
    * @param description
    * @param expiration_interval
    * @param setup_fee
    * @param recurring_price
    * @param trial
    * @param auto_pay_discount
    * @param prompt_for_variables
    * @param tax_exempt

    * Optional Parameters:
    * @param trial_interval
    * @param trial_price
    * @param auto_pay_discount_amount
    * @param custom_field_1
    * @param custom_field_2

*/

public function updateProduct($parameters = array()) { return $this->http('PATCH','Product/Update', $parameters); }



/* suspendProduct

Suspend a product. A product placed in suspend cannot be part of a new subscription. Existing subscriptions will continue to be billed for the product. To remove the product from existing subscriptions use 'Product/Delete' instead.

    * Required Parameters:
    * @param product_id

*/

public function suspendProduct($product_id) { return $this->http('PATCH', 'Product/Suspend', ['product_id' => $product_id]); }



/* deleteProduct

Delete a product. Deleting a product make it unavailable for new subscribcriptions and removes it from existing subscriptions. Although products can be restored up to 90 days later it will no longer be attached to subscriptions it was linked with before deletion.

    * Required Parameters:
    * @param product_id

*/

public function deleteProduct($product_id) { return $this->http('DELETE', 'Product/Delete', ['product_id' => $product_id]); }



/* restoreProduct

Restore a product. You can restore a product from suspended (2) or deleted (3) status for up to 90 days.

    * Required Parameters:
    * @param product_id

*/

public function restoreProduct($product_id) { return $this->http('PATCH', 'Product/Restore', ['product_id' => $product_id]); }



/* listCoupon

List coupons connected to a product group or for the entire brand. To list a specific coupon provide a 'coupon_id'.

    * Optional Parameters:
    * @param coupon_id
    * @param product_group_id

*/

public function listCoupon($parameters = array()) { return $this->http('GET','Coupon/List', $parameters); }



/* createCoupon

Create a new coupon and assign it to specific products. All coupons must be assigned to a product group, meaning they will only work with products from that group.

    * Required Parameters:
    * @param product_group_id
    * @param name
    * @param description
    * @param coupon_code
    * @param coupon_type
    * @param coupon_duration
    * @param discount_amount
    * @param expiration_date
    * @param expiration_time
    * @param stackable

    * Optional Parameters:
    * @param restricted_products
    * @param max_use

*/

public function createCoupon($parameters = array()) { return $this->http('POST','Coupon/Create', $parameters); }



/* updateCoupon

Update an existing coupon.

    * Required Parameters:
    * @param coupon_id
    * @param product_group_id
    * @param name
    * @param description
    * @param coupon_code
    * @param coupon_type
    * @param coupon_duration
    * @param discount_amount
    * @param expiration_date
    * @param expiration_time
    * @param stackable

    * Optional Parameters:
    * @param restricted_products
    * @param max_use

*/

public function updateCoupon($parameters = array()) { return $this->http('PATCH','Coupon/Update', $parameters); }



/* deleteCoupon

Delete a coupon.

    * Required Parameters:
    * @param coupon_id

*/

public function deleteCoupon($coupon_id) { return $this->http('DELETE', 'Coupon/Delete', ['coupon_id' => $coupon_id]); }



/* listDunningRule

List all dunning rules for one or more product groups.

    * Optional Parameters:
    * @param product_group_id

*/

public function listDunningRule($parameters = array()) { return $this->http('GET','DunningRule/List', $parameters); }



/* createDunningRule

Create a new dunning rule. Dunning rules determine when a subscription is suspended or deleted based on the status of past-due invoices linked to the subscription.

    * Required Parameters:
    * @param product_group_id
    * @param name
    * @param description
    * @param overdue_days
    * @param overdue_amount
    * @param enforcement_action

    * Optional Parameters:
    * @param post_url

*/

public function createDunningRule($parameters = array()) { return $this->http('POST','DunningRule/Create', $parameters); }



/* updateDunningRule

Update an existing dunning rule.

    * Required Parameters:
    * @param rule_id
    * @param product_group_id
    * @param name
    * @param description
    * @param overdue_days
    * @param overdue_amount
    * @param enforcement_action

    * Optional Parameters:
    * @param post_url

*/

public function updateDunningRule($parameters = array()) { return $this->http('PATCH','DunningRule/Update', $parameters); }



/* deleteDunningRule

Deletes an pre-existing dunning rule.

    * Required Parameters:
    * @param rule_id

*/

public function deleteDunningRule($rule_id) { return $this->http('DELETE', 'DunningRule/Delete', ['rule_id' => $rule_id]); }



/* listReference

Utilize the reference endpoint to find reference data needed for other API services.

    * Required Parameters:
    * @param reference_type

*/

public function listReference($reference_type) { return $this->http('GET', 'Reference/List', ['reference_type' => $reference_type]); }



/* listSubscription

List existing subscriptions. Maximum resuts is 100 subscriptions.

    * Optional Parameters:
    * @param subscription_id
    * @param customer_account_id
    * @param status
    * @param custom_field_1
    * @param custom_field_2

*/

public function listSubscription($parameters = array()) { return $this->http('GET','Subscription/List', $parameters); }



/* estimateSubscription

Estimate the cost of creating a new subscription for a customer. This endpoint allows you to calculate and optionally display the up-front and future cost of a subscription to a customer.

    * Required Parameters:
    * @param customer_account_id
    * @param product_id

    * Optional Parameters:
    * @param attached_components
    * @param coupon_code
    * @param pay_method_id
    * @param override_initial_billing

*/

public function estimateSubscription($parameters = array()) { return $this->http('GET','Subscription/Estimate', $parameters); }



/* createSubscription

Create a new subscription for a customer.

When creating a subscription, you must specify a product (product_id) and a customer (customer_account_id). One or more components can be attached to the subscription at the time of it's creation or you can attach components at any time in the future.

    * Required Parameters:
    * @param customer_account_id
    * @param product_id
    * @param override_initial_billing
    * @param auto_pay

    * Optional Parameters:
    * @param attached_components
    * @param coupon_code
    * @param pay_method_id
    * @param payment_gateway
    * @param payment_transaction_id
    * @param custom_field_1
    * @param custom_field_2
    * @param VAR1
    * @param VAR2
    * @param VAR3
    * @param VAR4
    * @param VAR5
    * @param VAR6
    * @param VAR7
    * @param VAR8
    * @param VAR9
    * @param VAR10

*/

public function createSubscription($parameters = array()) { return $this->http('POST','Subscription/Create', $parameters); }



/* updateSubscription

Update an existing subscription.

Changes made to a subscription will take effect immediately. If changes are made before the billing cycle renewal date the next payment will be calculated using the updated data (after the change), not the old data (before the change).

    * Required Parameters:
    * @param subscription_id
    * @param customer_account_id
    * @param auto_pay

    * Optional Parameters:
    * @param attached_components
    * @param coupon_code
    * @param payment_transaction_id
    * @param renewal_date
    * @param pay_method_id
    * @param custom_field_1
    * @param custom_field_2
    * @param VAR1
    * @param VAR2
    * @param VAR3
    * @param VAR4
    * @param VAR5
    * @param VAR6
    * @param VAR7
    * @param VAR8
    * @param VAR9
    * @param VAR10

*/

public function updateSubscription($parameters = array()) { return $this->http('POST','Subscription/Update', $parameters); }



/* changeProductSubscription

Change the product associated with an existing subscription.

    * Required Parameters:
    * @param subscription_id
    * @param customer_account_id
    * @param product_id

    * Optional Parameters:
    * @param remove_components
    * @param remove_coupons

*/

public function changeProductSubscription($parameters = array()) { return $this->http('POST','Subscription/ChangeProduct', $parameters); }



/* suspendSubscription

Place a active subscription in a suspended state.

    * Required Parameters:
    * @param subscription_id

*/

public function suspendSubscription($subscription_id) { return $this->http('PATCH', 'Subscription/Suspend', ['subscription_id' => $subscription_id]); }



/* deleteSubscription

Cancel/delete a subscription.

    * Required Parameters:
    * @param subscription_id

*/

public function deleteSubscription($subscription_id) { return $this->http('DELETE', 'Subscription/Delete', ['subscription_id' => $subscription_id]); }



/* reportUsageSubscription

This service allows you to report usage for a compnent already attached to a subscription.

You may choose to report metered or prepaid usage as you wish. If usage events occur in your system very frequently (hundreads of times an hour or more), it is best to accumulate usage into batches on your side, and then report those batches less frequently, such as daily. This will ensure you remain below any API throttling limits.

    * Required Parameters:
    * @param subscription_id
    * @param customer_account_id
    * @param component_id
    * @param units
    * @param expression_type

*/

public function reportUsageSubscription($parameters = array()) { return $this->http('PATCH','Subscription/ReportUsage', $parameters); }



/* restoreSubscription

If you suspended or paused a subscription for any reason you can utilize this service to restore it.

RecurringStack™ may also suspend a subscription in accordance with your dunning rules (usually when a customer has unpaid invoices), this service may be used to override these kind of suspension as well.

    * Required Parameters:
    * @param subscription_id

*/

public function restoreSubscription($subscription_id) { return $this->http('PATCH', 'Subscription/Restore', ['subscription_id' => $subscription_id]); }



/* listOffer

List one or more offers connected to the brand.

    * Optional Parameters:
    * @param offer_id

*/

public function listOffer($parameters = array()) { return $this->http('GET','Offer/List', $parameters); }



/* updateAutoPaySubscription

Updtae the auto pay status and pay method for a subscription.

    * Required Parameters:
    * @param subscription_id
    * @param customer_account_id
    * @param auto_pay

    * Optional Parameters:
    * @param pay_method_id

*/

public function updateAutoPaySubscription($parameters = array()) { return $this->http('PATCH','Subscription/UpdateAutoPay', $parameters); }



/* listTicket

List and search for one or multiple support tickets.

    * Optional Parameters:
    * @param ticket_id
    * @param friendly_ticket_id
    * @param direction
    * @param working_status
    * @param customer_account_id
    * @param subscription_id
    * @param limit
    * @param order
    * @param offset

*/

public function listTicket($parameters = array()) { return $this->http('GET','Ticket/List', $parameters); }



/* createTicket

Create a new ticket or create a new message on an existing ticket.

    * Required Parameters:
    * @param type
    * @param message

    * Optional Parameters:
    * @param ticket_id
    * @param attachments
    * @param subject
    * @param direction
    * @param department
    * @param customer_account_id
    * @param customer_user_id
    * @param subscription_id
    * @param guest_email

*/

public function createTicket($parameters = array()) { return $this->http('POST','Ticket/Create', $parameters); }



/* updateTicket

Update an existing ticket, including the ticket status.

    * Required Parameters:
    * @param ticket_id

    * Optional Parameters:
    * @param subject
    * @param working_status
    * @param department
    * @param customer_account_id
    * @param subscription_id

*/

public function updateTicket($parameters = array()) { return $this->http('PATCH','Ticket/Update', $parameters); }



/* mergeTicket

Merge one ticket with another ticket. Messages from both tickets will be maintained while the subject of the original ticket (ticket_id) will be maintained.

    * Required Parameters:
    * @param ticket_id
    * @param merge_ticket_id

*/

public function mergeTicket($parameters = array()) { return $this->http('PATCH','Ticket/Merge', $parameters); }



/* deleteTicket

Delete a support ticket.

    * Required Parameters:
    * @param ticket_id

*/

public function deleteTicket($ticket_id) { return $this->http('DELETE', 'Ticket/Delete', ['ticket_id' => $ticket_id]); }



/* listTransaction

All transactions (except 'List') are recorded in the transaction history. You can search the transaction history to find information on previous transactions.

    * Optional Parameters:
    * @param transaction_id
    * @param customer_account_id
    * @param subscription_id
    * @param invoice_id
    * @param user_id
    * @param api_category
    * @param api_service
    * @param ip_address

*/

public function listTransaction($parameters = array()) { return $this->http('GET','Transaction/List', $parameters); }




//http - Sends the request to RecurringStack™
private function http ($http_method,$api_service,$params) { 

    //Initiate Guzzle
    $guzzle_http_client = new \GuzzleHttp\Client(['base_uri' => 'https://api.recurringstack.com/' . $this->response_format . '/','timeout' => 10.0]);


    //Send Request
    if ($http_method != '') { 

        $formatted_params = [
            'query' => $params,
            'headers' => [
                'X-Api-Key'  => $this->key,
                'X-User-Key' => $this->user_key,
                'X-Brand-Id' => $this->brand_id,
            ]
        ];

        try {

        $response = $guzzle_http_client->request($http_method,$api_service,$formatted_params); 

            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                $sanitizedMessage = $this->sanitizeErrorMessage($e->getMessage());
                throw new apiException("Connection Error : " . $sanitizedMessage, '500', "500", $formatted_params, '');
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                $sanitizedMessage = $this->sanitizeErrorMessage($e->getMessage());
                throw new apiException("Request Error : " . $sanitizedMessage, '500', "500", $formatted_params, '');
            } catch (\GuzzleHttp\Exception\ServerException $e) {
                $sanitizedMessage = $this->sanitizeErrorMessage($e->getMessage());
                throw new apiException("Server Error : " . $sanitizedMessage, '500', "500", $formatted_params, '');
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $sanitizedMessage = $this->sanitizeErrorMessage($e->getMessage());
                throw new apiException("Client Error : " . $sanitizedMessage, '500', "500", $formatted_params, '');
            } catch (\GuzzleHttp\Exception\TransferException $e) {
                $sanitizedMessage = $this->sanitizeErrorMessage($e->getMessage());
                throw new apiException("Transfer Error : " . $sanitizedMessage, '500', "500", $formatted_params, '');
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                $sanitizedMessage = $this->sanitizeErrorMessage($e->getMessage());
                throw new apiException("Guzzle Error : " . $sanitizedMessage, '500', "500", $formatted_params, '');
            } catch (\Exception $e) {
                $sanitizedMessage = $this->sanitizeErrorMessage($e->getMessage());
                throw new apiException("Unknown Error : " . $sanitizedMessage, '500', "500", $formatted_params, '');
            }

    };


    //Check for a successful header
    if ($response->getStatusCode() != '200') { throw new apiException("http error",strval($response->getStatusCode()),$response->getStatusCode(),$formatted_params,strval($response->getBody()->getContents())); };

    //if ($this->)
    //return $response->getBody()->getContents();
    
    //Decode and check for errors
    if ($this->response_format == 'json') {
        $decoded = json_decode($response->getBody()->getContents());
        if ($decoded->exception != '') { throw new apiException(strval($decoded->exception),strval($decoded->exception->attributes()->code),$response->getStatusCode(),$formatted_params,strval($response->getBody()->getContents())); }; //Catch exception on Json
    }

    if ($this->response_format == 'xml') {
        libxml_use_internal_errors(true);
        $decoded = simplexml_load_string($response->getBody()->getContents());
        if ($decoded->exception != '') { throw new apiException(strval($decoded->exception),strval($decoded->exception->attributes()->code),$response->getStatusCode(),$formatted_params,strval($response->getBody()->getContents())); }; //Catch exception on XML
    if (false === $decoded) {
        foreach(libxml_get_errors() as $error) {
            $xml_errors_pre = "\t" . $error->message;
            $xml_errors = $xml_errors_pre . $xml_errors;
        }
            throw new apiException(strval($decoded->exception),strval($response->getStatusCode()),$response->getStatusCode(),$formatted_params,strval($response->getBody()->getContents())); //XML Decoding Error
        }    
    }

    //Return specified format
    if ($this->response_type != 'clean') { return $response->getBody()->getContents();  }else{ return $decoded;  };

}

    // Removes sensitive information from the error message
    private function sanitizeErrorMessage($message) {
        // Regular expression to match and remove sensitive information
        $pattern = '/(key|user_key|brand_id)=\w+/';
        return preg_replace($pattern, '$1=****', $message);
    }

}
?>