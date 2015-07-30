<?php
require __DIR__ . '/../src/Database.php';

class DatabaseTest extends \PHPUnit_Framework_TestCase {
	
	private $db;
	
	/*
	 * @beforeClass
	 */
	public function setup() {
		$this->db = new Database();
	}
	
	public function testClass() {
		$this->assertInstanceOf(Database::class, $this->db);
	}
	
	public function testConnect() {
		$this->assertTrue($this->db->connect());
	}
	
	public function testDisconnect() {
		$this->db->connect();
		$this->assertTrue($this->db->disconnect());
	}
	
	public function testIsConnectedTrue() {
		$this->db->connect();
		$this->assertTrue($this->db->isConnected());
	}
	
	public function testIsConnectedFalse() {
		$this->assertFalse($this->db->isConnected());
	}
	
	public function testSetHost1() {
		$name = "user.mysql.cs.st-andrews.ac.uk";
		$this->db->setName($name);
		$result = $this->db->getHost();
		$this->assertEqual($name, $result);
	}
	
	/**
	 * @expectedException DatabaseIsConnected
	 */
	public function testSetHost2() {
		$name = "user.mysql.cs.st-andrews.ac.uk";
		$this->db->setName($name);
		$result = $this->db->getHost();
		$this->assertEqual($name, $result);
	}
}
