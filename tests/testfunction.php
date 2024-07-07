<?php
require('../src/functions.inc.php');
use PHPUnit\Framework\TestCase;

class testfunction extends TestCase
{
    public function testGetMaxMin()
    {
        $items = ['Item A', 'Item B', 'Item C'];
        $attendances = [10, 5, 8];
        
       
        list($maxItem, $minItem) = getMaxMin($items, $attendances);
        $this->assertEquals('Item A - 10', $maxItem);
        $this->assertEquals('Item B - 5', $minItem);
    }

    public function testGetMaxMinWithEqual()
    {
        $items = ['Item A', 'Item B', 'Item C'];
        $attendances = [10, 10, 8];
        
       
        list($maxItem, $minItem) = getMaxMin($items, $attendances);
        $this->assertEquals('Item A - 10', $maxItem);
        $this->assertEquals('Item C - 8', $minItem);
    }

    public function testGetMaxMinWithAllEqual()
    {
        $items = ['Item A', 'Item B', 'Item C'];
        $attendances = [10, 10, 10];
        
       
        list($maxItem, $minItem) = getMaxMin($items, $attendances);
        $this->assertEquals('Item A - 10', $maxItem);
        $this->assertEquals('Item C - 10', $minItem);
    }
    
}
