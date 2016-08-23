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
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use TalkDemo\Domain\Model\User\UserId;
use TalkDemo\Domain\Model\User\Username;
use TalkDemo\Http\ErrorHandler;
use TalkDemo\Http\Api\User\FindUserAction;
use TalkDemo\Http\Api\User\ListUsersAction;
use TalkDemo\Http\Api\User\UserListPayload;
use TalkDemo\Http\Api\User\UserListResponder;
use TalkDemo\Http\Api\User\UserPayload;
use TalkDemo\Http\Api\User\UserResponder;
use TalkDemo\Http\Responder\ArrayMappingStrategy;
use TalkDemo\Http\Responder\ContainerResponderResolver;
use TalkDemo\Http\Serialization\ValueObjectSerializationHandler;

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
        $resolver = new ContainerResponderResolver($container);

        $resolver->setMappingStrategy(new ArrayMappingStrategy([
            UserListPayload::class => 'userListResponder',
            UserPayload::class => 'userResponder'
        ]));

        return $resolver;
    }

    /**
     * @Bean
     * @Parameters({
     *  @Parameter({"name" = "serialization.metadir"}),
     *  @Parameter({"name" = "serialization.cachedir"})
     * })
     * @return Serializer
     */
    public function serializer($metaDir = '', $cacheDir = '')
    {
        return SerializerBuilder::create()
            ->addMetadataDir($metaDir)
            ->setCacheDir($cacheDir)
            ->configureHandlers(function(HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new ValueObjectSerializationHandler(UserId::class, 'toInteger'));
                $registry->registerSubscribingHandler(new ValueObjectSerializationHandler(Username::class, 'toString'));
            })
            ->build();
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
        return new UserResponder($this->serializer());
    }

    /**
     * @Bean
     * @return UserListResponder
     */
    public function userListResponder()
    {
        return new UserListResponder($this->serializer());
    }
}
