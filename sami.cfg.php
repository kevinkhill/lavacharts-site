<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$dir = realpath(__DIR__.'/../../php/lavacharts/src');
echo $dir;exit;
$iterator = Finder::create()
    ->files()
    ->name('*.php')
    //->exclude('Laravel')
    ->in($dir);

$versions = GitVersionCollection::create($dir)
    ->add('3.0', '3.0 Branch')
    ->add('2.5', '2.5 Branch');

$githubRepo = new GitHubRemoteRepository('kevinkhill/lavacharts', dirname($dir));

$options = [
    'theme'                => 'lava',
    'versions'             => $versions,
    'title'                => 'Lavacharts API',
    'build_dir'            => __DIR__.'/_site/api/%version%',
    'cache_dir'            => __DIR__.'/.cache/%version%',
    'template_dirs'        => [__DIR__.'/resources/sami-themes/'],
    'remote_repository'    => $githubRepo,
    'default_opened_level' => 2,
];

return new Sami($iterator, $options);
