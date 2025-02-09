<?php
/**
 * Abstract class for the long to IPv4 transformations plugins
 */

declare(strict_types=1);

namespace PhpMyAdmin\Plugins\Transformations\Abs;

use PhpMyAdmin\FieldMetadata;
use PhpMyAdmin\Plugins\TransformationsPlugin;
use PhpMyAdmin\Utils\FormatConverter;

use function __;
use function htmlspecialchars;

/**
 * Provides common methods for all of the long to IPv4 transformations plugins.
 */
abstract class LongToIPv4TransformationsPlugin extends TransformationsPlugin
{
    /**
     * Gets the transformation description of the specific plugin
     */
    public static function getInfo(): string
    {
        return __(
            'Converts an (IPv4) Internet network address stored as a BIGINT'
            . ' into a string in Internet standard dotted format.',
        );
    }

    /**
     * Does the actual work of each specific transformations plugin.
     *
     * @param string             $buffer  text to be transformed
     * @param array              $options transformation options
     * @param FieldMetadata|null $meta    meta information
     */
    public function applyTransformation(string $buffer, array $options = [], FieldMetadata|null $meta = null): string
    {
        return htmlspecialchars(FormatConverter::longToIp($buffer));
    }

    /* ~~~~~~~~~~~~~~~~~~~~ Getters and Setters ~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Gets the transformation name of the specific plugin
     */
    public static function getName(): string
    {
        return 'Long To IPv4';
    }
}
