<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * A ControllerResolverInterface implementation knows how to determine the
 * controller to execute based on a Request object.
 *
 * It can also determine the arguments to pass to the Controller.
 *
 * A Controller can be any valid PHP callable.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface ControllerResolverInterface
{
    /**
     * Returns the Controller instance associated with a Request.
     *
     * As several resolvers can exist for a single application, a resolver must
     * return false when it is not able to determine the controllers.
     *
     * The resolver must only throw an exception when it should be able to load
     * controllers but cannot because of some errors made by the developer.
     *
     * @param Request $request A Request instance
     *
     * @return callable|false A PHP callable representing the Controller,
     *                        or false if this resolver is not able to determine the controllers
     *
     * @throws \LogicException If the controllers can't be found
     */
    public function getController(Request $request);

    /**
     * Returns the arguments to pass to the controllers.
     *
     * @param Request  $request    A Request instance
     * @param callable $controller A PHP callable
     *
     * @return array An array of arguments to pass to the controllers
     *
     * @throws \RuntimeException When value for argument given is not provided
     */
    public function getArguments(Request $request, $controller);
}
