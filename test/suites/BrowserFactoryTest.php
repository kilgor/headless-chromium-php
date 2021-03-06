<?php
/**
 * @license see LICENSE
 */

namespace HeadlessChromium\Test;

use HeadlessChromium\BrowserFactory;

/**
 * @covers \HeadlessChromium\BrowserFactory
 * @covers \HeadlessChromium\Browser\BrowserProcess
 */
class BrowserFactoryTest extends BaseTestCase
{

    public function testWindowSizeOption()
    {
        $factory = new BrowserFactory();

        $browser = $factory->createBrowser([
            'windowSize' => [1212, 333]
        ]);

        $page = $browser->createPage();

        $response = $page->evaluate('[window.outerHeight, window.outerWidth]')->getReturnValue();

        $this->assertEquals([333, 1212], $response);
    }

    public function testUserAgentOption()
    {
        $factory = new BrowserFactory();

        $browser = $factory->createBrowser([
            'userAgent' => 'foobarbaz'
        ]);

        $page = $browser->createPage();

        $response = $page->evaluate('navigator.userAgent')->getReturnValue();

        $this->assertEquals('foobarbaz', $response);
    }
}
