<?php

namespace ProxyManagerGeneratedProxy\__PM__\TalkDemo\Config;

class Generatedb956c07e15872dbad75c2c813bf39921 extends \TalkDemo\Config
{

    /**
     * @var bool flag to toggle if a bean gets wrapped by a LazyProxy or not
     */
    private $forceLazyInit57bcad6f86ed8746763785 = null;

    /**
     * @var object[] contains all the references to session-aware beans.
     */
    private $sessionBeans57bcad6f87062981611245 = null;

    /**
     * @var \bitExpert\Disco\BeanPostProcessor[]
     */
    private $postProcessors57bcad6f8715d830643452 = array(
        
    );

    /**
     * @var array Collection of scalar values which can be injected into beans
     */
    private $parameterValues57bcad6f87323511148850 = array(
        
    );

    private static $signatureb956c07e15872dbad75c2c813bf39921 = 'YTozOntzOjk6ImNsYXNzTmFtZSI7czoxNToiVGFsa0RlbW9cQ29uZmlnIjtzOjc6ImZhY3RvcnkiO3M6NTY6ImJpdEV4cGVydFxEaXNjb1xQcm94eVxDb25maWd1cmF0aW9uXENvbmZpZ3VyYXRpb25GYWN0b3J5IjtzOjE5OiJwcm94eU1hbmFnZXJWZXJzaW9uIjtzOjU6IjEuMC4wIjt9';

    /**
     * {@inheritDoc}
     */
    public function application()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::application();
                $this->initializeBean($instance, "application");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("application");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\bitExpert\Adrenaline\Adrenaline", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function errorHandler()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::errorHandler();
                $this->initializeBean($instance, "errorHandler");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("errorHandler");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\TalkDemo\Http\ErrorHandler", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function router()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::router();
                $this->initializeBean($instance, "router");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("router");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\bitExpert\Pathfinder\Psr7Router", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function actionResolver()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::actionResolver();
                $this->initializeBean($instance, "actionResolver");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("actionResolver");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\bitExpert\Adroit\Action\Resolver\ContainerActionResolver", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function responderResolver()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::responderResolver();
                $this->initializeBean($instance, "responderResolver");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("responderResolver");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\TalkDemo\Http\Responder\ContainerResponderResolver", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function serializer($metaDir = null, $cacheDir = null)
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::serializer($this->getParameter("serialization.metadir", true, null), $this->getParameter("serialization.cachedir", true, null));
                $this->initializeBean($instance, "serializer");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("serializer");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\JMS\Serializer\Serializer", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function findUserAction()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::findUserAction();
                $this->initializeBean($instance, "findUserAction");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("findUserAction");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\TalkDemo\Http\Api\User\FindUserAction", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function listUsersAction()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::listUsersAction();
                $this->initializeBean($instance, "listUsersAction");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("listUsersAction");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\TalkDemo\Http\Api\User\ListUsersAction", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function userResponder()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::userResponder();
                $this->initializeBean($instance, "userResponder");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("userResponder");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\TalkDemo\Http\Api\User\UserResponder", $initializer);
        }

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function userListResponder()
    {
        static $instance = null;

        if ($instance === null) {
            if ($instance === null) {
                $instance = parent::userListResponder();
                $this->initializeBean($instance, "userListResponder");
            }
        }

        if ($this->forceLazyInit57bcad6f86ed8746763785) {
            if ($instance instanceof \ProxyManager\Proxy\VirtualProxyInterface) {
                return $instance;
            }

            $factory     = new \bitExpert\Disco\Proxy\LazyBean\LazyBeanFactory("userListResponder");
            $initializer = function (& $wrappedObject, \ProxyManager\Proxy\LazyLoadingInterface  $proxy, $method, array $parameters, & $initializer) use ($instance) {
                $initializer   = null;
                $wrappedObject = $instance;
                return true;
            };

            return $factory->createProxy("\TalkDemo\Http\Api\User\UserListResponder", $initializer);
        }

        return $instance;
    }

    /**
     * @override constructor
     */
    public function __construct($params = array())
    {
        $this->parameterValues57bcad6f87323511148850 = $params;
        // register {@link \bitExpert\Disco\BeanPostProcessor} instances
        $this->postProcessors57bcad6f8715d830643452[] = new \bitExpert\Disco\BeanFactoryPostProcessor();
    }

    protected function getParameter($propertyName, $required = true, $defaultValue = null)
    {
        $steps = explode('.', $propertyName);
        $value = $this->parameterValues57bcad6f87323511148850;
        $currentPath = [];
        foreach ($steps as $step) {
            $currentPath[] = $step;
            if (isset($value[$step])) {
                $value = $value[$step];
            } else {
                $value = $defaultValue;
                break;
            }
        }

        if ($required && (null === $value)) {
            if (null === $defaultValue) {
                throw new \RuntimeException('Parameter "' .$propertyName. '" is required but not defined and no default value provided!');
            }
            throw new \RuntimeException('Parameter "' .$propertyName. '" not defined!');
        }

        return $value;
    }

    public function __sleep()
    {
        return ["sessionBeans57bcad6f87062981611245"];
    }

    protected function initializeBean(&$bean, $beanName)
    {
        if ($bean instanceof \bitExpert\Disco\FactoryBean) {
            $bean = $bean->getObject();
        }

        if ($bean instanceof \bitExpert\Disco\InitializedBean) {
            $bean->postInitialization();
        }

        foreach ($this->postProcessors57bcad6f8715d830643452 as $postProcessor) {
            $postProcessor->postProcess($bean, $beanName);
        }
    }


}
