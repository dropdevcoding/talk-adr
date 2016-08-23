<?php
namespace TalkDemo;

use bitExpert\Disco\Annotations\Bean;
use bitExpert\Disco\Annotations\Configuration;
use bitExpert\Disco\Annotations\Parameter;
use bitExpert\Disco\Annotations\Parameters;
use bitExpert\Adrenaline\Adrenaline;
use bitExpert\Pathfinder\Psr7Router;
use bitExpert\Pathfinder\RouteBuilder;
use bitExpert\Adroit\Action\Resolver\ContainerActionResolver;
use bitExpert\Adroit\Responder\Resolver\ContainerResponderResolver;
use TalkDemo\User\FindUserAction;
use TalkDemo\User\ListUsersAction;
use TalkDemo\User\UserListResponder;
use TalkDemo\User\UserResponder;

/**
 * @Configuration
 */
class Config
{
    /**
     * @Bean
     * @return Adrenaline
     */
    public function application()
    {
        $app = new Adrenaline([
            $this->actionResolver()
        ], [
            $this->responderResolver()
        ], $this->router());

        $app->setErrorHandler($this->errorHandler());
        return $app;
    }

    /**
     * @Bean
     * @return ErrorHandler
     */
    public function errorHandler()
    {
        return new ErrorHandler();
    }

    /**
     * @Bean
     * @return Psr7Router
     */
    public function router()
    {
        $router = new Psr7Router();
        $router->setRoutes([
            RouteBuilder::route()
                ->get('/users')
                ->to('listUsersAction')
                ->build(),
            RouteBuilder::route()
                ->get('/user/[:id]')
                ->to('findUserAction')
                ->build()
        ]);

        return $router;
    }

    /**
     * @Bean
     * @return ContainerActionResolver
     */
    public function actionResolver()
    {
        $container = \bitExpert\Disco\BeanFactoryRegistry::getInstance();
        return new ContainerActionResolver($container);
    }

    /**
    * @Bean
    * @return ContainerResponderResolver
    */
    public function responderResolver()
    {
        $container = \bitExpert\Disco\BeanFactoryRegistry::getInstance();
        return new ContainerResponderResolver($container);
    }

    /**
     * @Bean
     * @return FindUserAction
     */
    public function findUserAction()
    {
        return new FindUserAction();
    }

    /**
     * @Bean
     * @return ListUsersAction
     */
    public function listUsersAction()
    {
        return new ListUsersAction();
    }

    /**
     * @Bean
     * @return UserResponder
     */
    public function userResponder()
    {
        return new UserResponder();
    }

    /**
     * @Bean
     * @return UserListResponder
     */
    public function userListResponder()
    {
        return new UserListResponder();
    }
}
