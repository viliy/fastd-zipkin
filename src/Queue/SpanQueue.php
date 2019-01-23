<?php
/**
 * @author: ZhaQiu <34485431@qq.com>
 * @time: 2018/11/20
 */

namespace Zhaqq\Zipkin\Queue;

use Zhaqq\Zipkin\Contracts\QueueInterface;

/**
 * Class SpanQueue
 */
class SpanQueue implements QueueInterface
{
    public function run()
    {
        app()->get('zipkin')->finished();
    }
}
