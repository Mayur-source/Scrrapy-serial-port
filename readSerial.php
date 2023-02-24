<?php
// Load the serial port extension
if (!extension_loaded('php_serial')) {
    dl('php_serial.' . PHP_SHLIB_SUFFIX);
}

// Define the serial port settings
$serial_port = '/dev/ttyACM0'; // Change this to the correct serial port on your system
$baud_rate = 9600;
$data_bits = 8;
$stop_bits = 1;
$parity = 0;

// Open the serial port
$serial = new phpSerial;
$serial->deviceSet($serial_port);
$serial->confBaudRate($baud_rate);
$serial->confCharacterLength($data_bits);
$serial->confStopBits($stop_bits);
$serial->confParity($parity);
$serial->deviceOpen();

// Read data from the serial port
$data = $serial->readPort();

// Close the serial port
$serial->deviceClose();
?>
