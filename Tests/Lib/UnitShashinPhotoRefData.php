<?php

class UnitShashinPhotoRefData extends UnitTestCase {
    private $expectedRefData = array(
        'id' => array(
            'db' => array(
                'type' => 'int unsigned',
                'not_null' => true,
                'primary_key' => true,
                'other' => 'AUTO_INCREMENT')),
        'sourceId' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true,
                'unique_key' => true),
            'picasa' => array('gphoto$id', '$t'),
            'twitpic' => array('short_id'),
            'youtube' => array('id', '$t')),
        'albumId' => array(
            'db' => array(
                'type' => 'smallint unsigned',
                'not_null' => true)),
        'albumType' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '20',
                'not_null' => true)),
        'filename' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255'),
            'picasa' => array('title', '$t')),
        'description' => array(
            'db' => array(
                'type' => 'text'),
            'picasa' => array('summary', '$t'),
            'twitpic' => array('message'),
            'youtube' => array('title', '$t')),
        'linkUrl' => array(
            'db' => array(
                'type' => 'text',
                'not_null' => true),
            'picasa' => array('link', '1', 'href'),
            'youtube' => array('link', '0', 'href')),
        'contentUrl' => array(
            'db' => array(
                'type' => 'text',
                'not_null' => true),
            'picasa' => array('media$group', 'media$content', 0, 'url'),
            'youtube' => array('media$group', 'media$thumbnail', 0, 'url')),
        'contentType' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true),
            'picasa' => array('media$group', 'media$content', 0, 'type'),
            'twitpic' => array('type')),
        'width' => array(
            'db' => array(
                'type' => 'smallint unsigned',
                'not_null' => true),
            'picasa' => array('media$group', 'media$content', 0, 'width'),
            'twitpic' => array('width'),
            'youtube' => array('media$group', 'media$thumbnail', 0, 'width')),
        'height' => array(
            'db' => array(
                'type' => 'smallint unsigned',
                'not_null' => true),
            'picasa' => array('media$group', 'media$content', 0, 'height'),
            'twitpic' => array('height'),
            'youtube' => array('media$group', 'media$thumbnail', 0, 'height')),
        'videoUrl' => array(
            'db' => array(
                'type' => 'text',
                'not_null' => true),
            'picasa' => array('media$group', 'media$content', 2, 'url'),
            'youtube' => array('media$group', 'media$content', 0, 'url')),
        'videoType' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true),
            'picasa' => array('media$group', 'media$content', 2, 'type'),
            'youtube' => array('media$group', 'media$content', 0, 'type')),
        'videoWidth' => array(
            'db' => array(
                'type' => 'smallint unsigned',
                'not_null' => true),
            'picasa' => array('media$group', 'media$content', 2, 'width'),
            'youtube' => array('media$group', 'media$thumbnail', 0, 'width')),
        'videoHeight' => array(
            'db' => array(
                'type' => 'smallint unsigned',
                'not_null' => true),
            'picasa' => array('media$group', 'media$content', 2, 'height'),
            'youtube' => array('media$group', 'media$thumbnail', 0, 'height')),
        'takenTimestamp' => array(
            'db' => array(
                'type' => 'int unsigned',
                'not_null' => true),
            'picasa' => array('exif$tags', 'exif$time', '$t'),
            'twitpic' => array('timestamp'),
            'youtube' => array('yt$recorded', '$t')),
        'uploadedTimestamp' => array(
            'db' => array(
                'type' => 'int unsigned',
                'not_null' => true),
            'picasa' => array('published', '$t'),
            'twitpic' => array('timestamp'),
            'youtube' => array('published', '$t')),
        'tags' => array(
            'db' => array(
                'type' => 'text'),
            'picasa' => array('media$keywords', '$t'),
            'twitpic' => array('tags')),
        'lastSync' => array(
            'db' => array(
                'type' => 'int unsigned')),
        'includeInRandom' => array(
            'db' => array(
                'type' => 'char',
                'length' => '1',
                'other' => "default 'Y'"),
            'input' => array(
                'type' => 'radio',
                'subgroup' => array('Y' => 'Yes', 'N' => 'No'))),
        'sourceOrder' => array(
            'db' => array(
                'type' => 'int unsigned')),
        'fstop' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '10'),
            'picasa' => array('exif$tags', 'exif$fstop', '$t')),
        'make' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '100'),
            'picasa' => array('exif$tags', 'exif$make', '$t')),
        'model' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '100'),
            'picasa' => array('exif$tags', 'exif$model', '$t')),
        'exposure' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '10'),
            'picasa' => array('exif$tags', 'exif$exposure', '$t')),
        'focalLength' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '10'),
            'picasa' => array('exif$tags', 'exif$focallength', '$t')),
        'iso' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '10'),
            'picasa' => array('exif$tags', 'exif$iso', '$t')),
    );

    public function __construct() {
        $this->UnitTestCase();
    }

    public function setUp() {
    }

    public function testGetRefData() {
        $photoRefData = new Lib_ShashinPhotoRefData();
        $refData = $photoRefData->getRefData();
        $this->assertEqual($refData, $this->expectedRefData);
    }
}