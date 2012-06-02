<?php
namespace PhpJsonMarshaller\Config\Annotations;

use PhpAnnotation\Annotations\Annotation;
use PhpAnnotation\Annotations\AnnotationCreator;
use PhpAnnotation\Annotations\Parameter;
use PhpAnnotation\Annotations\Enum;

/**
 * @Annotation(on={"class", "method", "property"})
 */
class JsonTypeInfo
{

    /**
     * @var int[string]
     * @Enum("Id")
     */
    public static $enumId = array(
            "CLASS" => 1,
            "CUSTOM" => 2,
            "MINIMAL_CLASS" => 3,
            "NAME" => 4,
            "NONE" => 5
        );

    /**
     * @var int[string]
     * @Enum("As")
     */
    public static $enumAs = array(
        "PROPERTY" => 1,
        "WRAPPER_ARRAY" => 2,
        "WRAPPER_OBJECT" => 3,
        "EXTERNAL_PROPERTY" => 4
    );

    /**
     * @var string
     */
    protected $use;

    /**
     * @var string
     */
    protected $include;

    /**
     * @var string
     */
    protected $property;

    /**
     * @var bool
     */
    protected $visible;

    /**
     * @var string
     */
    protected $defaultImpl;

    /**
     * @AnnotationCreator({@Parameter(name="use", type="integer", required=true), @Parameter(name="include", type="integer", required=false), @Parameter(name="property", type="string", required=false), @Parameter(name="visible", type="bool", required=false), @Parameter(name="defaultImpl", type="string", required=false)})
     * @param int $use
     * @param int $include
     * @param string $property
     * @param bool $visible
     * @param string $defaultImpl
     */
    public function __construct($use, $include = null, $property = null, $visible = false, $defaultImpl = null)
    {
        $this->use = $use;
        $this->include = isset($include) ? $include : self::$enumAs["PROPERTY"];
        $this->property = empty($property) ? null : $property;
        $this->visible = isset($visible) && $visible;
        $this->defaultImpl = $defaultImpl;
    }

    /**
     * @return string
     */
    public function getInclude()
    {
        return $this->include;
    }

    /**
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return string
     */
    public function getUse()
    {
        return $this->use;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @return string
     */
    public function getDefaultImpl()
    {
        return $this->defaultImpl;
    }
}
