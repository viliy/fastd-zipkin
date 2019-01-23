<?php
/**
 * @author: ZhaQiu <34485431@qq.com>
 * @time: 2018/11/16
 */

namespace Zhaqq\Zipkin\Provider;

use FastD\Container\Container;
use FastD\Container\ServiceProviderInterface;
use Zhaqq\Zipkin\Middleware\ZipkinMiddleware;
use Zhaqq\Zipkin\Span;

/**
 * Class ZipkinProvider
 * @package Provider
 */
class ZipkinProvider implements ServiceProviderInterface
{

    /**
     * @param Container $container
     */
    public function register(Container $container)
    {

        $zipkin = array_merge(
            load(app()->getPath() . '/config/zipkin.php'),
            config()->get('zipkin', [])
        );

        config()->merge(['zipkin' => $zipkin,]);

        $container->add('zipkin', new Span());

        $container->get('dispatcher')->before(new ZipkinMiddleware());
    }
}
