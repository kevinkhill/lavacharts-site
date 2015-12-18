<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$dir = realpath(__DIR__.'/../../php/lavacharts/src');

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Laravel')
    //->exclude('Traits')
    ->in($dir);

$versions = GitVersionCollection::create($dir)
    ->add('2.5', '2.5.x Branch')
    ->add('3.0', '3.0.x Branch');

$options = [
    'theme'                => 'lava',
    'versions'             => $versions,
    'title'                => 'Lavacharts API',
    'build_dir'            => __DIR__.'/_site/api/%version%',
    'cache_dir'            => __DIR__.'/.cache/%version%',
    'remote_repository'    => new GitHubRemoteRepository('khill/lavacharts', dirname($dir)),
    'default_opened_level' => 2,
];

$sami = new Sami($iterator, $options);

$templates = $sami['template_dirs'];
$templates[] = __DIR__ . '/themes/';

$sami['template_dirs'] = $templates;

return $sami;
