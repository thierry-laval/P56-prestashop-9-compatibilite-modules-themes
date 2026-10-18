<?php
use Psr\Log\LogLevel;
class Constmod extends Module
{
    const ERROR = 3;
    const PASSWORD_LENGTH = 12;
    public function a()
    {
        $l = LogLevel::WARNING;
        $m = \Monolog\Logger::DEBUG;
        $n = self::ERROR;
        $o = PrestaShopLogger::addLog('x', 3);
        $p = Validate::isPasswd($x, self::PASSWORD_LENGTH);
        return [$l, $m, $n, $o, $p];
    }
}
