<?php

namespace CrowdinApiClient\Tests\Model;

use CrowdinApiClient\Model\Enterprise\Vendor;
use PHPUnit\Framework\TestCase;

/**
 * Class VendorTest
 * @package Crowdin\Tests\Model
 */
class VendorTest extends TestCase
{
    public $vendor;

    public $data = [
        'id' => 52760,
        'name' => 'John Smith Translation Agency',
        'description' => 'John Smith Translation Agency provides services for software and game localization as well as translation into 70+ languages.',
        'status' => 'pending',
    ];

    public function testLoadData()
    {
        $this->vendor = new Vendor($this->data);
        $this->checkData();
    }

    public function testSetData()
    {
        $this->vendor = new Vendor();
        $this->vendor->setId($this->data['id']);
        $this->vendor->setName($this->data['name']);
        $this->vendor->setDescription($this->data['description']);
        $this->vendor->setStatus($this->data['status']);
        $this->checkData();
    }

    public function checkData()
    {
        $this->assertEquals($this->data['id'], $this->vendor->getId());
        $this->assertEquals($this->data['name'], $this->vendor->getName());
        $this->assertEquals($this->data['description'], $this->vendor->getDescription());
        $this->assertEquals($this->data['status'], $this->vendor->getStatus());
    }
}
