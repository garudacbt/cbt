<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 13/03/2021
 * Time: 19:46
 */


defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014 Rob Dunham Modified by navotera (share-system.com)
 *
/**
 * Simple Recursive Autoloader
 *
 * A simple autoloader that loads class files recursively starting in the directory
 * where this class resides.  Additional options can be provided to control the naming
 * convention of the class files.
 *
 * @package Autoloader
 * @license http://opensource.org/licenses/MIT  MIT License
 * @author  Rob Dunham Modified by navotera (navotera@gmail.com)
 */
class ORMAutoloader
{
    /**
     * File extension as a string. Defaults to ".php".
     */
    protected static $fileExt = '.php';
    /**
     * The top level directory where recursion will begin. Defaults to the current
     * directory.
     */
    protected static $pathTop = PARENTPATH.'/orm';
    /**
     * A placeholder to hold the file iterator so that directory traversal is only
     * performed once.
     */
    protected static $fileIterator = null;
    /**
     * Autoload function for registration with spl_autoload_register
     *
     * Looks recursively through project directory and loads class files based on
     * filename match.
     *
     * @param string $className
     */
    public static function loader($className)
    {
        $directory = new RecursiveDirectoryIterator(static::$pathTop, RecursiveDirectoryIterator::SKIP_DOTS);
        if (is_null(static::$fileIterator)) {
            static::$fileIterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::LEAVES_ONLY);
        }
        $filename = $className . static::$fileExt;
        foreach (static::$fileIterator as $file) {
            if (strtolower($file->getFilename()) === strtolower($filename)) {
                if ($file->isReadable()) {
                    include_once $file->getPathname();
                }
                break;
            }
        }
    }
    /**
     * Sets the $fileExt property
     *
     * @param string $fileExt The file extension used for class files.  Default is "php".
     */
    public static function setFileExt($fileExt)
    {
        static::$fileExt = $fileExt;
    }
    /**
     * Sets the $path property
     *
     * @param string $path The path representing the top level where recursion should
     *                     begin. Defaults to the current directory.
     */
    public static function setPath($path)
    {
        static::$pathTop = $path;
    }
}

ORMAutoloader::setFileExt('.php');
spl_autoload_register('ORMAutoloader::loader');
// EOF