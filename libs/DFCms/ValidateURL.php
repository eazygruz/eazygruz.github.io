<?php

    class DFCms_ValidateURL extends Zend_Uri_Http
    {
        public static function fromString($uri)
        {
            $URLParts = parse_url($uri);
            $validPath = str_replace('//', '/', $URLParts['path']);
            $uri = str_replace($URLParts['path'], $validPath, $uri);

            return parent::fromString($uri);
        }
    }
?>