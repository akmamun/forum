# Build A Forum Application with Laravel 

* Used Laravel 5.5

# Functionalities:
* User Registration/Login with Mail Verification  
* User Forum Post
* User Forum Comment
* User Forum Reply
* Adding Channel Slug
* Filter With Archives
* Adding RestFull Api
* Send Mail with Queue

After these steps the user can still login without verifying.

In order to resolve this (in Laravel 5.5 anyways) you need to edit 
Illuminate\Foundation\Auth\AuthenticatesUsers
Find this function:
```php
protected function credentials(Request $request)
 {
 return $request->only($this->username(), ‘password’); 
 }

and change it to:

protected function credentials(Request $request)
 {
 return array_merge($request->only($this->username(), ‘password’), [‘verified’ => 1]);
 }
```
