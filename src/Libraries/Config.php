<?php

namespace Chriha\ProjectCLI\Libraries;

use Chriha\ProjectCLI\Helpers;
use Illuminate\Support\Arr;
use PHLAK\SemVer\Version;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class Config
{

    /** @var array */
    protected $config;

    /** @var string */
    protected $file = '.project.yml';


    /**
     * @param string $path
     * @return mixed
     */
    public function get( string $path )
    {
        if ( empty( $this->config ) )
        {
            $this->loadConfig();
        }

        return Arr::get( $this->config, $path );
    }

    /**
     * @param string $path
     * @param $value
     * @return Config
     */
    public function set( string $path, $value ) : self
    {
        $this->config = Arr::set( $this->config, $path, $value );

        return $this;
    }

    private function loadConfig()
    {
        if ( ! Helpers::app( 'project.inside' ) ) return;

        $path = Helpers::projectPath( $this->file );

        if ( ! $path || ! file_exists( $path ) )
        {
            Helpers::abort( "Unable to find project config '{$this->file}'" );
        }

        try
        {
            $this->config = Yaml::parse( file_get_contents( $path ) );
        }
        catch ( ParseException $e )
        {
            Helpers::abort( "Unable to parse project config '{$this->file}'" );
        }
    }

    public function version( Version $version = null ) : Version
    {
        if ( $version )
        {
            $this->set( 'version', $version );
        }

        return ( $version = $this->get( 'version' ) )
            ? new Version( $version ) : new Version;
    }

    public function __destruct()
    {
        $this->save();
    }

    public function save()
    {
        if ( empty( $this->config ) ) return;

        $config = $this->config;

        $config['version'] = $this->version()->prefix();

        ksort( $config );

        $parsed = Yaml::dump( $config );

        file_put_contents( Helpers::projectPath( $this->file ), $parsed );
    }

}