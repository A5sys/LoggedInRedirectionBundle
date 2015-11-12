# LoggedInRedirectionBundle

The bundle redirect the logged in user to an url if he attempt to go to an url.

The use case:

* A user bookmarks the login page and always get the login form even if he is logged in. So we redirect to the homepage.


# Composer

Use composer to get the bundle

    composer require "a5sys/logged-in-redirection-bundle"

# Activate the bundle

In the AppKernel, activate the bundle

    public function registerBundles()
        {
            $bundles = array(
                ...
                new A5sys\LoggedInRedirectionBundle\LoggedInRedirectionBundle(),

# The configuration

You have to add the configuration to your config.yml:

    logged_in_redirection:
        route_name: "fos_user_security_login" #the name of the route to check
        redirect_route_name: "homepage" # the name of the route to redirect
