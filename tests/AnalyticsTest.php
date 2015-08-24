<?php

namespace Segment\Tests;

use Analytics\Segment\Tracker;
use PHPUnit_Framework_TestCase;

class AnalyticsTest extends PHPUnit_Framework_TestCase {

  function setUp() {
    date_default_timezone_set("UTC");
    Tracker::init("oq0vdlg7yi", array("debug" => true));
  }

  function testTrack() {
    $this->assertTrue(Tracker::track(array(
      "userId" => "john",
      "event" => "Module PHP Event"
    )));
  }

  function testGroup(){
    $this->assertTrue(Tracker::group(array(
      "groupId" => "group-id",
      "userId" => "user-id",
      "traits" => array(
        "plan" => "startup"
      )
    )));
  }

  function testMicrotime(){
    $this->assertTrue(Tracker::page(array(
      "anonymousId" => "anonymous-id",
      "name" => "analytics-php-microtime",
      "category" => "docs",
      "timestamp" => microtime(true),
      "properties" => array(
        "path" => "/docs/libraries/php/",
        "url" => "https://segment.io/docs/libraries/php/"
      )
    )));    
  }

  function testPage(){
    $this->assertTrue(Tracker::page(array(
      "anonymousId" => "anonymous-id",
      "name" => "analytics-php",
      "category" => "docs",
      "properties" => array(
        "path" => "/docs/libraries/php/",
        "url" => "https://segment.io/docs/libraries/php/"
      )
    )));
  }

  function testBasicPage(){
    $this->assertTrue(Tracker::page(array(
      "anonymousId" => "anonymous-id"
    )));
  }

  function testScreen(){
    $this->assertTrue(Tracker::screen(array(
      "anonymousId" => "anonymous-id",
      "name" => "2048",
      "category" => "game built with php :)",
      "properties" => array(
        "points" => 300
      )
    )));
  }

  function testBasicScreen(){
    $this->assertTrue(Tracker::screen(array(
      "anonymousId" => "anonymous-id"
    )));
  }

  function testIdentify() {
    $this->assertTrue(Tracker::identify(array(
      "userId" => "doe",
      "traits" => array(
        "loves_php" => false,
        "birthday" => time()
      )
    )));
  }

  function testEmptyTraits() {
    $this->assertTrue(Tracker::identify(array(
      "userId" => "empty-traits"
    )));

    $this->assertTrue(Tracker::group(array(
      "userId" => "empty-traits",
      "groupId" => "empty-traits"
    )));
  }

  function testEmptyArrayTraits() {
    $this->assertTrue(Tracker::identify(array(
      "userId" => "empty-traits",
      "traits" => array()
    )));

    $this->assertTrue(Tracker::group(array(
      "userId" => "empty-traits",
      "groupId" => "empty-traits",
      "traits" => array()
    )));
  }

  function testEmptyProperties() {
    $this->assertTrue(Tracker::track(array(
      "userId" => "user-id",
      "event" => "empty-properties"
    )));

    $this->assertTrue(Tracker::page(array(
      "category" => "empty-properties",
      "name" => "empty-properties",
      "userId" => "user-id"
    )));
  }

  function testEmptyArrayProperties(){
    $this->assertTrue(Tracker::track(array(
      "userId" => "user-id",
      "event" => "empty-properties",
      "properties" => array()
    )));

    $this->assertTrue(Tracker::page(array(
      "category" => "empty-properties",
      "name" => "empty-properties",
      "userId" => "user-id",
      "properties" => array()
    )));
  }

  function testAlias() {
    $this->assertTrue(Tracker::alias(array(
      "previousId" => "previous-id",
      "userId" => "user-id"
    )));
  }
}
