<?php

namespace Chriha\ProjectCLI;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Carbon;
use Illuminate\Container\Container;

class Helpers
{

    /**
     * @param null $name
     * @return Container|mixed
     * @throws BindingResolutionException
     */
    public static function app( $name = null )
    {
        return $name ? Container::getInstance()->make( $name ) : Container::getInstance();
    }

    /**
     * @param string $path
     * @return string|null
     * @throws BindingResolutionException
     */
    public static function projectPath( string $path = '' ) : ?string
    {
        $root = static::app( 'project.path' );

        return ! $root ? null : $root . DS . ltrim( $path, DS );
    }

    /**
     * Return the home directory of ProjectCLI
     *
     * @param string $path
     * @return string|null
     * @throws BindingResolutionException
     */
    public static function home( string $path = '' ) : ?string
    {
        if ( ! $home = static::app( 'paths.home' ) ) return null;

        return $home . DS . ltrim( $path, DS );
    }

    /**
     * @param string $text
     * @throws BindingResolutionException
     */
    public static function line( $text = '' )
    {
        static::app( 'output' )->writeln( $text );
    }

    /**
     * @param $text
     * @throws BindingResolutionException
     */
    public static function danger( $text )
    {
        static::app( 'output' )->writeln( '<fg=red>' . $text . '</>' );
    }

    /**
     * Display a danger message and exit.
     *
     * @param string $text
     * @return void
     * @throws BindingResolutionException
     */
    public static function abort( $text )
    {
        static::danger( $text );
        exit( 1 );
    }

    /**
     * Display the date in "humanized" time-ago form.
     *
     * @param string $date
     * @return string
     */
    public static function timeAgo( $date )
    {
        return Carbon::parse( $date )->diffForHumans();
    }

    /**
     * @param string $string
     * @return string
     */
    public static function mbStrReverse( string $string ) : string
    {
        $r = '';

        for ( $i = mb_strlen( $string ); $i >= 0; $i-- )
        {
            $r .= mb_substr( $string, $i, 1 );
        }

        return $r;
    }

    /**
     * Check if the provided command exists on the host system
     *
     * @param string $command
     * @return bool
     */
    public static function commandExists( string $command ) : bool
    {
        return !! `which {$command}`;
    }

    /**
     * Search in a file for the given string and return the first match
     *
     * @param string $search
     * @param string $file
     * @return string|null
     */
    public static function searchInFile( string $search, string $file ) : ?string
    {
        $handle = @fopen( $file, "r" );

        if ( ! $handle ) return null;

        while ( ! feof( $handle ) )
        {
            $buffer = fgets( $handle );

            if ( strpos( $buffer, $search ) !== false )
            {
                fclose( $handle );

                return trim( $buffer );
            }
        }

        fclose( $handle );

        return null;
    }

    /**
     * Find a namespace within a PHP class
     *
     * @param string $file
     * @return string|null
     */
    public static function findNamespace( string $file ) : ?string
    {
        $line = static::searchInFile( 'namespace', $file );

        if ( ! $line ) return null;

        $position = strpos( $line, 'namespace' );

        return trim( rtrim( substr( $line, $position + 9 ), ';' ) );
    }

}
