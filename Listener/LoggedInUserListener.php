<?php

namespace A5sys\LoggedInRedirectionBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

/**
 *
 */
class LoggedInUserListener
{
    protected $router;
    protected $authorizationChecker;
    protected $redirectRoute;
    protected $accountRouteName;

    /**
     *
     * @param type                 $router
     * @param AuthorizationChecker $authorizationChecker
     * @param string               $accountRouteName
     * @param string               $redirectRoute
     */
    public function __construct($router, AuthorizationChecker $authorizationChecker, $accountRouteName, $redirectRoute)
    {
        $this->router = $router;
        $this->authorizationChecker = $authorizationChecker;
        $this->redirectRoute = $redirectRoute;
        $this->accountRouteName = $accountRouteName;
    }

    /**
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $accountRouteName = $this->accountRouteName;
        $routeName = $event->getRequest()->get('_route');

        //the user is loggued and try to go to the login url
        if ($routeName === $accountRouteName && $this->authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            $url = $this->router->generate($this->redirectRoute);
            $event->setResponse(new RedirectResponse($url));
        }
    }
}
