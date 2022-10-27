<?php

namespace Iphp\FileStoreBundle\Tests\Mapping\Annotation;

use Iphp\FileStoreBundle\Mapping\Annotation\UploadableField;

/**
 * UploadableFieldTest.
 *
 * @author Vitiko <vitiko@mail.ru>
 */
class UploadableFieldTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Iphp\FileStoreBundle\Mapping\Annotation\UploadableField;
     */
    protected $uploadableField;

    public function setUp(): void
    {
        $this->uploadableField = new UploadableField(array('mapping' => 'dummy_file'));
    }

    public function testExceptionThrownWhenNoMappingAttribute()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        new UploadableField(array(
            'fileNameProperty' => 'fileName'
        ));
    }


    public function testGetMapping()
    {

        $this->assertSame($this->uploadableField->getMapping(), 'dummy_file');
    }


    public function testSetMapping()
    {
        $this->uploadableField->setMapping('dummy_file');
        $this->assertSame($this->uploadableField->getMapping(), 'dummy_file');
    }


    public function testGetSetFileUploadPropertyName()
    {
        $this->uploadableField->setFileUploadPropertyName('file');
        $this->assertSame($this->uploadableField->getFileUploadPropertyName(), 'file');
        $this->assertSame($this->uploadableField->getFileDataPropertyName(), 'file');

    }




    public function testGetSetFileDataPropertyName()
    {
        $this->uploadableField->setFileUploadPropertyName('file');
        $this->uploadableField->setFileDataPropertyName('file_data');

        $this->assertSame($this->uploadableField->getFileUploadPropertyName(), 'file');
        $this->assertSame($this->uploadableField->getFileDataPropertyName(), 'file_data');
    }





}
